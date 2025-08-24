<?php

namespace App\Console\Commands;

use App\Jobs\GenerateBatDocumentJob;
use Illuminate\Console\Command;

class GenerateBatDocument extends Command
{
    protected $signature = 'bat:generate {--type= : Specific document type} {--department= : Department ID}';

    protected $description = 'Dispatch job to generate a bat document';

    public function handle()
    {
        $documentType = $this->option('type');
        $departmentId = $this->option('department') ? (int) $this->option('department') : null;

        // Dispatch the job
        GenerateBatDocumentJob::dispatch($documentType, $departmentId);

        $this->info('✓ Bat document generation job dispatched');
        
        if ($documentType) {
            $this->line("  Type: {$documentType}");
        }
        
        if ($departmentId) {
            $this->line("  Department ID: {$departmentId}");
        }
        
        $this->line("  Job will be processed by the queue worker");
    }
}
