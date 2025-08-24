<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('legal_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('document_type');
            $table->string('classification');
            $table->string('retention_period');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('department_id');
            $table->string('version')->default('1.0');
            $table->string('content_hash');
            $table->timestamp('retention_expires_at')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->index('document_type');
            $table->index('classification');
            $table->index('retention_expires_at');
            $table->index('author_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('legal_documents');
    }
};