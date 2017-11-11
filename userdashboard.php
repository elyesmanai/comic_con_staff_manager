<?php
include 'Database.php';
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
session_start();
$id= $_SESSION['id'];
$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT name,etat FROM entities WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
       $row=$q->fetch(PDO::FETCH_ASSOC);
            $nom= $row["name"];
            $etat = $row["etat"];
        Database::disconnect();

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
      text-decoration: none;
      transition: 1s;
      letter-spacing: 1px;
    }
     #btnstaff:hover{
      width: 305px;
      height: 210px;
      background-color:rgba(255,153,0,1);
      text-decoration: none;
      transition: 1s;
      letter-spacing: 1px;
    }
     #btnpres{
      width: 300px;
      height: 200px;
      background-color:rgba(153,255,0,1);
      text-decoration: none;
      transition: 1s;
    }
      #btnpres:hover{
      width: 305px;
      height: 210px;
      background-color:rgba(153,255,0,1);
      text-decoration: none;
      transition: 1s;
    }
     #btneval{
      width: 300px;
      height: 200px;
      background-color:rgba(0,153,255,1);
      text-decoration: none;
      transition: 1s;
    }
      #btneval:hover{
      width: 305px;
      height: 210px;
      background-color:rgba(0,153,255,1);
      text-decoration: none;
      transition: 1s;
    }
     #btnreg{
      width: 300px;
      height: 200px;
      background-color:rgba(255,0,153,1);
      text-decoration: none;
      transition: 1s;
    }
      #btnreg:hover{
      width: 305px;
      height: 210px;
      background-color:rgba(255,0,153,1);
      text-decoration: none;
      transition: 1s;
    }
      #btndeco{
      width: 300px;
      height: 200px;
      background-color:rgba(0,153,153,1);
      text-decoration: none;
      transition: 1s;
    }
      #btndeco:hover{
      width: 305px;
      height: 210px;
      background-color:rgba(0,153,153,1);
      text-decoration: none;
      transition: 1s;
    }
    #ap{
      font-size : 40px;
      color: rgba(0,0,0,0.8);
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
    <div class="container-fluid">
                    <div class="row"><br><div class="col-md-3"> <img src="img/netlinks.png" width="60%"></div></div>
                    <div class=" row"><br><br>
                       <div class="logger col-md-offset-1 col-md-10">
                           <br><h2>Bienvenu <?php echo $nom; ?> </h2><br>
                           <br><br>
                           <?php
                            if (strpos($url, 'success=1')!== false)
                                  {echo "Votre demande a été envoyée<br>";} 
                           ?>
                           
                           <?php
                             if ($etat==0) {
                              echo '
                           <div class="row">
                               <div class="col-md-4 col-md-offset-2"><a href="presence.php"><button id="btnpres"><span id="ap">Marquer votre Présence</span></button></a><br></div>
                               <div class="col-md-4"><a href="appels.php"><button id="btnstaff"><span id="ap">Appeler un Staff</span></button></a><br></div>
                          </div>
                          <br><br><br>
                          <div class="row">
                               <div class="col-md-4"> <a href="evals.php"><button id="btneval"><span id="ap">Laisser une évaluation</span></button></a><br></div>
                               <div class="col-md-4"> <a href="reglages.php"><button id="btnreg"><span id="ap">règlages</span></button><br></a></div>
                               <div class="col-md-4"> <a href="logout.php"><button id="btndeco"><span id="ap">Se déconnecter</span></button><br></a></div>
                           </div>
                                  ';
                             }  
                             else {
                              echo'
                                  <div class="row">
                              
                               <div class="col-md-4 col-md-offset-2"><a href="appels.php"><button id="btnstaff"><span id="ap">Appeler un Staff</span></button></a><br></div>
                                 <div class="col-md-4"> <a href="evals.php"><button id="btneval"><span id="ap">Laisser une évaluation</span></button></a><br></div>
                          </div>
                          <br><br><br>
                          <div class="row">
                             
                               <div class="col-md-4 col-md-offset-2"> <a href="reglages.php"><button id="btnreg"><span id="ap">règlages</span></button><br></a></div>
                               <div class="col-md-4"> <a href="logout.php"><button id="btndeco"><span id="ap">Se déconnecter</span></button><br></a></div>
                           </div>
                           ';
                             }
                            ?>

                           
                          
<br><br><br>
                      </div>
                    </div>
    </div>
    <script>
    $(document).ready(function() {
    $('#staffap').hide();  
    });

      function formidable(){
        $("#staffap").toggle();
        $("#btnstaff").toggle();
      }
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
