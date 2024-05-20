<?php
//File per connessione al database
include("config.php");

// Variabili restituite dal metodo POST
$email = $_POST['email'];
$password = $_POST['password'];


// Query 
$q = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$q->bindParam(':email', $email, PDO::PARAM_STR);  // Parametro di tipo stringa
$q->execute();  // Esegui la query
$q->setFetchMode(PDO::FETCH_ASSOC);  // Recupera i dati come un array associativo

$row = $q->fetch();  // Recupera il primo (e unico) risultato

// Se esiste una riga, cioè l'utente esiste
if ($row) {
    // Controllo della password in chiaro
    if ($row["password"] === $password) {
        session_start();
        $_SESSION['id'] = $row["id"];  // Salva l'id dell'utente nella sessione
        header("location: ../area_riservata.php");  // Redirect alla pagina dell'area riservata
        die();
    } else {
        echo 'Password errata.';
        header("location: ../error.php?error=Password errata");
        die();
    }
} else {
    header("location: ../error.php?error=Email o Username errati");  // Redirect a pagina errore
    die();
}
?>
