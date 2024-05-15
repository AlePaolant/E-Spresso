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

        //Controllo password non hashata
        if($row['password']===$password){
            session_start();                            //serve per bloccare gli utenti che non hanno fatto il login
            $_SESSION['id'] = $row["id"];               //Salva l'id dell'utente nella sessione
            header("location: ../area_riservata.php");  //Redirect alla pagina dell'area riservata
            die();
        }
        /*-----------------------------------------------------------------
        CONTROLLO PASSWORD HASHATA (se vogliamo implementare il criptaggio)
        ------------------------------------------------------------------*/
        /*
        if (!(password_verify($password, $row["password"]))) {
            header("location: ../error.php?error=Wrong Password");
            die();
        }
        session_start();                          
        $_SESSION['id'] = $row["id"];                   
        header("location: ../area_riservata.php");      
        die();
        */
    }       
} else {
    header("location: ../error.php?error=Wrong Email or Username");     //Redirect a pagina errore
    die();
}