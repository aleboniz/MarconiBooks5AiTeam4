<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
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
		<div class="hero-content"></div>
        <!-- Services section starts here -->
        <section id="Services">
            <div class="container">
                <div class="block-heading"><br><br><br><br>
                    <h2>Servizi</h2>
                </div>
                <div class="services-wrapper">
                    <div class="each-service">
                        <div class="service-icon"><i class="fa fa-desktop" aria-hidden="true"></i></div>
						                  <a href="search.php" class="hero-cta" style="font-size:25px;">Cerca un libro</a>
						                  <br>
                              <p class="service-description">Comincia a cercare i tuoi nuovi libri di scuola per l'anno scolastico.</p>
                    </div>
                    <div class="each-service">
                        <div class="service-icon"><i class="fa fa-line-chart" href="add.php" aria-hidden="true"></i></div>
						            <a href="add.php" class="hero-cta" style="font-size:25px;">Aggiungi un libro</a>
                        <p class="service-description">Aggiungi un libro che vuoi vendere agli altri studenti.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services section ends here -->

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
