<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori' => 'Makanan Berat'],
            ['kategori' => 'Makanan Ringan'],
            ['kategori' => 'Minuman'],
            ['kategori' => 'Alat Mandi'],
            ['kategori' => 'Alat Bayi'],
            ['kategori' => 'Alat Tulis'],
            ['kategori' => 'Obat'],
            ['kategori' => 'Jajan'],
            ['kategori' => 'Bumbu Masak'],
            ['kategori' => 'Umum'],
        ];
        DB::table('kategori')->insert($data);
    }
}
