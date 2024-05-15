<?php
/*------------------------------------------------------------------------
        RECUPERO DI TUTTE LE CORPOSITA DISPONIBILI NEL DATABASE
--------------------------------------------------------------------------*/

//File per connessione al database
include("connessione.php");

// Esegui la query per recuperare le corposità disponibili (restituisce oggetto di tipo statement di database)
$stmt = $pdo->query("SELECT corposita FROM corpositadisponibili ORDER BY id;");
$corposita = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Restituisci le corposità disponibili come JSON
header('Content-Type: application/json');
echo json_encode($corposita);
?>