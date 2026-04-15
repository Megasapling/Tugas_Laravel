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
        Schema::table('karyawans', function (Blueprint $table) {
            // Menambahkan kolom foreign key
            $table->foreignId('departemen_id')
                  ->constrained('departemens')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {
            // Menghapus foreign key dan kolomnya
            $table->dropForeign(['departemen_id']);
            $table->dropColumn('departemen_id');
        });
    }
};