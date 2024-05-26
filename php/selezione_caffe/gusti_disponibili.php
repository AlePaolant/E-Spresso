<?php
/*------------------------------------------------------------------------
        RECUPERO DI TUTTI I GUSTI DISPONIBILI NEL DATABASE
--------------------------------------------------------------------------*/

//File per connessione al database
include("../../login/utility/config.php");

// Esegui la query per recuperare le corposità disponibili (restituisce oggetto di tipo statement di database)
$stmt = $pdo->query("SELECT DISTINCT gusto FROM gustidisponibili ORDER BY gusto ASC;");
$gusti = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Restituisci i gusti disponibili come JSON
header('Content-Type: application/json');
echo json_encode($gusti);
?>
