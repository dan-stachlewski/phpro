<?php

/*** BEGIN THE SESSION ***/
session_start();

/*** SET A FORM TOKEN ***/
$form_token = md5(uniqid('auth', true));

/*** SET THE SESSION FORM TOKEN ***/
$_SESSION['form_token'] = $form_token;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Authentication System</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
	<h1>Login Authentication System</h1>
        <script src="js/main.js"></script>
    </body>
</html>