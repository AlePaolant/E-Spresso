<?php

/*------------------------------------------------------
                    LATO SERVER 
            Connessione PDO al database
--------------------------------------------------------*/

try {
    $pdo = new PDO('pgsql:host=localhost;dbname=Caffe', 'postgres', 'admin');
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    http_response_code(500); // Codice di stato HTTP per errore del server
    echo json_encode(array("error" => "Errore di connessione al database: " . $e->getMessage()));
}
 
?>