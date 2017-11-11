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
  .logger2{
    background-color:rgba(255,255,255,0.9);
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
      z-index: 1;}

    #ha{
   overflow-y:scroll;
   height:400px;
   display:block;
}
h2{
text-align: center;
font-size: 40px;
}

    </style>
  </head>
  <body>
  <div class="container"><br><br><br>
                <div class="row">
                  <div id="staffap" class="col-md-offset-3 col-md-6 logger">
                  <br><br>
                              <form method="POST" action="staff.php">
                                <p style="font-size: 14px">Pourquoi avez-vous besoin d'un staff?</p> <input type="text" name="reason"><br>
                                <p><br>Cocher si c'est urgent</p> 
                                <input type="checkbox" name="urgent" value="1">
                                <?php  echo  '<input type="hidden" name="nom" value="'.$nom.'"><br>' ?>
                                <input type="submit" value="Envoyer">
                              </form><br><br>
                            </div>
                </div><br>
                
                <div class="row">
                <h2>  Votre dernière demande</h2>
                  <table class="table table-bordered logger2">
                                <thead>
                                  <tr>
                                    <!-- na3rach 3lech ki na3mil th may7ibouch ijiw fil wist meme bil css, donc improvisit -->
                                    <td align="center" style="width: 200px"><strong>Date</strong></td>
                                    <td align="center"><strong>urgent</strong></td>
                                    <td align="center" style="width: 700px;"><strong>raison</strong></td>
                                    <td align="center" style="width: 300px;"><strong>Réponse</strong></td>
                                  </tr>
                                </thead>
                                <br>
                                <tbody>
                                <?php
                             
                                 $pdo = Database::connect();
                                 $sql = "SELECT  * FROM appels  ORDER BY date DESC LIMIT 1;";
                                 foreach ($pdo->query($sql) as $row) {
                                          echo '<tr>';
                                          echo '<td width=150 align="center"><p>'. $row['date'] . '</p></td>';
                                          echo '<td width=100 align="center">'. $row['urgent'] . '</td>';
                                          echo '<td  align="center">'. $row['reason'] . '</td>';
                                          echo '<td width=200>';
                                          echo ' ';
                                          echo $row["reponse"];
                                          echo '</td>';
                                          echo '</tr>';
                                 }
                                 Database::disconnect();
                                ?>
                                </tbody>
                              </table>
                </div><br>

                <div class="row">
                   <h2>Vos anciennes demandes</h2>
                    <table id="ha"class="table table-bordered logger2">
                                <thead>
                                  <tr>
                                    <!-- na3rach 3lech ki na3mil th may7ibouch ijiw fil wist meme bil css, donc improvisit -->
                                    <td align="center" style="width: 200px"><strong>Date</strong></td>
                                    <td align="center"><strong>urgent</strong></td>
                                    <td align="center" style="width: 700px;"><strong>raison</strong></td>
                                    <td align="center" style="width: 300px;"><strong>Réponse</strong></td>
                                  </tr>
                                </thead>
                                <br>
                                <tbody>
                                <?php
                             
                                 $pdo = Database::connect();
                                 $sql = "SELECT * FROM appels  ORDER BY date DESC";
                                 foreach ($pdo->query($sql) as $row) {
                                          echo '<tr>';
                                          echo '<td width=150 align="center"><p>'. $row['date'] . '</p></td>';
                                          echo '<td width=100 align="center">'. $row['urgent'] . '</td>';
                                          echo '<td  align="center">'. $row['reason'] . '</td>';
                                          echo '<td width=200>';
                                          echo ' ';
                                          echo $row["reponse"];
                                          echo '</td>';
                                          echo '</tr>';
                                 }
                                 Database::disconnect();
                                ?>
                                </tbody>
                              </table>
                </div>
              </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


   