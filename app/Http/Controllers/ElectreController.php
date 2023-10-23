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
    return view('content.electre.process',[
      'alternatives' => $alternatives,
      'criterias' => $criterias,
      'values' => $values,
      'weights' => $weights,
      'normalizations' => $normalizations,
      'preferenceMatrix' => $preferenceMatrix,
      'concordanceIndex' => $concordanceIndex,
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
    // $concordanceIndex = array();
    // $index = [0, 1];
    // $temp = 0;
    // for($i = 0; $i < count($preferenceMatrix) * count($preferenceMatrix[0]); $i++){
    //     // if($preferenceMatrix[$index[0]][$i] >= $preferenceMatrix[$index[1]][$i]){
    //     //   $concordanceIndex[$index[0]][$index[1]] = 2;
    //     // }
    //     array_push($concordanceIndex, "$index[0], $index[1]");
    //     if($i + 1 == count($preferenceMatrix)){
    //       if($temp == count($preferenceMatrix)){
    //         $index[0]++;
    //       }
    //       if($index[1] == count($preferenceMatrix)){
    //         $index[1] = 0;
    //         $temp++;
    //       } else {
    //         if($index[1] + 1 == $index[0]){
    //           $index[1] += 2;
    //           $temp++;
    //         } else {
    //           $index[1]++;
    //           $temp++;
    //         }
            
    //       }
          
    //     }
    //   }
    //   dd($concordanceIndex);

    /* mencari himpunan concordance index
     $n = jumlah kriteria
     $m = jumlah alternatif
     $V = matrik preferensi
     $c = himpunan concordance index
  */
  $c=array();
  $c_index='';
  for($k=0;$k<count($preferenceMatrix);$k++){
    if($c_index!=$k){
      $c_index=$k;
      $c[$k]=array();
    }
    for($l=0;$l<count($preferenceMatrix);$l++){
      if($k!=$l){
        for($j=0;$j<count($preferenceMatrix[0]);$j++){
          if(!isset($c[$k][$l]))$c[$k][$l]=array();
          if($preferenceMatrix[$k][$j]>=$preferenceMatrix[$l][$j]){
            array_push($c[$k][$l],$j);
          }
        }
      }
    }
  }
  return $c;
  }

  public function disconcordanceIndex($disconcordanceIndex){

  }
  
}
