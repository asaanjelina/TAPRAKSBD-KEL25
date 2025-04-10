<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    
        {
            Schema::table('kandidats', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
        

    public function down(): void
    {
        Schema::table('kandidats', function (Blueprint $table) {
            $table->dropSoftDeletes(); // <--- untuk rollback kalau perlu
        });
    }
};
