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

function getData(){
    $pdo=getDbConnection();
    $stmt=$pdo->query('SELECT * FROM users');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
