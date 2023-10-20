<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElectreAlternativesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('electre_alternatives')->insert([
            ['name' => 'Pluit'],
            ['name' => 'Pulo Gadung'],
            ['name' => 'Cibitung'],
            ['name' => 'Sunter'],
            ['name' => 'Cakung'],
            ['name' => 'Ancol'],
            ['name' => 'Cengkareng'],
            ['name' => 'Grogol'],
        ]);
    }
}

