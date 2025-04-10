<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus foreign key constraint
            $table->dropForeign('users_paslon_id_foreign');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Balikin lagi foreign key-nya (kalau rollback)
            $table->foreign('paslon_id')->references('id')->on('paslons');
        });
    }
};
