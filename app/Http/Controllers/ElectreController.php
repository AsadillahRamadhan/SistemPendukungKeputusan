<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ElectreCriteria;
use App\Models\ElectreEvaluation;

class ElectreController extends Controller {
    public function index() {
        $n = ElectreCriteria::count();
        $X = ElectreEvaluation::orderBy('id_alternative')->get()->groupBy('id_alternative');
        $m = count($X);
        return view('index', compact('n', 'X', 'm'));
    }
}

