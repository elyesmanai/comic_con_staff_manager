<?php
include 'Database.php';
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
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2">                  
          <ul id="myTab" class="nav nav-tabs nav-justified">
              <img src="img/netlinks.png" width="100%">
              <div align="center"><br><br><br><br><strong<?php echo $nom; ?><br><br><br><br></div>
              <li class=""><a href="#acceuil" data-toggle="tab"><strong>Acceuil</strong></a></li><br>
              <li class="active"><a href="#evals" data-toggle="tab"><strong>Evaluation</strong></a></li><br>
              <li class=""><a href="#reglages" data-toggle="tab"><strong>règlages</strong></a></li><br>
              <li class=""><a href="logout.php"><strong>se déconnecter</strong></a></li><br>
          </ul>

        </div>
        <div class="col-sm-offset-1 col-md-offset-1 col-sm-8 col-md-9">
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="acceuil">
                    <div class="container-fluid row">
                      <div class="col-sm-12 col-md-12">
                        <h3>Bienvenu <?php echo $nom; ?> </h3><br>
                      </div>
                    </div>
                     
                                  

                       <div class="row">
                              <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <!-- na3rach 3lech ki na3mil th may7ibouch ijiw fil wist meme bil css, donc improvisit -->
                                    <td align="center"><strong>Date</strong></td>
                                    <td align="center"><strong>Nom</strong></td>
                                    <td align="center"><strong>urgent</strong></td>
                                    <td align="center"><strong>raison</strong></td>
                                    <td align="center"><strong>Actions</strong></td>
                                  </tr>
                                </thead>
                                <br>
                                <tbody>
                                <?php
                                
                                 $pdo = Database::connect();
                                 $sql = "SELECT * FROM appels WHERE seen=0  ORDER BY date DESC";
                                 foreach ($pdo->query($sql) as $row) {
                                          echo '<tr>';
                                          echo '<td width=150 align="center">'. $row['date'] . '</td>';
                                          echo '<td width=100 align="center">'. $row['name'] . '</td>';
                                          echo '<td width=100 align="center">'. $row['urgent'] . '</td>';
                                          echo '<td  align="center">'. $row['reason'] . '</td>';
                                          echo '<td width=300>';
                                          echo ' ';
                                          echo '<a class="btn btn-success" href="reponse.php?r=1&id='.$row['id'].'">Je suis en route</a>';
                                          echo ' ';
                                          echo '<a class="btn btn-warning" href="reponse.php?r=2&id='.$row['id'].'">patientez svp</a>';
                                          echo ' ';
                                          echo '<a class="btn btn-danger" href="reponse.php?r=3&id='.$row['id'].'">Demande refusée</a>';
                                          echo '</td>';
                                          echo '</tr>';
                                 }
                                 Database::disconnect();
                                ?>
                                </tbody>
                              </table>
                        </div> 
                
               
            </div>

             <div class="tab-pane fade" id="evals">
                    <div class=" row">
                      <div class="col-sm-12 col-md-12">
                        <h3>Les Evalutations</h3><br>
                      </div>
                    </div>
                     
                                  

                       <div class="row">
                              <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <!-- na3rach 3lech ki na3mil th may7ibouch ijiw fil wist meme bil css, donc improvisit -->
                                    <td align="center"><strong>Date</strong></td>
                                    <td align="center"><strong>Nom</strong></td>
                                    <td align="center"><strong>eval</strong></td>
                                  </tr>
                                </thead>
                                <br>
                                <tbody>
                                <?php
                             
                                 $pdo = Database::connect();
                                 $sql = "SELECT * FROM evals  ORDER BY date DESC";
                                 foreach ($pdo->query($sql) as $row) {
                                          echo '<tr>';
                                          echo '<td width=150 align="center">'. $row['date'] . '</td>';
                                          echo '<td width=100 align="center">'. $row['name'] . '</td>';
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


            <div class="tab-pane fade" id="reglages">
                <div class="row">
                 <div class="panel panel-login">
                    <div class="col-lg-6 col-lg-offset-3">
                            <br><br><br>
                                  <form action="changepwd.php" method="POST">
                                    <h3>Changer votre mot de passe</h3>
                                    <div class="form-group">
                                      <input type="password" name="oldpassword" id="password" tabindex="5" class="form-control" placeholder="Tapez votre ancien mot de passe">
                                    </div>
                                    <div class="form-group">
                                      <input type="password" name="newpassword" id="password" tabindex="6" class="form-control" placeholder="tapez votre nouveau mot de passe">
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                          <input type="submit" name="login-submit" id="login-submit" tabindex="7" class="form-control btn btn-login" value="Valider">
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
            </div>
        </div>  
      </div> 
    </div>
    <script>
      function formidable(){
        $("#staffap").toggle();
      }
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
