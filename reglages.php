<?php
include 'Database.php';
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <style type="text/css">
    body {
       background-image: url("img/bg.jpg");
       background-size: 100%;
    }
    .logger{
    background-color:rgba(255,255,255,0.5);
    text-align: center;

  }
    #ap{
      font-size : 40px;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
      <div class="row">
      <br><br><br><br><br><br>
                      <div class="col-lg-6 col-lg-offset-3 logger">
      <br>
                                    <form action="changepwd.php" method="POST">
                                     
                                      <h3>Changer votre mot de passe</h3>
      <br>
                                    <?php  if (strpos($url, 'error=pwdempty')) {
                                        echo "<h3>******** Les champs sont vides ********</h3>";
                                      } elseif (strpos($url, 'error=pwdwrg')) {
                                        echo "<h3>********  mot de passik ghalit  ********</h3>";
                                      }

                                       ?>

                                      <div class="form-group col-md-6 col-md-offset-3">
                                        <input type="password" name="oldpassword" id="password" tabindex="5" class="form-control" placeholder="Tapez votre ancien mot de passe">
                                      </div>
                                      <br>
                                      <div class="form-group col-md-6 col-md-offset-3">
                                        <input type="password" name="newpassword" id="password" tabindex="6" class="form-control" placeholder="tapez votre nouveau mot de passe"><br>
                                      </div>

                                      <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-4 col-sm-offset-4">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="7" class="form-control btn btn-login" value="Valider">
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                    
                                    <div class="row">
                                      <div class="col-sm-4 col-sm-offset-4">
                                         <a class="form-control btn btn-login col-md-3"  id="login-submit"  href="userdashboard.php" value="Retour">Retour</a>
                                      </div>
                                    </div> <br><br>
                      </div>
        </div>
    </div>
</body>
</html>