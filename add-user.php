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
	<h2>Add a User</h2>
	<!-- LOGIN FORM -->
	<form action="add-user-submit.php" method="POST">
		<fieldset>
		<!-- USERNAME INPUT FIELD-->
			<p>
				<label for="username">Username</label>
				<input type="text" id="username" name="username" maxlength="20" value="" >
			</p>
		<!-- PASSWORD INPUT FIELD-->
			<p>
				<label for="password">Password</label>
				<input type="text" id="password" name="password" maxlength="20" value="" >
			</p>
		<!-- 'HIDDEN' FORM TOKEN INPUT FIELD-->
			<p>
				<input type="hidden" name="form_token" value="<?= $form_token; ?>" >
		<!-- SUBMIT BUTTON [ LOGIN ] -->
				<input type="submit" value="&rarr; Login" >
			</p>
		</fieldset>
	</form>
    </body>
</html>