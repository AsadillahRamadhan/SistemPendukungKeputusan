<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\ElectreEvaluation;
use Illuminate\Support\Facades\DB;

class ElectreEvaluationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('electre_evaluations')->insert([  
            ['id_alternative' => 1, 'id_criteria' => 1, 'value' => 4],
            ['id_alternative' => 1, 'id_criteria' => 2, 'value' => 5],
            ['id_alternative' => 1, 'id_criteria' => 3, 'value' => 2],
            ['id_alternative' => 1, 'id_criteria' => 4, 'value' => 1],
            ['id_alternative' => 1, 'id_criteria' => 5, 'value' => 1],

            ['id_alternative' => 2, 'id_criteria' => 1, 'value' => 2],
            ['id_alternative' => 2, 'id_criteria' => 2, 'value' => 1],
            ['id_alternative' => 2, 'id_criteria' => 3, 'value' => 3],
            ['id_alternative' => 2, 'id_criteria' => 4, 'value' => 2],
            ['id_alternative' => 2, 'id_criteria' => 5, 'value' => 3],

            ['id_alternative' => 3, 'id_criteria' => 1, 'value' => 3],
            ['id_alternative' => 3, 'id_criteria' => 2, 'value' => 4],
            ['id_alternative' => 3, 'id_criteria' => 3, 'value' => 5],
            ['id_alternative' => 3, 'id_criteria' => 4, 'value' => 5],
            ['id_alternative' => 3, 'id_criteria' => 5, 'value' => 1],

            ['id_alternative' => 4, 'id_criteria' => 1, 'value' => 4],
            ['id_alternative' => 4, 'id_criteria' => 2, 'value' => 1],
            ['id_alternative' => 4, 'id_criteria' => 3, 'value' => 2],
            ['id_alternative' => 4, 'id_criteria' => 4, 'value' => 4],
            ['id_alternative' => 4, 'id_criteria' => 5, 'value' => 1],

            ['id_alternative' => 5, 'id_criteria' => 1, 'value' => 1],
            ['id_alternative' => 5, 'id_criteria' => 2, 'value' => 4],
            ['id_alternative' => 5, 'id_criteria' => 3, 'value' => 3],
            ['id_alternative' => 5, 'id_criteria' => 4, 'value' => 4],
            ['id_alternative' => 5, 'id_criteria' => 5, 'value' => 3],

            ['id_alternative' => 6, 'id_criteria' => 1, 'value' => 3],
            ['id_alternative' => 6, 'id_criteria' => 2, 'value' => 4],
            ['id_alternative' => 6, 'id_criteria' => 3, 'value' => 4],
            ['id_alternative' => 6, 'id_criteria' => 4, 'value' => 4],
            ['id_alternative' => 6, 'id_criteria' => 5, 'value' => 4],

            ['id_alternative' => 7, 'id_criteria' => 1, 'value' => 3],
            ['id_alternative' => 7, 'id_criteria' => 2, 'value' => 3],
            ['id_alternative' => 7, 'id_criteria' => 3, 'value' => 3],
            ['id_alternative' => 7, 'id_criteria' => 4, 'value' => 5],
            ['id_alternative' => 7, 'id_criteria' => 5, 'value' => 4],

            ['id_alternative' => 8, 'id_criteria' => 1, 'value' => 3],
            ['id_alternative' => 8, 'id_criteria' => 2, 'value' => 4],
            ['id_alternative' => 8, 'id_criteria' => 3, 'value' => 2],
            ['id_alternative' => 8, 'id_criteria' => 4, 'value' => 2],
            ['id_alternative' => 8, 'id_criteria' => 5, 'value' => 1],
        ]);
    }
}
