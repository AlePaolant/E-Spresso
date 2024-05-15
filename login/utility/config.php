<?php

/*------------------------------------------------------
                    LATO SERVER 
            Connessione PDO al database
--------------------------------------------------------*/

try {
    $pdo = new PDO('pgsql:host=localhost;dbname=users', 'postgres', 'admin');
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connessione riuscita";
} catch (PDOException $e) {
    print "Errore di connessione: " . $e->getMessage() . "<br/>";
    die();
}
?>