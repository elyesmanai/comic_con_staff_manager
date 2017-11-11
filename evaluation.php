<?php

$eval=$_POST["eval"];
$nom = $_POST["nom"];
$today = date("Y-m-d H:i:s");  

require 'database.php';

 $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO evals (name,eval,date) values(?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nom,$eval,$today));
            Database::disconnect();
           

 header("location: userdashboard.php?success=1");
?>