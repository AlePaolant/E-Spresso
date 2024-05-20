<?php
session_start();
include 'funzioni_shop.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['productId']) && isset($_SESSION['id'])) {
        addToCart($_SESSION['id'], $data['productId']);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
