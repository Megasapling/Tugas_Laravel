<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departemen; // Pastikan memanggil model Departemen

class DepartemenSeeder extends Seeder
{
    public function run(): void
{
    Departemen::insert([
        ['nama' => 'Sektor Teknologi & Informasi'], // Ubah 'nama_departemen' jadi 'nama'
        ['nama' => 'Sektor Keamanan Siber'],
    ]);
}
}