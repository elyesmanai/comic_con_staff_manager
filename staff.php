<?php 
$urgent=0;
$reason = "no reason";
if (isset($_POST['reason'])) {
	$raison = $_POST['reason'];
}
if (isset($_POST['urgent'])) {
	$urgent = $_POST['urgent'];
}
if (isset($_POST['nom'])) {
	$nom = $_POST['nom'];
}
$today = date("Y-m-d H:i:s");  
$reponse = "pas de réponse";
$s=0;
require 'database.php';

 $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO appels (name,urgent,reason,date,reponse,seen) values(?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nom,$urgent,$raison,$today,$reponse,$s));
            Database::disconnect();
           

 header("location: userdashboard.php?success=1");
?>