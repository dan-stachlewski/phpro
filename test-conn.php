<?php

$host = 'localhost';
$dbname = 'authorized';
$user = 'root';
$pass = 'password';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch(PDOException $e) {
    echo $e->getMessage();
}

$sth = $dbh->query('SELECT * FROM users');

$sth->setFetchMode(PDO::FETCH_ASSOC);

while($row = $sth->fetch()) {
    echo 'UserID: ' . $row['userID'] . '<br />';
    echo 'Username: ' . $row['username'] . '<br />';
    echo 'Password: ' . $row['username'] . '<br />';
    echo 'Date Registered: ' . $row['date_registered'] . '<br />';
    echo '<br /><br />';
}

echo '<h2>Single Query:</h2>';
$sql = 'SELECT * FROM users WHERE UserID = 2';

foreach($dbh->query($sql) as $row) {
    echo 'UserID: ' . $row['userID'] . '<br />';
    echo 'Username: ' . $row['username'] . '<br />';
    echo 'Password: ' . $row['username'] . '<br />';
    echo 'Date Registered: ' . $row['date_registered'] . '<br />';
    echo '<br /><br />';
}




