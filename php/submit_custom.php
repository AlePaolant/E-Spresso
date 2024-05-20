<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['description'];

    $dsn = 'pgsql:host=localhost;port=5432;dbname=e-spresso';
    $username = 'postgres';
    $password = 'admin';

    try {
        $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $sql = "INSERT INTO tipicaffe (nome, descrizione, prezzo) VALUES (:nome, :descrizione, :prezzo)";
        $stmt = $pdo->prepare($sql);

        $nome = "Gusto Custom";
        $prezzo = 29.99;

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descrizione', $description);
        $stmt->bindParam(':prezzo', $prezzo);

        if ($stmt->execute()) {
            echo "Gusto Custom creato con successo!";
        } else {
            echo "Errore: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>