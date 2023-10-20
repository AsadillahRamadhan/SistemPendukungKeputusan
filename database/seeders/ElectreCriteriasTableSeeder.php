<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElectreCriteriasTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('electre_criterias')->insert([
            ['criteria' => 'jarak dengan pusat niaga terdekat(km)', 'weight' => 7],
            ['criteria' => 'kepadatan penduduk disekitar lokasi (orang/km2)', 'weight' => 2],
            ['criteria' => 'jarak dari pabrik(km)', 'weight' => 5],
            ['criteria' => 'jarak dengan gudang yang sudah ada (km)', 'weight' => 3],
            ['criteria' => 'harga tanah untuk lokasi (x1000 Rp/m2)', 'weight' => 3],
        ]);
    }
}
