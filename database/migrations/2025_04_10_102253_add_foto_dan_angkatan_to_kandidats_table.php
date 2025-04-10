<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('kandidats', function (Blueprint $table) {
            $table->string('foto')->nullable(); // path ke file gambar
            $table->string('angkatan')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('kandidats', function (Blueprint $table) {
            $table->dropColumn(['foto', 'angkatan']);
        });
    }
    
};
