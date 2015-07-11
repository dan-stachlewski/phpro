<?php

/*** BEGIN THE SESSION ***/
session_start();

/*** CHECK: USERNAME, PASSWORD & FORM TOKEN HAVE BEEN SENT ***/
if (!isset($_POST['username'], $_POST['password'], $_POST['form_token'])) {
	$message = 'Please enter a Valid Username and Password!';
}

/*** CHECK: FORM TOKEN IS VALID ***/
elseif ($_POST['form_token'] !=$_SESSION['form-token']) {
    $message = 'Invalid Form submission!';
}

/*** CHECK: USERNAME IS THE CORRECT LENGTH ***/
elseif (strlen($_POST['username']) > 20 || strlen($_POST['username']) < 4) {
    $message = 'Incorrect length for Username!';

}
/*** CHECK: PASSWORD IS THE CORRECT LENGTH ***/
elseif (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 4) {
    $message = 'Incorrect length for Password!';
}

/*** CHECK: USERNAME HAS ONLY ALPHANUMERIC [ CONSISTING OF LETTERS & NUMBERS ONLY ] CHARACTERS ***/
elseif (ctype_alnum($_POST['username']) != true) {
    /*** CHECK: IF THERE IS NO MATCH ***/
    $message = 'Username must be Alpha Numeric - No special characters allowed!';
}

/*** CHECK: PASSWORD HAS ONLY ALPHANUMERIC CHARACTERS ***/
elseif (ctype_alnum($_POST['password']) != true) {
    /*** CHECK: IF THERE IS NO MATCH ***/
    $message = 'Password must be Alpha Numeric - No special characters allowed!';
} else {
    /*** IF WE ARE HERE: THE DATA IS VALILD & WE CAN INSERT THE DATA INTO THE DATABASE ***/
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    /*** ENCRYPT THE PASSWORD ***/
    $password = sha1($password);

    /*** CREATE A DATABASE CONNECTION ***/
        /*** MySQL HOSTNAME ***/
        $mysql_hostname = 'localhost';
        /*** MySQL USERNAME ***/
        $mysql_username = 'root';
        /*** MySQL PASSWORD ***/
        $mysql_password = 'password';
        /*** MySQL DATABASE NAME ***/
        $mysql_dbname = 'authorized';

    /*** USE try{}catch{} ***/
    try {
        $dbh = new PDO("mysql:host = $mysql_hostname; dbname = $mysql_dbname", $mysql_username, $mysql_password);
            /*** ADD SUCCESSFUL CONNECTION MESSAGE - DEV PURPOSES ONLY ***/
            $message = 'You have successfully connected to {$mysql_dbname}!';

            /*** SET ERROR MODE TO EXCEPTIONS ***/
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /*** PREPARE THE INSERT ***/
            $stmt = $dbh->prepare("INSERT INTO users
                                   (username, password)
                                   VALUES
                                   (:username, :password)
                                 ");

            /*** BIND THE PARAMETERS ***/
            $stmt->bidParam(':username', $username, PDO::PARAM_STR);
            $stmt->bidParam(':password', $password, PDO::PARAM_STR, 40);

            /*** EXECUTE THE PREPARED STATEMENT ***/
            $stmt->execute();

            /*** UNSET THE FORM TOKEN SESSION VARIABLE ***/
            unset($_SESSION['form_token']);

            /*** IF NO ERRORS - ADVISE NEW USER ADDED ***/
            $message = 'New User successfully added!';

    } catch(Exception $e) {
            /*** CHECK IF USERNAME ALREADY EXISTS ***/
            if ($e->getCode() == 2300) {
                $message = 'Username already exists! Try again.';
            } else {
            /*** IF MESSAGE RECEIVED SOMETHING HAS GONE WRONG WITH DATABASE CONNECTION ***/
                $message = 'We are unable to process your request. Please try again later.';
            }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Login!</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
    <h1>PHP Login!</h1>
    <p><?= $message; ?></p>
        <script src="js/main.js"></script>
    </body>
</html>



