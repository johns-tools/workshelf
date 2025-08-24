<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_revisions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->string('version_number');
            $table->text('change_summary');
            $table->longText('content_diff')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('document_id')->references('id')->on('legal_documents');
            $table->index('document_id');
            $table->index('version_number');
            $table->index('author_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_revisions');
    }
};