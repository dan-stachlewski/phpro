<?php

/*** INITIATE SESSION ***/
session_start();

/*** CHECK THE FORM HAS BEEN SUBMITTED AND THE NAME & PASSWORD IS NOT EMPTY ***/
if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {

	/*** SET THE SESSION VARIABLES ***/
	$_SESSION['username'] = $_POST['username'];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Session-2</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
	<h2>Session-2</h2>
    <?php

	/*** CHECK WHETHER SESSION VARIABLE ISSET ***/
    if (isset($_SESSION['username'])) {
		/*** IF SET GREET BY NAME ***/
		echo 'Hi, ' . $_SESSION['username'] . ' . <a href="session-3.php">Next</a>';
    } else {
		/*** IF NOT SET SET BACK TO LOGIN ***/
    	echo 'Who are you? <a href="session-1.php">Login</a>';
    }

    ?>
        <script src="js/main.js"></script>
    </body>
</html>
