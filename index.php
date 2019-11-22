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
    <title>Marconi Books</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<style type="text/css">

</style>
</head>

<body data-spy="scroll" data-target=".main-navigation" data-offset="150">
    <section id="MainContainer">
        <!-- Header starts here -->
        <header id="Header">
            <nav class="main-navigation">
                <div class="container clearfix">
                    <div class="site-logo-wrap">
                        <a class="logo" href="index.php"><img src="images/marconi-logo.png" style="width:170px; height:100px" alt="Itis Marconi"></a>
                    </div>
                    <a href="javascript:void(0)" class="menu-trigger hidden-lg-up"><span>&nbsp;</span></a>
                    <div class="main-menu hidden-md-down">
                        <ul class="menu-list">
                            <li><a class="nav-link" href="index.php">Home</a></li>
                            <li><a class="nav-link" href="services.html">Servizzi</a></li>
                            <li><a class="nav-link" href="contact.html">Contatti</a></li>
                        </ul>
                        <!--<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>-->
                        <p id="nome_login">
                          <!--  <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> -->
                            <a href="reset-password.php" class="btn btn-warning">Cambia password</a>
                            <a href="logout.php" class="btn btn-danger">Esci</a>
                        </p>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Header ends here -->

        <!-- Banner starts here -->
        <section id="HeroBanner">
            <div class="hero-content" >
                <h1>Benvenuti in Marconi books</h1>
                <p>Il primo sito marconiano per vendere e comprare libri</p>
                <a href="search.html" class="hero-cta">Inizia a cercare</a>
            </div>
        </section>
        <!-- Banner ends here -->

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
