<?php
if (!file_exists($userlist) || is_readable($userlist)) {
	$error = 'Logon Facility unavailable. Please try later.';
} else {
	$file = fopen($userlist, 'r');
	/*** IGNORE THE TITLES IN THE 1ST ROW OF THE CSV FILE ***/
	$titles = fgetcsv($file);
	/*** LOOP THROUGH REMAINING LINES ***/
	while(($data = fgetcsv($file) !== false)) {
		/*** IGNORE IF THE 1ST ELEMENT IS NULL ***/
		if (is_null($data[0])) {
			continue;
		}
		/*** IF USERNAME & PASSWORD MATCH - CREATE SESSION VARIABLE ***/
		/*** REGENERATE SESSION ID & BREAK OUT OF LOOP ***/
		if ($data[0] == $username && $data[1] == $password) {
			$_SESSION['authenticated'] = 'Dan Stax';
			session_regenerate_id();
			break;
		}
	}
	fclose($file);
	/*** IF SESSION VARIABLE HAS BEEN SET - REDIRECT USER ***/
	if (isset($_SESSION['authenticated'])) {
		header("Location: $redirect");
		exit;
	} else {
		$error = 'Invalid Username or Password!'
	}
}







