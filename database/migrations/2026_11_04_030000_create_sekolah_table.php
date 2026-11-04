<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('npsn', 20)->unique();
            $table->string('nss', 20)->nullable();
            $table->string('nama', 150);
            $table->string('dabin', 50)->nullable();
            $table->text('alamat')->nullable();
            $table->string('kecamatan', 50)->default('Gunungwungkal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};
