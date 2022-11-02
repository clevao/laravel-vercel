<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('functions')->insert([
            'system' => 'restaurante',
            'function' => 'products',
        ]);
        \DB::table('functions')->insert([
            'system' => 'restaurante',
            'function' => 'preparation_areas',
        ]);
        \DB::table('functions')->insert([
            'system' => 'restaurante',
            'function' => 'orders',
        ],);
    }
}
