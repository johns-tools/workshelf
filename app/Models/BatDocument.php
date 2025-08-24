<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BatDocument extends Model
{
    use SoftDeletes;

    protected $table = 'legal_documents';

    protected $fillable = [
        'title', 'document_type', 'classification', 'retention_period',
        'author_id', 'department_id', 'version', 'content_hash'
    ];

    protected $casts = [
        'retention_expires_at' => 'datetime',
        'archived_at' => 'datetime',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    protected static function booted()
    {
        static::deleting(function ($document) {
            // Cascade soft delete to related annotations
            $document->annotations()->delete();

            // Log deletion for audit trail
            ActivityLog::create([
                'action' => 'document_deleted',
                'subject_type' => BatDocument::class,
                'subject_id' => $document->id,
                'properties' => [
                    'document_title' => $document->title,
                    'classification' => $document->classification,
                    'deletion_reason' => request()->input('deletion_reason'),
                ],
            ]);
        });

        static::restoring(function ($document) {
            // Restore related annotations
            $document->annotations()->restore();

            // Log restoration
            ActivityLog::create([
                'action' => 'document_restored',
                'subject_type' => BatDocument::class,
                'subject_id' => $document->id,
                'properties' => [
                    'document_title' => $document->title,
                    'restored_from' => $document->deleted_at,
                ],
            ]);
        });
    }

    public function scopeAwaitingDestruction($query)
    {
        return $query->onlyTrashed()
                    ->where('retention_expires_at', '<', now())
                    ->where('deleted_at', '<', now()->subMonths(6));
    }

    public function isPermanentlyDeletable(): bool
    {
        return $this->trashed() &&
               $this->retention_expires_at < now() &&
               $this->deleted_at < now()->subMonths(6);
    }
}

// Hmm, interesting.
class DocumentRevision extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'document_id', 'version_number', 'change_summary',
        'content_diff', 'author_id'
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(BatDocument::class, 'document_id');
    }
}

// Hmm,interesting.
class DocumentAnnotation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'document_id', 'author_id', 'annotation_text',
        'page_number', 'position_data'
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(BatDocument::class, 'document_id');
    }
}
