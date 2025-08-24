<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_annotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('author_id');
            $table->text('annotation_text');
            $table->integer('page_number')->nullable();
            $table->json('position_data')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('document_id')->references('id')->on('legal_documents');
            $table->index('document_id');
            $table->index('author_id');
            $table->index('page_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_annotations');
    }
};