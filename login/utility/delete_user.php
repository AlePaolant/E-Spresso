<?php
session_start();
include("config.php");
if (isset($_SESSION['id'])){
  $sessionid = $_SESSION['id'];
  try{
    $sql=$pdo->prepare("DELETE FROM users WHERE id = :id");
    $sql->bindParam(':id', $sessionid, PDO::PARAM_INT);

    if($sql->execute()){
      session_unset();
      session_destroy();
      echo "Account eliminato con successo";
    }
    else{
      echo "Errore";
    }
  }
  catch(PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
  }
}else{
  echo "Nessun utente loggato";
}
?>