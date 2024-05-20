<?php
function getDbConnection() {
    $host = 'localhost';
    $port = '5432';
    $dbname = 'e-spresso';
    $user = 'postgres';
    $password = 'admin';

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    try {
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit();
    }
    return $pdo;
}

function addToCart($userId, $productId) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('SELECT id FROM carrello WHERE user_id = ? AND product_id = ?');
    $stmt->execute([$userId, $productId]);
    $cartItem = $stmt->fetch();

    if ($cartItem) {
        $stmt = $pdo->prepare('UPDATE carrello SET quantita = quantita + 1 WHERE id = ?');
        $stmt->execute([$cartItem['id']]);
    } else {
        $stmt = $pdo->prepare('INSERT INTO carrello (user_id, product_id, quantita) VALUES (?, ?, 1)');
        $stmt->execute([$userId, $productId]);
    }
}

function getProducts() {
    $pdo = getDbConnection();
    $stmt = $pdo->query('SELECT id, nome, prezzo FROM tipicaffe');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCartItems($userId) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('SELECT c.id, p.nome, p.prezzo, c.quantita 
                           FROM carrello c
                           JOIN tipicaffe p ON c.product_id = p.id
                           WHERE c.user_id = ?');
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
