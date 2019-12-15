<?php

    require_once 'login.php';
    $conn =  new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error) die($conn->connect_error);

	function startPage(){
		echo <<<_END
		<html>
			<head>
			<title>Final</title>
		</head>
_END;
	}

function forums(){
		echo <<<_END
		    <body>
		        <h1>Login/Signup</h1>

		        <hr/>

		        <h2>Login</h2>
		        <form method ='post' action='#' enctype="multipart/form-data">
		            <input type="text" name="RegistrationUserName" placeholder="Username"><br>
		            <input type="password" name="RegistrationPassword" placeholder="Password"><br>
		            <input type="submit" value="Login" />
		        </form>

_END;
	}


	function forums2(){
		echo <<<_END
		    <body>

		        <h2>Signup</h2>
		        <form method ='post' action='#' enctype="multipart/form-data">
		            <input type="text" name="RegistrationUserName" placeholder="Username"><br>
		            <input type="email" name="RegistrationEmail" placeholder="Email Address"><br>
		            <input type="password" name="RegistrationPassword" placeholder="Password"><br>
		            <input type="submit" value="Sign up!" />
		        </form>
_END;
	}

function endPage(){
	echo("</body></html>");
}
