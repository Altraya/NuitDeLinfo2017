<?php
/* DB connect */
$dbname = "Lamastiroute";
$host = "localhost";

$dsn = 'mysql:dbname='.$dbname'.;host='.$host;
$user = 'dbuser';
$password = 'dbpass';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>