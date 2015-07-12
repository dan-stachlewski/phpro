<?php

$error = '';
if (isset($_POST['login'])) {
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	/*** LOCATION OF USERNAME & PASSWORD ***/
	$userlist = 'C:\xampp\htdocs\private';
	/*** LOCATION TO REDIRECT ON SUCCESS ***/
	$redirect = 'menu.php';
	require_once 'includes/authenticate.php';
}

?>
<!-- SIMPLE LOGIN FORM HTML -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sample Login</title>
        <link rel="stylesheet" href="css/login.css"> <link rel="author" href="humans.txt">
    </head>
    <body>
    <div id="page-wrapper">
		<h1>Sample Login</h1>
		<form action="" method="POST">
		<fieldset>
		    <ul>
		        <li>
		            <label for="username">Username</label>
		            <input id="username" name="username" type="text" value="">
		        </li>
		        <li>
		            <label for="password">Password</label>
		            <input id="password" name="password" type="text" value="">
		        </li>
		        <li>
		            <input id="login" name="login" type="submit" value="Login!">
		        </li>
		    </ul>
		</fieldset>
		</form>
	        <script src="js/main.js"></script>
    </div>
    </body>
</html>