  <?php
include 'Database.php';
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
session_start();
$id= $_SESSION['id'];
$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT name FROM entities WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
       $row=$q->fetch(PDO::FETCH_ASSOC);
            $nom= $row["name"];
        Database::disconnect();
$today = date("H:i:s");

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
       background-size: 110%;
       background-repeat: no-repeat;
    }
    .logger{
    background-color:rgba(255,255,255,0.5);
    text-align: center;

  }
    #btnstaff{
      width: 300px;
      height: 200px;
      background-color:rgba(255,153,0,1);
    }
     #btnpres{
      width: 300px;
      height: 200px;
      background-color:rgba(153,255,0,1);
    }
     #btneval{
      width: 300px;
      height: 200px;
      background-color:rgba(0,153,255,1);
    }
     #btnreg{
      width: 300px;
      height: 200px;
      background-color:rgba(255,0,153,1);
    }
    #ap{
      font-size : 40px;
    }
    img{
      position: absolute;
      top : 10%;
      left: 10%;
      z-index: 1;
    }
    </style>
  </head>
  <body>
  <div class="container">
<br><br><br><br><br>
    <div class="row">
      <div class="logger  col-md-offset-2 col-md-8">
      <br><br>
        <?php  
            echo "<h1>Il est " .$today. " du matin </h1> <br>";

             if (strtotime($today) <= strtotime('10:00:00')) {
               echo '<p style="font-size: 20px">Vous avez respecté les conditions de temps,  le responsable a été notifié de votre présence,  passez une bonne journée.</p><br>';
             } else{
              echo "<p style='font-size: 20px'>Vous n'avez pas respecté les conditions de temps, le reponsable , le responsable a été notifié de votre présence,  passez une bonne journée.</p><br>";
             }
             $etat = 1;
              $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE entities  set etat = ?  WHERE name = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($etat,$nom));
            Database::disconnect();
           
        ?>
          
          <a href="userdashboard.php"><button>Revenir</button></a>
         <br><br><br>

      </div>
    </div>
  </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


   