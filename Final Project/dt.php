<?php
function double_transpose_encrypt($input,$s1,$s2){
    $len = strlen($input);
    $text = $input;
    if(isprime($len) && $len > 2){
        $text = "$text ";
    }
    $col = count(parse_permutations($s2));
    $row = count(parse_permutations($s1));
    $matrix = gen_matrix($row,$col,$input);
    $rm = move_rows($matrix,$s1,$s2);
    $cm = move_cols($rm,$s1,$s2);
    echo stitch_matrix($cm,$row,$col)."\n";
}

function double_transpose_decrypt($input,$s1,$s2){

    $len = strlen($input);
    $text = $input;
    if(isprime($len) && $len > 2){
        $text = "$text ";
    }
    $col = count(parse_permutations($s2));
    $row = count(parse_permutations($s1));
    $matrix = gen_matrix($row,$col,$input);
    $rm = move_rows_to($matrix,$s1,$s2);
    $cm = move_cols_to($rm,$s1,$s2);
    echo stitch_matrix($cm,$row,$col)."\n";
}

function move_rows_to($matrix, $s1, $s2){
    $p = parse_permutations($s1);
    $mix = array(array());
    $col = count(parse_permutations($s2));
    $row = count(parse_permutations($s1));
    for($i=0;$i<$row;$i++){
        for($j=0;$j<$col;$j++){
            $mix[$p[$i]-1][$j] = $matrix[$i][$j];
        }
    }
    return $mix;
}

function move_cols_to($matrix, $s1, $s2) {
  $p = parse_permutations($s2);
  $mix = array(array());
  $col = count(parse_permutations($s2));
  $row = count(parse_permutations($s1));
  for($i=0;$i<$col;$i++){
      for($j=0;$j<$row;$j++){
          $mix[$j][$p[$i]-1] = $matrix[$j][$i];
      }
  }
  return $mix;
}


function move_rows($matrix, $s1, $s2) {
    $p = parse_permutations($s1);
    $mix = array(array());
    $col = count(parse_permutations($s2));
    $row = count(parse_permutations($s1));
    for($i=0;$i<$row;$i++){
        for($j=0;$j<$col;$j++){
            $mix[$i][$j] = $matrix[$p[$i]-1][$j];
        }
    }
    return $mix;
}

function move_cols($matrix, $s1, $s2) {
  $p = parse_permutations($s2);
  $mix = array(array());
  $col = count(parse_permutations($s2));
  $row = count(parse_permutations($s1));
  for($i=0;$i<$col;$i++){
      for($j=0;$j<$row;$j++){
          $mix[$j][$i] = $matrix[$j][$p[$i]-1];
      }
  }
  return $mix;
}

function stitch_matrix($matrix, $row, $col){
    $result = "";
    for($i=0;$i<$row;$i++){
        for($j=0;$j<$col;$j++){
            $result = $result.$matrix[$i][$j];
        }
    }
    return $result;
}


function gen_matrix($row,$col,$input){
    $matrix = array(array());
    $counter = 0;
    for($i=0;$i<$row;$i++){
        for($j=0;$j<$col;$j++){
            $matrix[$i][$j] = $input[$counter];
            $counter++;
        }
    }
    return $matrix;
}

function isprime($n){
    if ($n == 1)
    return false;
    for ($i = 2; $i <= $n/2; $i++) {
        if ($n % $i == 0)
            return false;
    }
    return true;
}

function parse_permutations($s){
    $store = array();
    $counter = 0;
    for($i=0;$i<strlen($s);$i++){
        if($s[$i]==','){
            continue;
        }
        else{
        $store[$counter] = (int)$s[$i];
        $counter++;
        }
    }
    return $store;
}


double_transpose_encrypt("attackxatxdawnx", "3,5,4,1,2", "1,3,2");
double_transpose_decrypt("xtawxnxadattakc", "3,5,4,1,2", "1,3,2");

// $temp =gen_matrix(5,3,"attackxatxdawnx");
// print_r($temp);

// echo stitch_matrix($temp,5,3);

?>
