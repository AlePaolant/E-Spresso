<?php

/* LATO SERVER */

//PDO Connessione al db
$servername = "localhost";
$username = "postgres";
$passworddb = "admin";
$dbname = "users";

try {
    $dbh = new PDO("pgsql:$servername;dbname=$dbname", $username, $passworddb);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  /* connette gli attributi del server */
    echo "Connessione riuscita";
} catch (PDOException $e) {
    print "Errore di connessione: " . $e->getMessage() . "<br/>";
    die();
}
?>