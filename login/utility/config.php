<?php

/*------------------------------------------------------
                    LATO SERVER 
            Connessione PDO al database
--------------------------------------------------------*/

$host = 'localhost';
$db = 'e-spresso';
$user = 'postgres';
$pass = 'admin';
$port = '5432';
$dsn = "pgsql:host=$host;port=$port;dbname=$db";

try {
    // Crea una nuova connessione PDO
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //echo "Connessione riuscita!";
} catch (PDOException $e) {
    echo "Errore di connessione: " . $e->getMessage() . "<br/>";
    die();
}
?>