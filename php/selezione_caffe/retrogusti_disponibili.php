<?php
/*------------------------------------------------------------------------
        RECUPERO DI TUTTI I RETROGUSTI DISPONIBILI NEL DATABASE
--------------------------------------------------------------------------*/

//File per connessione al database
include("connessione.php");

// Esegui la query per recuperare le corposità disponibili (restituisce oggetto di tipo statement di database)
$stmt = $pdo->query("SELECT DISTINCT retrogusto FROM retrogustidisponibili ORDER BY retrogusto ASC;");
$retrogusti = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Restituisci i retrogusti disponibili come JSON
header('Content-Type: application/json');
echo json_encode($retrogusti);
?>