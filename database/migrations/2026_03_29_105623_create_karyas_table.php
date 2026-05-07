<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('karyas')) {
            Schema::create('karyas', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                $table->string('judul');
                $table->string('file');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('karyas');
    }
};
