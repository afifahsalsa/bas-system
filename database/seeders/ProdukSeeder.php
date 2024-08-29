<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barcode' => '8991001121615', 'nama' => 'Silver Queen Cashew 58gr', 'merk' => 'Silver Queen', 'qty' => '10', 'harga_jual' => '15000', 'harga_beli' => '13000', 'satuan' => 'PCS', 'kategori_id' => 2],
            ['barcode' => '9555192510222', 'nama' => 'Sugus Heruk 30gr', 'merk' => 'Sugus', 'qty' => '5', 'harga_jual' => '4000', 'harga_beli' => '3000', 'satuan' => 'PCS', 'kategori_id' => 2],
        ];
        DB::table('produk')->insert($data);
    }
}
