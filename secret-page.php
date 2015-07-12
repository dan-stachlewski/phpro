<?php
/*** REF TO [ pp250 ] FOR LOGIN & LOGOUT INC CODE ***/

session_start();

/*** IF SESSION VARIABLE NOT SET - REDIRECT USER TO LOGIN PAGE ***/
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'Dan Stax') {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['authenticated'];

/*** RUN THIS SCRIPT [ ONLY IF LOGOUT BUTTON HAS BEEN CLICKED ] ***/
if (isset($_POST['logout'])) {
    /*** EMPTY $_SESSION ARRAY ***/
    $_SESSION = [];
    /*** INVALIDATE THE SESSION COOKIE ***/
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-86400, '/');
    }
    /*** END SESSION & REDIRECT ***/
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Secret Admin Page</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
    <header>

    </header>
    <div id="page-wrapper">
    <article>
       <h1 class="warning-header">Secret Admin Access Only!</h1>
    <section>
    <p>Welcome, <?= $username ?> to the <br />"Top Secret Admin Page".</p>
        <form action="" method="POST">
            <input id="logout" name="logout" type="submit" value="Log out!">
        </form>
    </section>
    <section>
        <p><a href="menu.php">Back</a></p>
    </section>
        <script src="js/main.js"></script>
    </article>
    </div>
    </body>
</html>