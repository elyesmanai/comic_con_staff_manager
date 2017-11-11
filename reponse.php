<?php

$rep = $_GET["r"];
$id= $_GET["id"];

switch ($rep) {
	case 1:
		$rep = "Je suis en route";
		break;
	case 2:
		$rep = "patientez svp";
		break;
	case 3:
		$rep = "Demande refusée";
		break;
}

require 'database.php';
$s=1;
 $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE appels  set reponse = ?,seen = ?  WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($rep,$s,$id)); 
            Database::disconnect();
           

 header("location: admindashboard.php?success=1");

?>