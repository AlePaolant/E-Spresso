<?php
/*------------------------------------------------------------------------
       SCRIPT DI SELEZIONE CHE CERCA NEL DATABASE I CAFFE 
--------------------------------------------------------------------------*/

//File per connessione al database
include("connessione.php");

// Recupera i filtri dalla richiesta GET
$corposita = $_GET['corposita'];
$acidita = $_GET['acidita'];
$gusto1 = $_GET['gusto1'];
$gusto2 = $_GET['gusto2'];
$retrogusto1 = $_GET['retrogusto1'];
$retrogusto2 = $_GET['retrogusto2'];

// Esegue la query per trovare i caffè corrispondenti ai filtri
$stmt = $pdo->prepare("
    SELECT t.nome
    FROM tipicaffe t
    LEFT JOIN aciditadisponibili a ON t.idacidita = a.id
    LEFT JOIN corpositadisponibili c ON t.idcorposita = c.id
    LEFT JOIN gustidisponibili g1 ON t.idgusto1 = g1.id
    LEFT JOIN gustidisponibili g2 ON t.idgusto2 = g2.id
    LEFT JOIN retrogustidisponibili r1 ON t.idretrogusto1 = r1.id
    LEFT JOIN retrogustidisponibili r2 ON t.idretrogusto2 = r2.id
    WHERE
        (c.corposita = :corposita OR :corposita IS NULL)
        AND (a.acidita = :acidita OR :acidita IS NULL)
        AND ((g1.gusto = :gusto1 AND :gusto1 IS NOT NULL) OR :gusto1 IS NULL)
        AND ((g2.gusto = :gusto2 AND :gusto2 IS NOT NULL) OR :gusto2 IS NULL)
        AND ((r1.retrogusto = :retrogusto1 AND :retrogusto1 IS NOT NULL) OR :retrogusto1 IS NULL)
        AND ((r2.retrogusto IS NULL AND :retrogusto2 IS NULL) OR (r2.retrogusto = :retrogusto2 AND :retrogusto2 IS NOT NULL))
");
$stmt->bindParam(':corposita', $corposita);
$stmt->bindParam(':acidita', $acidita);
$stmt->bindParam(':gusto1', $gusto1);
$stmt->bindParam(':gusto2', $gusto2);
$stmt->bindParam(':retrogusto1', $retrogusto1);
$stmt->bindParam(':retrogusto2', $retrogusto2);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$errorInfo = $stmt->errorInfo();
if ($errorInfo[0] !== PDO::ERR_NONE) {
    echo "Errore durante l'esecuzione della query: " . $errorInfo[2];
}


// Verifica se sono stati trovati caffè
if (empty($results)) {
    // Nessun caffè trovato, restituisci un messaggio di avviso
    echo json_encode(array('message' => 'Nessun caffè trovato con i gusti e i retrogusti selezionati, vuoi crearne uno?'));
} else {
    // Caffè trovati, restituisci i risultati come JSON
    header('Content-Type: application/json');
    echo json_encode($results);
}
?>