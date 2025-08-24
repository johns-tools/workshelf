<?php

namespace App\Services;

use App\Models\BatDocument;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Storage;

class BatDocumentService
{
    private $documentTypes = [
        'Doc One',
        'Doc Two',
        'Doc Three',
        'Doc Four',
        'Doc Five',
        'Doc Six',
        'Doc Seven',
        'Doc Eight',
        'Doc Nine',
        'Doc Ten'
    ];

    public function createDocument(?string $docType = null, ?int $departmentId = null): BatDocument
    {
        $docType = $docType ?? $this->getRandomDocumentType();
        $content = $this->generateDocumentContent($docType);
        
        $document = BatDocument::create([
            'title' => $this->generateTitle($docType),
            'document_type' => $docType,
            'classification' => 'Standard',
            'retention_period' => '5 years',
            'author_id' => 1, // Default author
            'department_id' => $departmentId ?? 1, // Default department
            'version' => '1.0',
            'content_hash' => hash('sha256', $content),
            'retention_expires_at' => now()->addYears(5),
        ]);

        // Create file storage
        $fileName = 'bat_document_' . $document->id . '_' . time() . '.txt';
        $fullContent = $this->buildFileContent($document, $content);
        Storage::disk('local')->put($fileName, $fullContent);

        // Log creation
        ActivityLog::create([
            'action' => 'document_created',
            'subject_type' => BatDocument::class,
            'subject_id' => $document->id,
            'properties' => [
                'document_title' => $document->title,
                'document_type' => $document->document_type,
                'file_name' => $fileName,
            ],
        ]);

        return $document;
    }

    private function getRandomDocumentType(): string
    {
        return $this->documentTypes[array_rand($this->documentTypes)];
    }

    private function generateTitle(string $docType): string
    {
        return $docType . ' - ' . now()->format('Y-m-d H:i:s');
    }

    private function generateDocumentContent(string $docType): string
    {
        $jsonFile = 'document_templates.json';
        
        if (Storage::disk('local')->exists($jsonFile)) {
            $jsonContent = Storage::disk('local')->get($jsonFile);
            $templates = json_decode($jsonContent, true);
            
            if (isset($templates[$docType])) {
                return $templates[$docType];
            }
        }

        return "Content for {$docType}

This is sample content for {$docType}.

Created: " . now()->toDateString() . "
Status: Active";
    }

    private function buildFileContent(BatDocument $document, string $content): string
    {
        return "Document Type: {$document->document_type}
Title: {$document->title}
Classification: {$document->classification}
Version: {$document->version}
Created: {$document->created_at->toISOString()}
Author ID: {$document->author_id}
Department ID: {$document->department_id}

{$content}";
    }
}