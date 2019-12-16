<?php

require_once 'login.php';
require_once 'forumgen.php';
$conn = new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die(print("Database error. Please try later!"));

echo <<<_END
<html>
    <head>
        <title>Decryptoid</title>
    </head>
    <body>
        <form action="tester.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Cryptarch</legend>
                Pick Cryptarch's mode
                <select name="en_or_de">
                    <option value="encrypt">Encrypt</option>
                    <option value="decrypt">Decrypt</option>
                </select>
                <br>
                Pick the cipher to encrypyt or decrypt
                <select name="select_enc">
                    <option value="SS">Simple Substituion</option>
                    <option value="DT">Double Transposition</option>
                    <option value="RC4">RC4</option>
                    <option value="DES">DES </option>
                </select>
                <br>
                <input type="submit" value="Request">
            </fieldset>
        </form>

_END;

if(isset($_POST['en_or_de']) && isset($_POST['select_enc'])){
    $mode = $_POST['en_or_de'];
    $algo = $_POST['select_enc'];
    forum_gen($mode,$algo);
}


echo("</body></html>");

?>
