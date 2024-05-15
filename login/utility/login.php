<?php
//File per connessione al database
include("config.php");


/*------------------------------------------------------
                    LATO SERVER 
                        LOGIN
-------------------------------------------------------*/
///Variabili restituite dal metodo POST
$email = $_POST['email'];
$password = $_POST['password'];

//Query 
$q = $pdo->prepare("SELECT * FROM users WHERE email = :email");      
$q->bindParam(':email', $email);        // non passo i dati di mail direttamente nella query per sicurezza
$q->execute();                          // eseguo la query
$q->setFetchMode(PDO::FETCH_ASSOC);     // voglio recuperare i dati come un array associativo
$rows = $q->rowCount();                 // conta tutte le righe restituite dalla query
if ($rows > 0) {                        // se le righe sono più di 0 allora esiste un utente
    while ($row = $q->fetch()) {        // ciclo while tra le righe

        //Password control
        if($row['password']===$password){
            session_start();
            $_SESSION['id'] = $row["id"];
            header("location: ../area_riservata.php");
            die();
        }
        /*
        if (!(password_verify($password, $row["password"]))) {
            header("location: ../error.php?error=Wrong Password");
            die();
        }

        //Start Session - serve per bloccare gli utenti che non hanno fatto il login
        session_start();

        $_SESSION['id'] = $row["id"]; //Save user id in session

        //Redirect alla pagina welcome dell'area riservata
        header("location: ../area_riservata.php");
        die();
        */
    }
} else {
    header("location: ../error.php?error=Wrong Email or Username");
    die();
}