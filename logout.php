<?php
session_start();
session_destroy();
header("location: index.php");
$id = $_SESSION["id"];
$etat = 0;
 $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE entities  set etat = ?  WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($etat,$id));
            Database::disconnect();

?>