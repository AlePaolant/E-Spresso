<?php
session_start();
include '../login/utility/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['productId']) && isset($_SESSION['id'])) {
        $productId = $data['productId'];
        cancelCustomTaste($productId);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}

function cancelCustomTaste($productId) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM tipicaffe WHERE id = ?');
    $stmt->execute([$productId]);
}
?>
