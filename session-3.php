<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Session-3</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
	<h2>Session-3</h2>
    <?php

    /*** CHECK WHETHER SESSION VARIABLE ISSET ***/
    if (isset($_SESSION['username'])) {
        /*** IF SET GREET BY NAME ***/
        echo 'Hi, ' . $_SESSION['username'] . ' . See, I remembered your name! <br />';
        /*** UNSET SESSION VARIABLE ***/
        unset($_SESSION['username']);
        /*** INVALIDATE SESSION COOKIE ***/
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-86400, '/');
        }
        /*** END SESSION ***/
        session_destroy();
        echo '<a href="session-2.php">Page 2</a>';
    } else {
        /*** DISPLAY IF NOT RECOGNISED ***/
        echo 'Sorry, I don\'t know you!<br />';
        echo "<a href='session-1.php'>Login</a>";
    }

    ?>
        <script src="js/main.js"></script>
    </body>
</html>