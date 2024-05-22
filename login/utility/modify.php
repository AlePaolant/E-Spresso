<?php
//File per connessione al database
include("config.php");

///Variabili restituite dal metodo POST
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];
$indirizzo = $_POST['indirizzo'];
$n_civico = $_POST['n_civico'];
$citta = $_POST['citta'];
$numero_telefono = $_POST['numero_telefono'];


//Inserisce il nuovo utente nel db
//$password = password_hash($password, PASSWORD_DEFAULT); - HASH
$q = $pdo->prepare("UPDATE users SET nome=:nome ,cognome=:cognome,email=:email,
password=:password,indirizzo=:indirizzo,n_civico=:n_civico,citta=:citta,numero_telefono=:numero_telefono)");

$q->bindParam(':nome', $nome);
$q->bindParam(':cognome', $cognome);
$q->bindParam(':email', $email);
$q->bindParam(':password', $password);
$q->bindParam(':indirizzo', $indirizzo);
$q->bindParam(':n_civico', $n_civico);
$q->bindParam(':citta', $citta);
$q->bindParam(':numero_telefono', $numero_telefono);
$q->execute();




