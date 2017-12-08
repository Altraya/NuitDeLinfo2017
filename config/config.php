<?php
/* DB connect */
$dbname = "Lamastiroute";
$host = "localhost";

$dsn = 'mysql:dbname='.$dbname.';host='.$host;
$user = 'root';
$password = '';

try {
    $dbPDO = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>