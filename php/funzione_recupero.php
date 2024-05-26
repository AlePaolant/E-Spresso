<?php
function getDbConnection() {
    // Includi il file di configurazione
    include("../login/utility/config.php");

    // Restituisci la connessione PDO
    return $pdo;
}

function getData() {
    $pdo = getDbConnection();
    $stmt = $pdo->query('SELECT * FROM users');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

?>
