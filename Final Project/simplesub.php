<?php

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
  echo "Plain text: ".$input."<br>";
  echo "cipher text: ".$ciphertxt;
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
  echo "cipher text: ".$input."<br>";
  echo "Plain text: ".$plaintxt."<br>";

}

?>
