<?PHP

$inp = "Hello";
simpleCrypter($inp, 5);
doubCrypter($inp);

function simpleCrypter ($input, $transPosNum = 0){  // for performing Caesar's cypher/ simple substitution

  $unModdedTxt = str_split($input);
  $moddedTxt = "";
  //echo $unModdedTxt[0]." ". $unModdedTxt[1]." ".$unModdedTxt[2]." ".$unModdedTxt[3];

  $unModdedASCChart;
  $moddedASCChart;
  $i = 0;
  $alphIndStart = 64;  // where the ASCII index for english characters starts
  $alphIndEnd = 123;      // where the ASCII index for english characters ends
  $capIndEnd = 90;    // where the ASCII index for capital letters ends
  $lowerIndStart = 97;  // where the ASCII index for lower case letters starts
  $paddedLetters = 7;   // represents the number of characters in the ASCII code that lie between the capital and lower case letters

  for ($i = 0; $i < sizeof($unModdedTxt); $i++){    // stores all the values for the ASCII of each character in unModdedTxt array
    $unModdedASCChart[$i] = ord($unModdedTxt[$i]);
  }

  for ($i = 0; $i < sizeof($unModdedASCChart); $i++){ // substitues the ASCII vals for implementing the simple subsitution system
    if (($unModdedASCChart[$i] > $alphIndStart) && ($unModdedASCChart[$i] < $alphIndEnd)){
      if (($unModdedASCChart[$i] + $transPosNum) < $alphIndEnd){
        $moddedASCChart[$i] = $unModdedASCChart[$i] + $transPosNum;
      }
      else{
        $moddedASCChart[$i] = $unModdedASCChart[$i] + $transPosNum - 58;
      }

      $moddedTxt .= chr($moddedASCChart[$i]);
    }
    else{
      echo "Not an english alphabet!";
    }
  }

  echo $moddedTxt."\n";

  return $moddedTxt;
}

function doubCrypter($input){           // function for performing double transposition on given string
  $unModdedTxt = $input;
  $moddedTxt = "";                      // container for modified/encrypted string
  $one = 1;
  echo strlen($input)."\n";
  if(strlen($input) <= $one){
    echo "STRING TOO SMALL TO PROCESS!"."\n";
    return $moddedTxt;
  }

  $numRows = floor ((strlen($unModdedTxt) / (2))) - 1;
  echo "NumRows: ".$numRows."\n";
  $numCols = strlen($unModdedTxt) - $numRows - 2;
  echo "NumCols: ".$numCols."\n";

  $wordArray;       // will contain the unmodified string for double transposition
  $i = 0;
  $j = 0;
  $k = 0;
  $key;             // contains the key for the transposition elements
  $rowTrans1;        // buffer value representing row for transposition
  $rowTrans2;        // buffer value to be swapped with the other row
  $colTrans1;        // buffer value representing column for transposition
  $colTrans2;        // buffer value to be swapped witht the other column
  $temp;
  $numShuffles = rand(floor(strlen($unModdedTxt) / 2), strlen($unModdedTxt));     // number of times the transposition shuffler loop will run

  for ($i = 0; $i <= $numRows; $i++){     // sorts word's characters into the 2D array for transposition
    $key [0] [$i] = $i;
    for ($j = 0; $j <= $numCols; $j++){
      $key [1] [$j] = $j;
      //$wordArray [$i] [$j] = $unModdedTxt{$i + $j};
      $wordArray [$i] [$j] = $unModdedTxt{$k};
      $k++;
      echo $i." ".$j."\n ".$wordArray[$i][$j]."\n";
    }
    echo "\n";
  }


  for ($i = 0; $i < $numShuffles; $i++){      // the actual loop that carries out the double transposition process

    $rowTrans1 = rand(0, $numRows);
    $colTrans1 = rand(0, $numCols);

    do{
      $rowTrans2 = rand(0, $numRows);
      $colTrans2 = rand(0, $numCols);
    }while (($rowTrans1 == $rowTrans2) || ($colTrans1 == $colTrans2));

    for($j = 0; $j <= $numCols; $j++){      // loop for swapping values in the row
      $temp = $wordArray [$rowTrans1] [$j];
      $wordArray [$rowTrans1] [$j] = $wordArray [$rowTrans2] [$j];
      $wordArray [$rowTrans2] [$j] = $temp;
    }

    $temp = $key [0] [$rowTrans1];          // swaps the key values based on the changes in the rows
    $key [0] [$rowTrans1] = $key [0] [$rowTrans2];
    $key [0] [$rowTrans2] = $temp;

    for($j = 0; $j <= $numRows; $j++){                                  // loop for swapping values in the column
      $temp = $wordArray [$j] [$colTrans1];
      $wordArray [$j] [$colTrans1] = $wordArray [$j] [$colTrans2];
      $wordArray [$j] [$colTrans2] = $temp;
    }

    $temp = $key [1] [$colTrans1];          // swaps the key values based on the changes in the rows
    $key [1] [$colTrans1] = $key [1] [$colTrans2];
    $key [1] [$colTrans2] = $temp;

  }

  for ($i = 0; $i <= $numRows; $i++){
    for($j = 0; $j <= $numCols; $j++ ){
      $moddedTxt .= $wordArray[$i][$j];
    }
  }

  echo $input."\n";
  echo strlen($input)."\n";
  echo $moddedTxt."\n";
  echo strlen($moddedTxt)."\n";

  return $moddedTxt;
}
