<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('lokasi_id')
                  ->nullable()
                  ->after('kategori_id');
        });
    
        // isi lokasi_id untuk data lama
        DB::table('events')->update([
            'lokasi_id' => 1
        ]);
    
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('lokasi_id')
                  ->references('id')
                  ->on('lokasi')
                  ->cascadeOnDelete();
        });
    }
    
    
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['lokasi_id']);
            $table->dropColumn('lokasi_id');
        });
    }
};
