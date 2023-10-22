<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ElectreCriteria;
use App\Models\ElectreEvaluation;
use Illuminate\Support\Facades\DB;

class ElectreController extends Controller
{
    public function electre1()
    {
        $n = ElectreCriteria::count();
        $X = ElectreEvaluation::orderBy('id_alternative')->get()->groupBy('id_alternative');
        $m = count($X);
        return view('index', compact('n', 'X', 'm'));
    }

    public function electre2()
    {
        // Query untuk mengambil jumlah kriteria 'n'
        $n = ElectreCriteria::count();

        // Query untuk mengambil data Perbandingan Berpasangan X
        $X = ElectreEvaluation::orderBy('id_alternative')->get()->groupBy('id_alternative');
        $m = count($X);

        // Hitung nilai rata-rata kuadrat per-kriteria
        $x_rata = [];
        foreach ($X as $i => $x) {
            foreach ($x as $j => $value) {
                $x_rata[$j] = (isset($x_rata[$j]) ? $x_rata[$j] : 0) + pow($value->value, 2);
            }
        }
        for ($j = 0; $j < $n; $j++) {
            $x_rata[$j] = sqrt($x_rata[$j]);
        }

        // Menormalisasi matriks X menjadi matriks R
        $R = [];
        $alternative = '';
        foreach ($X as $i => $x) {
            if ($alternative != $i) {
                $alternative = $i;
                $R[$i] = [];
            }
            foreach ($x as $j => $value) {
                $R[$i][$j] = $value->value / $x_rata[$j];
            }
        }

        return view('berpasangan', compact('n', 'X', 'm', 'x_rata', 'R'));
    }

    public function tampilkanBobotKriteria() {
        $criteria = DB::table('electre_criterias')
            ->orderBy('id_criteria')
            ->pluck('weight', 'id_criteria')
            ->all();
    
        return view('bobot_kriteria', compact('criteria'));
    }
}
