<?php
session_start();
$id = $_SESSION['id'];
$old = $_POST['oldpassword'];
$new = $_POST['newpassword'];

if ($id==1) {
               if ($old == '' or $new =='') {
	header("location: admindashboard.php?error=pwdempty");
	exit();}
else{
		//establishing connction to the database
		$conn = mysqli_connect('localhost','root','', 'cctun');
		if (!$conn) {die("connection failed:".mysqli_connect_error());}

		//checking if the name already exists
		$sql= "SELECT password FROM entities WHERE password='$old' AND id='$id'";
		$result= $conn -> query($sql);
		$pwdcheck = mysqli_num_rows($result);
		if ($pwdcheck != 1) {
			header("location: reglages.php?error=pwdwrg");
			mysqli_close($conn);
			exit();}
		else{
			$sql= "UPDATE entities SET password='$new' WHERE id='$id'";
			$result= $conn -> query($sql);
			mysqli_close($conn);
			header("location: admindashboard.php?success");
		}
	}

} 
else{ if ($old == '' or $new =='') {
	header("location: reglages.php?error=pwdempty");
	exit();}
	else{
		//establishing connction to the database
		$conn = mysqli_connect('localhost','root','', 'cctun');
		if (!$conn) {die("connection failed:".mysqli_connect_error());}

		//checking if the name already exists
		$sql= "SELECT password FROM entities WHERE password='$old' AND id='$id'";
		$result= $conn -> query($sql);
		$pwdcheck = mysqli_num_rows($result);
		if ($pwdcheck != 1) {
			header("location: reglages.php?error=pwdwrg");
			mysqli_close($conn);
			exit();}
		else{
			$sql= "UPDATE entities SET password='$new' WHERE id='$id'";
			$result= $conn -> query($sql);
			mysqli_close($conn);
			header("location: userdashboard.php?success");
		}
	}}
           
//if any of these fuckers are empty , i'll know it



?>