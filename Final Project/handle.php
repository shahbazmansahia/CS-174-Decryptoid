<?php
require_once 'simplesub.php';
require_once 'dt/php';

//simple substituion file upload encrypt #fix bug
echo "<html><head><title>Result</title></head><body>";
if($_FILES['ssefile'] && $_POST['sskey']){
	$key = $_POST['sskey'];
	if(strlen($key) == 26){
		$file = $_FILES['ssefile']['tmp_name'];
	    $file_type=$_FILES['ssefile']['type'];
	    // echo($file_type);
	    // echo $file;
	    if(file_exists($input)){
	    $text = filecollector($file,$file_type);
	    simpleCrypter($text,$key);
		}
	}
	else{
		echo "Invalid key make sure the key is 26 characters long";
	}
}

//decryption of simple substitution through file upload
if($_FILES['ssdfile'] && $_POST['sskey']){
	$key = $_POST['sskey'];
	if(strlen($key) == 26){
		$file = $_FILES['ssdfile']['tmp_name'];
	    $file_type=$_FILES['ssdfile']['type'];
	    // echo($file_type);
	    // echo $file;
	    if(file_exists($input)){
	    $text = filecollector($file,$file_type);
	    simpleDecrypter($text,$key);
	}
	}
	else{
		echo "Invalid key make sure the key is 26 characters long";
	}
}

//simple substitution through text upload
if($_POST['sseinput'] && $_POST['sskey']){
	$text = $_POST['sseinput'];
	$key = $_POST['sskey'];
	simpleCrypter($text,$key);
}

//decrytion of simple substitution throgh text upload
if($_POST['ssdinput'] && $_POST['sskey']){
	$text = $_POST['ssdinput'];
	$key = $_POST['sskey'];
	simpleDecrypter($text,$key);
}

//double substitution through file upload
if($_FILES[]'dtefile'] && $_POST['dtkey1'] && $_POST['dtkey2']){
	$key1 = $_POST['dtkey1'];
	$key2 = $_POST['dtkey2'];
	$bound = strlen($key1)*strlen($key2);
	if(file_exists($input)){
		$text = filecollector($file,$file_type);
		if($bound>strlen($text)){
		double_transpose_encrypt($text,$key1,$key2);
		}
		else{
			echo("Use a set of permutations that can accomodate the size of your input.")
		}
	}

}


echo '<br><a href="decryptoid.php">Click here to go back to Decrytoid.</a>';

function typesafety($filetype){
	if($filetype==="text/plain"){
		return true;
	}
	return false;
}


function filecollector($input,$file_type){
	if(typesafety($file_type)){
		if(file_exists($input)){
	        $fh = fopen($input, 'r') or die("File does not exist");
		    $operand = fread($fh, filesize($input));
	        // $text = preg_replace('/\s/', '', $operand);
	        fclose($fh);
	        return $operand;
		}
	}
	else{
		echo "Incorrect file type. Try uploading a .txt file.<br>";
		return "";
	}
}
echo "</body></html>";
?>
