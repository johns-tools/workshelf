<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('login_auth_keys', function (Blueprint $table) {
            $table->id(); // Auto incrementing primary key
            $table->uuid('key_01'); // UUID field
            $table->uuid('key_02'); // UUID field
            $table->timestamps(); // Optional: created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_auth_keys');
    }
};
