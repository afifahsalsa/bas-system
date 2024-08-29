<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Liswanti',
                'email' => 'lis@gmail.com',
                'password' => Hash::make('12345678'),
                'type' => 'admin',
                'pw' => '12345678'
            ],
            [
                'name' => 'Afifah',
                'email' => 'afi@gmail.com',
                'password' => Hash::make('12345678'),
                'type' => 'admin',
                'pw' => '12345678'
            ],
        ]);
    }
}
