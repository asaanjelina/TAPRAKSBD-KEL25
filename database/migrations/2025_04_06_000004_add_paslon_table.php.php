<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('paslons', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ketua');
            $table->string('nama_wakil');
            $table->text('visi');
            $table->text('misi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paslons');
    }
};
