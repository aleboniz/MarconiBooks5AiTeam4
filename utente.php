<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$utente=$_GET['utente'];
//$utente = $_SESSION["username"];

$query2 = "SELECT * FROM `users` WHERE `username` LIKE '%".$utente."%'";
$search_data = filterUsers($query2);

$query = "SELECT * FROM `books` WHERE `utente` LIKE '%".$utente."%'";
$search_result = filterBooks($query);

function filterUsers($query){
   $connect = mysqli_connect("localhost", "root", "", "accountdb");
   $filter_Result = mysqli_query($connect, $query);
   return $filter_Result;
}
function filterBooks($query){
   $connect = mysqli_connect("localhost", "root", "", "booksdb");
   $filter_Result = mysqli_query($connect, $query);
   return $filter_Result;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style type="text/css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
      body{ font: 14px sans-serif; }
      .wrapper{ width: 350px; padding: 20px; }
      table,tr,th,td{border: 1px solid black;}
      </style>
    </style>
</head>

<body data-spy="scroll" data-target=".main-navigation" data-offset="150">
    <section id="MainContainer">
        <!-- Header starts here -->
        <header id="Header">
            <nav class="main-navigation">
                <div class="container clearfix">
                    <div class="site-logo-wrap">
                        <a class="logo" href="index.php"><img src="images/marconi-logo.png" style="width:200px; height:100px" alt="Itis Marconi"></a>
                    </div>
                    <a href="javascript:void(0)" class="menu-trigger hidden-lg-up"><span>&nbsp;</span></a>
                    <div class="main-menu hidden-md-down">
                        <ul class="menu-list">
                            <li><a class="nav-link" href="index.php">Home</a></li>
                            <li><a class="nav-link" href="services.php">Servizi</a></li>
                            <li><a class="nav-link" href="contact.php">Contatti</a></li>
                        </ul>
                        <p id="nome_login" style="padding-top: 8px;">
                            <a href="utente.php?utente=<?php echo $_SESSION["username"];?>" class="btn btn-danger" style="background-color:Green; border:1px solid Green;"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                            <a href="logout.php" class="btn btn-danger">Esci</a>
                        </p>
                    </div>
                </div>
            </nav>
        </header>

        <section style="border:3px solid black;margin-top: 290px;margin-bottom: 100px;margin-right: 600px;margin-left: 600px;">
          <div class="wrapper">
              <h2>Dati utente</h2><br>
          </div>
          <div style="margin-top: 0px; margin-left: 100px;">
            <p>Nome</p>
            <p>Cognome</p>
            <p>Email</p>
            <p>Telefono</p>
          </div>
          <div style="margin-top: -155px; margin-left: 250px;">
                <?php while($row = mysqli_fetch_array($search_data)):?>
                    <p><b><?php echo $row['nome'];?></b></p>
                    <p><b><?php echo $row['cognome'];?></b></p>
                    <p><b><?php echo $row['email'];?></b></p>
                    <p><b><?php echo $row['telefono'];?></b></p>

                    <?php if ($row['username'] == $_SESSION["username"]):?>
                      <div style="margin-left: -150px;">
                        <p>Password</p>
                      </div>
                      <div style="margin-top: -45px;">
                          <a href="reset-password.php" class="btn btn-warning">Cambia password</a>
                      </div>
                    <? endif;?>

                <?php endwhile;?>
          </div><br>

        </section>

        <section style="border:3px solid black;margin-top: 50px;margin-bottom: 100px;margin-right: 600px;margin-left: 600px;">
          <div class="wrapper">
              <h2>Books</h2>
          </div>
                <?php while($row = mysqli_fetch_array($search_result)):?>
                  <hr><br>
                  <div style="margin-left: 50px;">
                     <img src="images/libro.png" alt="libro" height="180" width="180">
                  </div>
                  <div style="margin-top: -145px; margin-left: 300px;">
                    <p>Anno</p>
                    <p>Materia</p>
                    <p>Codice</p>
                    <p>Prezzo €</p>
                  </div>
                  <div style="margin-top: -200px; margin-left: 400px;">
                    <p style="margin-left: -100px; font-size: 20px;"><b><?php echo $row['nome'];?></b><p>
                    <p><b><?php echo $row['anno'];?></b><p>
                    <p><b><?php echo $row['materia'];?></b><p>
                    <p><b><?php echo $row['codice'];?></b><p>
                    <p><b><?php echo $row['prezzo'];?></b><p>
                  </div>

                  <?php if ($row['utente'] == $_SESSION["username"]):?>
                    <div style="margin-top: -100px; margin-left: 550px;">
                      <form action="remove.php?id=<?php echo $row['id'];?>&utente=<?php echo $_SESSION["username"]?>" method="post">
                        <input type="submit" name="remove" value="Rimuovi">
                      </form>
                    </div>
                  <? endif;?>
                  <br><br><br>
                <?php endwhile;?>
        </section>

        <!-- Footer section starts here -->
        <footer id="Footer">
            <div class="container">
                <div class="footer-logo-wrap">
                    Designed by boniz & sandrink & isotheking</a>
                </div>
            </div>
        </footer>
        <!-- Footer section ends here -->
    </section>
</body>

</html>
