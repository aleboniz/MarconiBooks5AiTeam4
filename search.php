<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_POST['search'])){
   $annoDaTrovare = $_POST['annoDaTrovare'];
   $materiaDaTrovare = $_POST['materiaDaTrovare'];
   if ($annoDaTrovare == "*" && $materiaDaTrovare == "*") {
     $query = "SELECT * FROM `books`";
   } else if($materiaDaTrovare == "*"){
     $query = "SELECT * FROM `books` WHERE CONCAT(`anno`, `materia`) LIKE '%".$annoDaTrovare."%'";
   } else if($annoDaTrovare == "*"){
     $query = "SELECT * FROM `books` WHERE CONCAT(`anno`, `materia`) LIKE '%".$materiaDaTrovare."%'";
   } else {
     $query = "SELECT * FROM `books` WHERE CONCAT(`anno`, `materia`) LIKE '%".$annoDaTrovare.$materiaDaTrovare."%'";
   }
   $search_result = filterTable($query);
}
else {
   $query = "SELECT * FROM `books`";
   $search_result = filterTable($query);
}
function filterTable($query){
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
      .nomeutente:hover {
        background-color: blue;
        color: white;
        font-style: italic;
        font-size: 16px;
      }
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
        <!-- Header ends here -->

        <section style="border:3px solid black;margin-top: 250px;margin-bottom: 100px;margin-right: 600px;margin-left: 600px;">
          <div class="wrapper">
              <h2>Search a book</h2>
              <p>Please fill this form to search a book.</p>

              <form action="search.php" method="post">
                  <div>
                    <label>Anno</label>
                    <select name="annoDaTrovare" id="annoDaTrovare" style="width: 140px; height: 35px;" class="form-control" placeholder="Anno">
                      <option value="*">*</option>
                      <option value="1">Prima</option>
                      <option value="2">Seconda</option>
                      <option value="3">Terza</option>
                      <option value="4">Quarta</option>
                      <option value="5">Quinta</option>
                    </select>
                  </div>
                    <br>
                  <div style="margin-top: -90px; margin-left: 200px;">
                    <label>Materia</label>
                    <select name="materiaDaTrovare" style="width: 140px; height: 35px;" class="form-control" placeholder="Materia" value="materia">
                      <option value="*">*</option>
                      <option value="Matematica">Matematica</option>
                      <option value="Storia">Storia</option>
        					    <option value="Chimica">Chimica</option>
        					    <option value="Diritto">Diritto</option>
        					    <option value="Fisica">Fisica</option>
        					    <option value="Inglese">Inglese</option>
        					    <option value="Italiano">Italiano</option>
        					    <option value="Religione">Religione</option>
        					    <option value="Scienze Della Terra">Scienze della terra</option>
        					    <option value="Biologia">Biologia</option>
        					    <option value="Tecnologie e Tecniche di Rappresentazione Grafica">Tecnologie e Tecniche di Rappresentazione Grafica</option>
        					    <option value="Informatica">Informatica</option>
        					    <option value="Teleomunicazioni">Telecomunicazioni</option>
        					    <option value="Tecnologie e Progettazione di sistemi Informatici">Tecnologie e Progettazione di sistemi Informatici</option>
        					    <option value="Sistemi e Reti">Sistemi e Reti</option>
        					    <option value="Struttura Costruzione Sistemi e Impianti">Struttura, Costruzione, Sistemi e Impianti</option>
        					    <option value="Logistica">Logistica</option>
        					    <option value="Meccanica e Macchine">Meccanica e Macchine</option>
        					    <option value="Sistemi Automatici">Sistemi Automatici</option>
        					    <option value="Tecnologie e Progettazione">Tecnologie e Progettazione</option>
        					    <option value="Elettronica ed Elettrotecnica">Elettronica ed Elettrotecnica</option>
                    </select>
                  </div>
                    <br>

                  <input type="submit" name="search" class="btn btn-primary" value="Submit"><br><br>
              </form>
            </div>
                      <?php while($row = mysqli_fetch_array($search_result)):?>
                        <hr><br><br>
                        <div style="margin-left: 50px;">
                           <img src="images/libro.png" alt="libro" height="180" width="180">
                        </div>
                        <div style="margin-top: -145px; margin-left: 300px;">
                          <p>Utente</p>
                          <p>Anno</p>
                          <p>Materia</p>
                          <p>Codice</p>
                          <p>Prezzo €</p>
                        </div>
                        <div style="margin-top: -240px; margin-left: 400px;">
                          <p style="margin-left: -100px; font-size: 20px;"><b><?php echo $row['nome'];?></b><p>
                          <p><b><a class="nomeutente" href="utente.php?utente=<?php echo $row['utente'];?>"><?php echo $row['utente'];?></a></b></p>
                          <p><b><?php echo $row['anno'];?></b><p>
                          <p><b><?php echo $row['materia'];?></b><p>
                          <p><b><?php echo $row['codice'];?></b><p>
                          <p><b><?php echo $row['prezzo'];?></b><p>
                        </div>
                        <br>
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
