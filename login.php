<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
require 'database.php';
//establishing connection to Database


 $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM entities WHERE name=?AND password=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($username,$password));
 			$row=$q->fetch(PDO::FETCH_ASSOC);
            if (isset($row)) {
            	$_SESSION['id']=$row['id'];
		 		 $_SESSION['name']=$row['name'];
			if ($_SESSION['id'] == 1) {header("location: admindashboard.php");}
		 		else{ header("location: userdashboard.php");}
            } else {header("location: index.php?error=wrong");}
        Database::disconnect();
         
?>