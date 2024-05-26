<?php
//File per connessione al database
include("../../login/utility/config.php");

// Recupera i filtri dalla richiesta GET e controlla se sono vuoti
$corposita = $_GET['corposita'];
$acidita = $_GET['acidita'];
$gusto1 = $_GET['gusto1'];
$gusto2 = $_GET['gusto2'];
$retrogusto1 = $_GET['retrogusto1'];
$retrogusto2 = $_GET['retrogusto2'];

// Trasforma valori vuoti in NULL
if (empty($corposita)) $corposita = null;
if (empty($acidita)) $acidita = null;
if (empty($gusto1)) $gusto1 = null;
if (empty($gusto2)) $gusto2 = null;
if (empty($retrogusto1)) $retrogusto1 = null;
if (empty($retrogusto2)) $retrogusto2 = null;


try{
// Esegui la query per trovare i caffè corrispondenti ai filtri
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
        AND (g1.gusto = :gusto1 OR :gusto1 IS NULL)
        AND (g2.gusto = :gusto2 OR :gusto2 IS NULL)
        AND (r1.retrogusto = :retrogusto1 OR :retrogusto1 IS NULL)
        AND (r2.retrogusto = :retrogusto2 OR :retrogusto2 IS NULL)
");
$stmt->bindParam(':corposita', $corposita);
$stmt->bindParam(':acidita', $acidita);
$stmt->bindParam(':gusto1', $gusto1);
$stmt->bindParam(':gusto2', $gusto2);
$stmt->bindParam(':retrogusto1', $retrogusto1);
$stmt->bindParam(':retrogusto2', $retrogusto2);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verifica se sono stati trovati caffè
if (empty($results)) {
    // Nessun caffè trovato, restituisci un messaggio di avviso
    echo json_encode(array('message' => 'Nessun caffè trovato con le combinazioni selezionate, vuoi crearne uno?'));
} else {
    // Caffè trovati, restituisci i risultati come JSON
    header('Content-Type: application/json');
    echo json_encode($results);
}
} catch (PDOException $e) {
    // Gestione dell'eccezione in caso di errore
    echo json_encode(array('error' => $e->getMessage()));
}
?>