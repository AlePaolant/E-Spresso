<?php
//file per connessione al database
include("../login/utility/config.php");

// Gestione delle richieste POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Se l'ID è presente nella richiesta POST, procedi con le operazioni
    if (isset($_POST['id'])) {
        // Rimuovere un elemento dal carrello
        if (isset($_POST['quantity'])) {
            $id = $_POST['id'];
            $quantity = $_POST['quantity'];

            // Aggiorna la quantità del prodotto nel carrello
            $stmt = $pdo->prepare("UPDATE carrello SET quantita = ? WHERE id = ?");
            $stmt->execute([$quantity, $id]);

            if ($stmt->rowCount() > 0) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Impossibile modificare la quantità']);
            }

            $stmt->closeCursor();
        } else {
            $id = $_POST['id'];

            // Rimuovi il prodotto dal carrello
            $stmt = $pdo->prepare("DELETE FROM carrello WHERE id = ?");
            $stmt->execute([$id]);

            if ($stmt->rowCount() > 0) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Impossibile rimuovere l\'elemento dal carrello']);
            }

            $stmt->closeCursor();
        }
    }
}

$pdo = null; // Chiudi la connessione al database
?>
