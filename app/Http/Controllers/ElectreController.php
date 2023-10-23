<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectreController extends Controller
{
  public function index(){
    return view('content.electre.index',[
      'title' => 'ELECTRE',
      'active' => 'electre'
    ]
    );
  }

  public function process(Request $request){
    $alternatives = $request->post('alternatives');
    $criterias = $request->post('criterias');
    $values = $request->post('values');
    $weights = $request->post('weights');

    $normalizations = $this->normalization($values);
    $preferenceMatrix = $this->preferenceMatrix($normalizations, $weights);
    $concordanceIndex = $this->concordanceIndex($preferenceMatrix);
    $disconcordanceIndex = $this->disconcordanceIndex($preferenceMatrix);
    return view('content.electre.process',[
      'alternatives' => $alternatives,
      'criterias' => $criterias,
      'values' => $values,
      'weights' => $weights,
      'normalizations' => $normalizations,
      'preferenceMatrix' => $preferenceMatrix,
      'concordanceIndex' => $concordanceIndex,
      'disconcordanceIndex' => $disconcordanceIndex,
      'title' => 'ELECTRE (Process)',
      'active' => 'electre'
    ]);

  }

  public function normalization($values){
    $normalizations = $values;
    $sum = array_fill(0, count($values[0]), 0);
    for($i = 0; $i < count($values); $i++){
      for($j = 0; $j < count($values[0]); $j++){
        $sum[$j] += (pow($values[$i][$j], 2));
      }
    }
    for($i = 0; $i < count($values); $i++){
      for($j = 0; $j < count($values[0]); $j++){
        $normalizations[$i][$j] = number_format($values[$i][$j] / sqrt($sum[$j]), 4);
      }
    }
    return $normalizations;
  }

  public function preferenceMatrix($normalizations, $weights){
    $preferenceMatrix = $normalizations;
    for($i = 0; $i < count($normalizations); $i++){
      for($j = 0; $j < count($normalizations[0]); $j++){
        $preferenceMatrix[$i][$j] *= $weights[$j];
      }
    }
    return $preferenceMatrix;
  }

  public function concordanceIndex($preferenceMatrix){

    $concordanceIndex = array();
    $index = '';
    for($i = 0; $i < count($preferenceMatrix); $i++){
      if($index != $i){
        $index = $i;
        $concordanceIndex[$i] = array();
      }

      for($j = 0; $j < count($preferenceMatrix); $j++){
        if($i != $j){
          for($k = 0; $k < count($preferenceMatrix[0]); $k++){
            if(!isset($concordanceIndex[$i][$j])){
              $concordanceIndex[$i][$j] = array();
            }
            if($preferenceMatrix[$i][$k] >= $preferenceMatrix[$j][$k]){
              array_push($concordanceIndex[$i][$j], $k);
            }
          }
        }
      }
    }

  return $concordanceIndex;

  }

  public function disconcordanceIndex($preferenceMatrix){

    $disconcordanceIndex = array();
    $index = '';
    for($i = 0; $i < count($preferenceMatrix); $i++){
      if($index != $i){
        $index = $i;
        $disconcordanceIndex[$i] = array();
      }

      for($j = 0; $j < count($preferenceMatrix); $j++){
        if($i != $j){
          for($k = 0; $k < count($preferenceMatrix[0]); $k++){
            if(!isset($disconcordanceIndex[$i][$j])){
              $disconcordanceIndex[$i][$j] = array();
            }
            if($preferenceMatrix[$i][$k] < $preferenceMatrix[$j][$k]){
              array_push($disconcordanceIndex[$i][$j], $k);
            }
          }
        }
      }
    }

  return $disconcordanceIndex;

  }
  
}
