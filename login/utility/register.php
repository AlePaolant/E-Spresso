<?php
//File per connessione al database
include("config.php");


/*------------------------------------------------------
                    LATO SERVER
                    REGISTER
-------------------------------------------------------*/
///Variabili restituite dal metodo POST
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];
$indirizzo = $_POST['indirizzo'];
$n_civico = $_POST['n_civico'];
$citta = $_POST['citta'];
$numero_telefono = $_POST['numero_telefono'];

//Controlla se l'utente esiste già nel db
$q = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$q->bindParam(':email', $email);
$q->execute(); // eseguo la query
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->rowCount();
if ($rows > 0) {
    while ($row = $q->fetch()) {
        header("location: ../error.php?error=L'email o l'username esiste già!");
        die();
    }
}

//Inserisce il nuovo utente nel db
//$password = password_hash($password, PASSWORD_DEFAULT); - HASH
$q = $pdo->prepare("INSERT INTO users(nome,cognome,email,password,indirizzo,n_civico,citta,numero_telefono) 
    VALUES (:nome, :cognome, :email, :password, :indirizzo, :n_civico, :citta, :numero_telefono)");
$q->bindParam(':nome', $nome);
$q->bindParam(':cognome', $cognome);
$q->bindParam(':email', $email);
$q->bindParam(':password', $password);
$q->bindParam(':indirizzo', $indirizzo);
$q->bindParam(':n_civico', $n_civico);
$q->bindParam(':citta', $citta);
$q->bindParam(':numero_telefono', $numero_telefono);

$res = $q->execute(); // eseguo la query

if ($res) {
    header("location: ../login.php?user=yes");
} else {
    header("location: ../error.php?error=" . $conn->error);
}