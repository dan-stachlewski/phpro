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
    /*** MySQL USERNAME ***/
    /*** MySQL PASSWORD ***/
    /*** MySQL DATABASE NAME ***/















}


?>

