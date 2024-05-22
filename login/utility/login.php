<?php
//File per connessione al database
include("config.php");

// Variabili restituite dal metodo POST
$email = $_POST['email'];
$password = $_POST['password'];


// Query 
$q = $pdo->prepare("SELECT * FROM users WHERE email = :email");
// Parametro di tipo stringa
$q->bindParam(':email', $email, PDO::PARAM_STR);  
// Esegui la query
$q->execute();  
 // Recupera i dati come un array associativo
$q->setFetchMode(PDO::FETCH_ASSOC); 

$row = $q->fetch();  // Recupera il primo (e unico) risultato

// Se esiste una riga, cioè l'utente esiste
if ($row) {
    // Controllo della password in chiaro
    if ($row["password"] === $password) {
        session_start();
        // Salva l'id dell'utente nella sessione
        $_SESSION['id'] = $row["id"];  
        // Redirect alla pagina dell'area riservata
        header("location: ../area_riservata.php");  
        die();
    } else {
        echo 'Password errata.';
        header("location: ../error.php?error=Password errata");
        die();
    }
} else {
    // Redirect a pagina errore
    header("location: ../error.php?error=Email o Username errati"); 
    die();
}
?>
