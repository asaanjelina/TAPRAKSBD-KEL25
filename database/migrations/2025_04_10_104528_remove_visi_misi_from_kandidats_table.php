<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('kandidats', function (Blueprint $table) {
            $table->dropColumn('visi');
            $table->dropColumn('misi');
        });
    }

    public function down()
    {
        Schema::table('kandidats', function (Blueprint $table) {
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
        });
    }
};

