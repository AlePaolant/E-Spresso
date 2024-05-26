<?php

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
try {
  $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  $sql = "DELETE FROM users WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $sessionid, PDO::PARAM_INT);
  $stmt->execute();

  // Distrugge la sessione dopo aver eliminato i dati
  session_destroy();
  echo 'success';
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  exit;
}
?>