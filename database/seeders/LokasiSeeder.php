<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lokasi')->insert([
            ['id' => 1, 'nama_lokasi' => 'Stadion Utama'],
            ['id' => 2, 'nama_lokasi' => 'Galeri Seni Kota'],
            ['id' => 3, 'nama_lokasi' => 'Taman Kota'],
        ]);
    }
}
