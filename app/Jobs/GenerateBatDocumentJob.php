<?php

namespace App\Jobs;

use App\Services\BatDocumentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GenerateBatDocumentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300; // 5 minutes timeout
    public $tries = 3; // Retry up to 3 times

    public function __construct(
        public ?string $documentType = null,
        public ?int $departmentId = null
    ) {}

    public function handle(BatDocumentService $documentService): void
    {
        try {
            $document = $documentService->createDocument(
                $this->documentType,
                $this->departmentId
            );

            Log::info('Bat document generated successfully', [
                'document_id' => $document->id,
                'title' => $document->title,
                'type' => $document->document_type,
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to generate bat document', [
                'error' => $e->getMessage(),
                'document_type' => $this->documentType,
                'department_id' => $this->departmentId,
            ]);
            
            throw $e;
        }
    }

    public function failed(\Throwable $exception): void
    {
        Log::error('Bat document generation job failed permanently', [
            'error' => $exception->getMessage(),
            'document_type' => $this->documentType,
            'department_id' => $this->departmentId,
        ]);
    }
}