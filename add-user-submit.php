<?php

/*** BEGIN THE SESSION ***/
session_start();

/*** CHECK: USERNAME, PASSWORD & FORM TOKEN HAVE BEEN SENT ***/
if (!isset($_POST['username'], $_POST['password'], $_POST['form_token'])) {
	$message = 'Please enter a Valid Username and Password!';
}

/*** CHECK: FORM TOKEN IS VALID ***/
elseif ($_POST['form_token']) {

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sample Login</title>
        <link rel="stylesheet" href="css/style.css"> <link rel="author" href="humans.txt">
    </head>
    <body>
	<h1>Sample Login</h1>
	<form action="add-user-submit.php" method="POST">
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
	</form>
        <script src="js/main.js"></script>
    </body>
</html>