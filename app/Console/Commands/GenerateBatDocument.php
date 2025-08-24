<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateBatDocument extends Command
{
    // Need this to the be job instance that has a life span.
    protected $signature = 'bat:generate {--continuous : Run continuously with random intervals}';

    protected $description = 'Generate random bat documents between 1 and 10 minutes';

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

    public function handle()
    {
        if ($this->option('continuous')) {
            $this->info('Bat Document Generator Started');
            $this->info('Generating documents every 1-10 minutes...');
            $this->info('Press Ctrl+C to stop');
            $this->newLine();

            while (true) {
                $this->generateDocument();
                $nextInterval = $this->getRandomInterval();
                $this->info("Next document in: " . ($nextInterval / 60) . " minutes");
                sleep($nextInterval);
            }
        } else {
            $this->generateDocument();
        }
    }

    private function generateDocument()
    {
        $docType = $this->documentTypes[array_rand($this->documentTypes)];
        $timestamp = now()->toISOString();

        $content = $this->generateDocumentContent($docType);
        $fileName = 'bat_document_' . time() . '.txt';

        $fullContent = "Document Type: {$docType}\n";
        $fullContent .= "Created: {$timestamp}\n";
        $fullContent .= "Version: 1.0\n\n";
        $fullContent .= $content;

        Storage::disk('local')->put($fileName, $fullContent);

        $this->info("✓ Bat document generated: {$fileName}");
        $this->line("  Type: {$docType}");
    }

    private function generateDocumentContent($docType)
    {
        // Try to load content from JSON file
        $jsonFile = 'document_templates.json';

        if (Storage::disk('local')->exists($jsonFile)) {
            $jsonContent = Storage::disk('local')->get($jsonFile);
            $templates = json_decode($jsonContent, true);

            if (isset($templates[$docType])) {
                return $templates[$docType];
            }
        }

        // Fallback to simple default content
        return "Content for {$docType} This is sample content for {$docType}. Created: " . now()->toDateString() . " Status: Active";
    }

    // Not going to be used, just place holder for testing.
    private function getRandomInterval()
    {
        return rand(60, 600); // Random interval between 1-10 minutes in seconds
    }
}
