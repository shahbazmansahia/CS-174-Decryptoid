<?php

function forum_gen($mode,$algo){
    $e = "Encrypt";
    $d = "Decrypt";
    $Legend = "";
    $fn = "";
    $in = "";
    $field ="";

    if($mode==="encrypt"){
        if($algo==="SS"){
            $Legend= "Simple Substituion[$e]";
            $fn = "ssefile";
            $in = "sseinput";
            $field = 'Enter a Key <input type="text" name="sskey" placeholder="Key"><br>';
            generate($Legend,$fn,$in,$e, $field);
            return;
        }
        elseif($algo==="DT"){
            $Legend= "Double Transposition[$e]";
            $fn = "dtefile";
            $in = "dteinput";
            $field = 'Enter Perumation Keys <input type="text" name="dtkey1" placeholder="Row Key"><br><input type="text" name="dtkey2" placeholder="Column Key">';
            generate($Legend,$fn,$in,$e, $field);
            return;
        }
        elseif($algo==="RC4"){
            $Legend= "RC4[$e]";
            $fn = "rcefile";
            $in = "rceinput";
            generate($Legend,$fn,$in,$e, $field);
            return;
        }
        else{
            $Legend= "DES[$e]";
            $fn = "desefile";
            $in = "deseinput";
            generate($Legend,$fn,$in,$e, $field);
            return;
        }
    }
    else{
        if($algo==="SS"){
            $Legend= "Simple Substituion[$d]";
            $fn = "ssdfile";
            $in = "ssdinput";
            $field = 'Enter a Key <input type="text" name="sskey" placeholder="Key"><br>';
            generate($Legend,$fn,$in,$d, $field);
            return;
        }
        elseif($algo==="DT"){
            $Legend= "Double Transposition[$d]";
            $fn = "dtdfile";
            $in = "dtdinput";
            $field = 'Enter Perumation Keys <input type="text" name="dtkey1" placeholder="Row Key"><br><input type="text" name="dtkey2" placeholder="Column Key">';
            generate($Legend,$fn,$in,$d, $field);
            return;
        }
        elseif($algo==="RC4"){
            $Legend= "RC4[$d]";
            $fn = "rcdfile";
            $in = "rcdinput";
            generate($Legend,$fn,$in,$d, $field);
            return;
        }
        else{
            $Legend= "DES[$d]";
            $fn = "desdfile";
            $in = "desdinput";
            generate($Legend,$fn,$in,$d, $field);
            return;
        }
    }
}

function generate($Legend,$fn,$in,$t,$field){
echo('<form action= "handle.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>'.$Legend.'</legend>
        Upload .txt file <br>
        <input type="file" name="'.$fn.'" ><br><br>
        (or)<br><br>
        Input text
        <input type="text" name="'.$in.'" ><br>
        '.$field.'
        <input type="submit" value="'.$t.'"><br>
    </fieldset>
</form>
');
}



?>
