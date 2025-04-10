<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kandidats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('visi');
            $table->text('misi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kandidats');
    }
};
