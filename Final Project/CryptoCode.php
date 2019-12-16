<?PHP
// indian beaten coffee ratio: for every 4-5 teaspoon of sugar crystals, use 1 heaped spoon of fine grain instant coffee with a few drops of water.
$inp = "Hello";
//simpleCrypter($inp, "-xyzabcghidefjklqrsmnoptuvw");
//simpleDecrypter("hbffl", "-xyzabcghidefjklqrsmnoptuvw");
//RC4Crypter($inp, [5, 6, 10, 8, 9, 15, 21, 11, 13, 7, 23, 17, 19, 29, 31, 37, 41, 43, 47]);

//echo "\n".HexToTex("68656c6c6f")."\n";
//$list;
//expansionBox($list);

function simpleCrypter($input, $key){          // simple substitution encrypter
  $keyLen = 27;
  if (strlen($key) != $keyLen){
      echo "\n INVALID KEY! NOTE: we need 27 alphabets in the key (spaces are included!)\n";
      return;
  }
  $i = 0;
  $gen = " abcdefghijklmnopqrstuvwxyz";
  $keyMapTemp = str_split($gen);
  $keyMapInp = str_split($key);
  $plaintxt = str_split(strtolower($input));
  $ciphertxt = "";
  $keyMap;
  for ($i = 0; $i < sizeOf($keyMapTemp); $i++){       // ties the key values to the alphabetical values and generates an associative array
    $keyMap[$keyMapTemp[$i]] = $keyMapInp[$i];
  }
  for ($i = 0; $i < sizeOf($plaintxt); $i++){         // converts plaintext into ciphertext
    $ciphertxt .= $keyMap[$plaintxt[$i]];
  }
  echo "Plain text: ".$input."<br>\n";
  echo "cipher text: ".$ciphertxt."\n";
}
// --------------------------------------------------------------------- //
function simpleDecrypter($input, $key){               // simple substitution decrypter
  $keyLen = 27;
  if (strlen($key) != $keyLen){
      echo "\n INVALID KEY! NOTE: we need 27 alphabets in the key (spaces are included!) \n";
      return;
  }
  $i = 0;
  $gen = " abcdefghijklmnopqrstuvwxyz";
  $keyMapTemp = str_split($gen);
  $keyMapInp = str_split($key);
  $plaintxt = "";
  $ciphertxt = str_split(strtolower($input));
  $keyMap;
  for ($i = 0; $i < sizeOf($keyMapTemp); $i++){       // ties the key values to the alphabetical values and generates an associative array
    $keyMap[$keyMapInp[$i]] = $keyMapTemp[$i];
  }
  for ($i = 0; $i < sizeOf($ciphertxt); $i++){         // converts ciphertext into plaintext
    $plaintxt .= $keyMap[$ciphertxt[$i]];
  }
  echo "cipher text: ".$input."<br> \n";
  echo "Plain text: ".$plaintxt."<br> \n";

}


// --------------------------------------------------------------------- //
                        //   REDUNDANT CODE HERE!!

function CaesarCrypter ($input, $transPosNum = 0){  // for performing Caesar's cypher/ simple substitution

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

// --------------------------------------------------------------------- //                 FIX ME: DOUBLE TRANSPOSITION FUNCTION NEEDS THE TRANSPOSITION PORTION FIXED AND ALSO NEEDS OPTIMIZATION!


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

  $zero = 0;
  $wordArray;       // will contain the unmodified string for double transposition
  $i = 0;
  $j = 0;
  $k = 0;
  $key;             // contains the key for the transposition elements
  $rowTrans;        // buffer value representing row for transposition
  //$rowTrans2;        // buffer value to be swapped with the other row
  $colTrans;        // buffer value representing column for transposition
  //$colTrans2;        // buffer value to be swapped witht the other column
  $temp;
  $numShuffles = rand(floor(strlen($unModdedTxt) / 2), strlen($unModdedTxt));     // number of times the transposition shuffler loop will run
  $rowSwapped;
  $colSwapped;

  //echo "Size: ".sizeOf($rowSwapped)."\n";

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

  for ($i = 0; $i <= $numRows; $i++){          // transposes the rows and records the rows swapped


    do{
      $rowTrans = rand($i, $numRows);
      if (sizeOf($rowSwapped) == $zero){
        $rowSwapped[] = $rowTrans;
        break;
      }
      //print_r($rowSwapped);
    }while (in_array ($rowTrans, $rowSwapped));

    for ($j = 0; $j < $numCols; $j++){       // transposition of rows occurs in this loop
      $temp = $wordArray [$i] [$j];
      $wordArray [$i] [$j] = $wordArray [$rowTrans] [$j];
      $wordArray [$rowTrans] [$j] = $temp;
    }
    $rowSwapped[] = $rowTrans;
  }

  for ($j= 0; $j < $numCols; $j++){          // transposes the columns and records the columns swapped

    do{
      $colTrans = rand($i, $numRows);
      if (sizeOf($colSwapped) == $zero){
        $colSwapped[] = $colTrans;
        break;
      }
      //print_r($colSwapped);
    }while (in_array($colTrans, $colSwapped));

    for ($i = 0; $i <= $numRows; $i++){       // transposition of columns occurs in this loop
      $temp = $wordArray [$i] [$j];
      $wordArray [$i] [$j] = $wordArray [$i] [$colTrans];
      $wordArray [$i] [$colTrans] = $temp;
    }
    $colSwapped[] = $colTrans;
  }
  /*
  for ($i = 0; $i < $numRows; $i++){      // the actual loop that carries out the double transposition process

    do{
      $rowTrans = rand($i, $numRows);
      //$colTrans = rand(0, $numCols);
    }while (in_array ($rowTrans, $rowSwapped));

    for($j = 0; $j <= $numCols; $j++){      // loop for swapping values in the row
      $temp = $wordArray [$i] [$j];
      $wordArray [$i] [$j] = $wordArray [$rowTrans] [$j];
      $wordArray [$rowTrans] [$j] = $temp;
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
  */

  $key[] = $rowSwapped;
  $key[] = $colSwapped;

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

// --------------------------------------------------------------------- //

function RC4Crypter ($input, $key){
  // INITIALIZATION FOR STREAM BEGINS HERE!
  $s;                                     // the first stream we init in RC4
  $k = $key;                               // Keystream array
  $i = 0;                                  // for loops
  $j = 0;                                  // for loops
  $t;                                     // temporary array for RC4; initially contains the key or a repeated key array (iff it's less than 256 in size)
  $temp = 0;                              // for swaps
  $byteCap = 256;                         // this is the RC4 cipher cap in general as it works with 256 bytes
  $n = rand(0, 256);                // FIX ME: 'n' bytes of key; randomly generated due to lack of understanding; CORRECT TO DESIRABLE VALUE

  $plaintxt = $input;
  $ciphertxt = "";

  for ($i = 0; $i < $byteCap; $i++){
    $s[$i] = $i;
    //$k[$i] = $key[$i % $n];
  }

  for ($i = 0; $i < $byteCap; $i++){
    $t[] = $key[$i % sizeOf($key)];
  }


  for($i = 0; $i < $byteCap; $i++){
    $j = ($j + $s[$i] + $t[$i]) % 256;
    $temp = $s [$i];
    $s [$i] = $s [$j];
    $s[$j] = $temp;
  }

  $i = 0;
  $j = 0;
  $temp = 0;

  // INITIALIZATION FOR STREAM ENDS HERE!

  // KEYSTREAM SHUFFLE BEGINS


  foreach ($k as $value){         //FIX ME: Test this; I don't have a lot of xp with foreach loops and iterator loops so this loop's logic might need tweaking
    $i = ($i + 1) % 256;
    $j = ($j + $s [$i]) % 256;
    $temp = $s [$i];
    $s [$i] = $s [$j];
    $s [$j] = $temp;
    $t = ($s [$i] + $s [$j]) % 256;
    $value = $s[$t];
  }

  // KEYSTREAM SHUFFLE ENDS

  // The plaintext encryption starts here!

  for ($i = 0; $i < strlen($plaintxt); $i++){
    $ciphertxt.= ($plaintxt{$i} XOR $k [$i])." ";
  }

  echo "plaintext: ".$plaintxt."\n";
  echo "ciphertext: ".$ciphertxt."\n";

  return $ciphertxt;

}

// --------------------------------------------------------------------- //

function RC4Decrypter ($input){

}

// --------------------------------------------------------------------- //

function DESCrypter ($input){

}

function CrapTextToHex ($input){              // DEFUNCT FUNCTION
  $binVal = "";
  $i = 0;
  $hexTable;
  $answer;

  $hexTable ['0'] = "0000";
  $hexTable ['1'] = "0001";
  $hexTable ['2'] = "0010";
  $hexTable ['3'] = "0011";
  $hexTable ['4'] = "0100";
  $hexTable ['5'] = "0101";
  $hexTable ['6'] = "0110";
  $hexTable ['7'] = "0111";
  $hexTable ['8'] = "1000";
  $hexTable ['9'] = "1001";
  $hexTable ['A'] = "1010";
  $hexTable ['B'] = "1011";
  $hexTable ['C'] = "1100";
  $hexTable ['D'] = "1101";
  $hexTable ['E'] = "1110";
  $hexTable ['F'] = "1111";

  foreach ($hexTable as $val1){
    foreach ($hexTable as $index => $val2){
      if ($val1 == $index){
        $binVal = $val2;
      }
    }
    $answer .= $binVal;
  }
  return $answer;
}

function TexToHex ($input){        // mcuh more efficient and better!
  $answer = "";
  $hexVal;
  $ascVal;
  $i = 0;

  for ($i = 0; $i < strlen($input); $i++){
    $ascVal = ord($input{$i});
    $hexVal = dechex($ascVal);
    $answer.= $hexVal;
  }

  return $answer;
}

function hexToTex($input){
  $answer = "";
  $texVal;
  $ascVal;
  $i = 0;

  for ($i = 0; $i < strlen($input); $i += 2){
    $ascVal = hexdec(substr($input, $i, 2));
    $texVal = chr($ascVal);
    $answer.= $texVal;
  }

  return $answer;
}

function msgProcess($input , $subKey){              // operation 2 on the right half of the message; performs XOR on expanded subkey and right half

  $validSize = 48;
  $i = 0;
  $answer;

  if ((sizeOf($input) != $validSize) || (sizeOf($subKey) != $validSize)){
    echo "CANNOT XOR BITS! INVALID SIZE OF SUBKEY AND/OR ARRAY! \n";
    return $answer;
  }

  for ($i = 0; $i < sizeOf($input); $i++){
    $answer[] = $input[$i] XOR $subkKey[$i];
  }

  return $answer;
}

function expansionBox ($input){                     // takes input value array and expands the 32 bit array into a 32 bit one
  $smallSize = 32;
  $i = 0;
  $j = 0;
  $k = 0;
  $rounds = $smallSize / 4;

/*
  for ($i = 0; $i < $smallSize; $i++){            // for testing
    $input [$i] = $i;
  }
*/
  if (sizeOf($input) != $smallSize){
    echo "Expansion box error! not a valid array for input! \n";
    return;
  }

  $expInp;

  print_r($input);

  for ($i = 0; $i < $smallSize; $i+= 8){
    $expInp[] = $input [rand(0, 31)];
    $expInp[] = $input [rand(0, 31)];
      for ($j = $i; $k < $rounds; $j++){
        $expInp[] = $input[$j];
        $k++;
      }
      $k = 0;
      $expInp[] = $input[$j - 1];
      $expInp[] = $input[$j - 2];
  }

  print_r($expInp);

  return $expInp;
}

function subBox($input){        // the substition box in the DES encryption process
  $validSize = 32;
  $reducedVal;
  if (sizeOf($input) != $validSize){
    echo "SIZE OF INPUT NOT VALID FOR S BOX! \n";
  }

  //      ROW  1 FOR LOOKUP TABLE IN THE FORM OF AN ASSOCIATIVE ARRAY
  $lookupTable ["00"] ["0000"] = "1110";
  $lookupTable ["00"] ["0001"] = "0100";
  $lookupTable ["00"] ["0010"] = "1101";
  $lookupTable ["00"] ["0011"] = "0001";
  $lookupTable ["00"] ["0100"] = "0010";
  $lookupTable ["00"] ["0101"] = "1111";
  $lookupTable ["00"] ["0110"] = "1011";
  $lookupTable ["00"] ["0111"] = "1000";
  $lookupTable ["00"] ["1000"] = "0011";
  $lookupTable ["00"] ["1001"] = "1010";
  $lookupTable ["00"] ["1010"] = "0110";
  $lookupTable ["00"] ["1011"] = "1100";
  $lookupTable ["00"] ["1100"] = "0101";
  $lookupTable ["00"] ["1101"] = "1001";
  $lookupTable ["01"] ["1110"] = "0000";
  $lookupTable ["00"] ["1111"] = "0111";

  //      ROW  2 FOR LOOKUP TABLE IN THE FORM OF AN ASSOCIATIVE ARRAY
  $lookupTable ["01"] ["0000"] = "0000";
  $lookupTable ["01"] ["0001"] = "1111";
  $lookupTable ["01"] ["0010"] = "0111";
  $lookupTable ["01"] ["0011"] = "0100";
  $lookupTable ["01"] ["0100"] = "1110";
  $lookupTable ["01"] ["0101"] = "0010";
  $lookupTable ["01"] ["0110"] = "1101";
  $lookupTable ["01"] ["0111"] = "0001";
  $lookupTable ["01"] ["1000"] = "1010";
  $lookupTable ["01"] ["1001"] = "0110";
  $lookupTable ["01"] ["1010"] = "1100";
  $lookupTable ["01"] ["1011"] = "1011";
  $lookupTable ["01"] ["1100"] = "1001";
  $lookupTable ["01"] ["1101"] = "0101";
  $lookupTable ["01"] ["1110"] = "0011";
  $lookupTable ["01"] ["1111"] = "1000";

  //      ROW  3 FOR LOOKUP TABLE IN THE FORM OF AN ASSOCIATIVE ARRAY
  $lookupTable ["10"] ["0000"] = "0100";
  $lookupTable ["10"] ["0001"] = "0001";
  $lookupTable ["10"] ["0010"] = "1110";
  $lookupTable ["10"] ["0011"] = "1000";
  $lookupTable ["10"] ["0100"] = "1101";
  $lookupTable ["10"] ["0101"] = "0110";
  $lookupTable ["10"] ["0110"] = "0010";
  $lookupTable ["10"] ["0111"] = "1011";
  $lookupTable ["10"] ["1000"] = "1111";
  $lookupTable ["10"] ["1001"] = "1100";
  $lookupTable ["10"] ["1010"] = "1001";
  $lookupTable ["10"] ["1011"] = "0111";
  $lookupTable ["10"] ["1100"] = "0011";
  $lookupTable ["10"] ["1101"] = "1010";
  $lookupTable ["10"] ["1110"] = "0101";
  $lookupTable ["10"] ["1111"] = "0000";

  //      ROW  4 FOR LOOKUP TABLE IN THE FORM OF AN ASSOCIATIVE ARRAY
  $lookupTable ["11"] ["0000"] = "1111";
  $lookupTable ["11"] ["0001"] = "1100";
  $lookupTable ["11"] ["0010"] = "1000";
  $lookupTable ["11"] ["0011"] = "0010";
  $lookupTable ["11"] ["0100"] = "0100";
  $lookupTable ["11"] ["0101"] = "1001";
  $lookupTable ["11"] ["0110"] = "0001";
  $lookupTable ["11"] ["0111"] = "0111";
  $lookupTable ["11"] ["1000"] = "0101";
  $lookupTable ["11"] ["1001"] = "1011";
  $lookupTable ["11"] ["1010"] = "0011";
  $lookupTable ["11"] ["1011"] = "1110";
  $lookupTable ["11"] ["1100"] = "1010";
  $lookupTable ["11"] ["1101"] = "0000";
  $lookupTable ["11"] ["1110"] = "0110";
  $lookupTable ["11"] ["1111"] = "1101";

  $paddedBits = "";
  $centralBits = "";
  $numBits = 6;                 // number of bits in each value in the array
  $firstIn = 0;
  $lastIn = 5;
  $temp = "";

  for ($i = 0; $i < sizeOf($input); $i++){      // looksup values in the table and gets the reduced values
    for ($j = 0; $j < $numBits; $j++){
      $temp = $input[$i];

      if ($j === $firstIn){
        $paddedBits .= $temp{$j};
      }

      elseif ($j === $lastIn){
        $paddedBits .= $temp{$j};
      }

      else{
        $centralBits .= $temp{$j};
      }
    }

    $reducedVal[] = $lookupTable [$paddedBits] [$centralBits];
    $paddedBits = "";
    $centralBits = "";
  }

  return $reducedVal;
}

function permuteBox ($input){           //  Permutation box function for shaking up the vals in the array
  $validSize = 32;
  if (sizeOf($input) != $validSize){
    echo "ERROR IN P-BOX! INVALID SIZE FOR INPUT ARRAY! \n";
    return $input;
  }
  shuffle($input);

}
