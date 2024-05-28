<?php

include("../login/utility/config.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['description'];

    try {
        if (!isset($pdo)) {
            throw new PDOException("La connessione PDO non è stata creata.");
        }

        $sql = "INSERT INTO tipicaffe (nome, descrizione, prezzo) VALUES (:nome, :descrizione, :prezzo)";
        $stmt = $pdo->prepare($sql);

        $nome = "Gusto Custom";
        $prezzo = 29.99;

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descrizione', $description);
        $stmt->bindParam(':prezzo', $prezzo);

        if ($stmt->execute()) {
            $productId = $pdo->lastInsertId();
            echo json_encode(['success' => true, 'productId' => $productId]);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->errorInfo()[2]]);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>
