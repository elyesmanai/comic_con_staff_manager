<?php 
session_start();
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/logstyle.css" rel="stylesheet">
	<style type="text/css">
		body {
   		 background-image: url("img/bg.jpg");
   		 background-size: 100%;
		}
		.logger{
		background-color:rgba(255,255,255,0.5);
		}

	</style>
</head>
<body>
<div class="container-fluid">
		<div class="row">

			<br>
			<div class="content col-md-5" >
				<img src="img/logo.png" alt="logo" width="70%;">
			</div>

			<div class="col-md-4 logger">
					<h1 style="text-align: center;">Bienvenu!</h1>
						<?php  if (isset($_SESSION['id'])) {}
								else{echo '<h4 style="text-align: center;">Connectez-vous!</h4>';}
						?>
					<div class="pannel-login">
						<div class="pannel-heading">
							<hr>
						</div>
							<div >
						        <div id="login-form">
									<div class="row">
										<div class="col-lg-10 col-lg-offset-1">
											<form action="login.php" method="POST">
												<?php if (strpos($url, 'error=wrong')!== false)
														{echo "Username or Password incorrect!";} ?>
												<div class="form-group">
													<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
												</div>
												<div class="form-group">
													<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-6 col-sm-offset-3">
															<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
														</div>
													</div>
												</div>
												
											</form>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
		</div>
</div>
		<script src="js/log.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
