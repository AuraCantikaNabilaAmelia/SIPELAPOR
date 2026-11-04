<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_sekolah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sekolah_id')->constrained('sekolah')->cascadeOnDelete();
            $table->boolean('is_plt')->default(false);
            $table->timestamps();

            $table->unique(['user_id', 'sekolah_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_sekolah');
    }
};
