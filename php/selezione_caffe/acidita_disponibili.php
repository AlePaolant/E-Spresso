<?php
/*------------------------------------------------------------------------
            RECUPERO DI TUTTE LE ACIDITA DISPONIBILI NEL DATABASE
--------------------------------------------------------------------------*/

//File per connessione al database
include("../../login/utility/config.php");

// Esegui la query per recuperare le acidità disponibili (restituisce oggetto di tipo statement di database)
$stmt = $pdo->query("SELECT acidita FROM aciditadisponibili ORDER BY id;");
$acidita = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Restituisci le acidita disponibili come JSON
header('Content-Type: application/json');
echo json_encode($acidita);
?>