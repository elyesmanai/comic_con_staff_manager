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
    table{
   overflow-y:scroll;
   height:100px;
   display:block;
}
    </style>
  </head>
  <body>
  <div class="container">
<br><br><br><br><br>
    <div class="row">
      <div class="logger  col-md-offset-2 col-md-8">
      <br><br>
          <div class="tab-pane fade" id="evaluations">
                <div class="row">
                      <form method="POST" action="evaluation.php">
                          Aidez-nous à améliorer votre expérience d'après vos remarques : <br>
                          <input type="text" name="eval"><br><br>
                         <?php  echo  '<input type="hidden" name="nom" value="'.$nom.'">' ?>
                          <input type="submit" name="Envoyer">
                      </form>
                </div>
                <div class="row">
                   <h3>Vos anciennes évaluations</h3>
                   <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <!-- na3rach 3lech ki na3mil th may7ibouch ijiw fil wist meme bil css, donc improvisit -->
                                    <td align="center"><strong>Date</strong></td>
                                    <td align="center"><strong>eval</strong></td>
                                  </tr>
                                </thead>
                                <br>
                                <tbody>
                                <?php
                             
                                 $pdo = Database::connect();
                                 $sql = "SELECT * FROM evals  WHERE name='$nom' ORDER BY date DESC";
                                 foreach ($pdo->query($sql) as $row) {
                                          echo '<tr>';
                                          echo '<td width=150 align="center">'. $row['date'] . '</td>';
                                          echo '<td align="center">'. $row['eval'] . '</td>';
                                          echo '</td>';
                                          echo '</tr>';
                                 }
                                 Database::disconnect();
                                ?>
                                </tbody>
                              </table>
                </div>
              </div>
          <a href="userdashboard.php"><button>Revenir</button></a>
         <br><br><br>

      </div>
    </div>
  </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


   
           