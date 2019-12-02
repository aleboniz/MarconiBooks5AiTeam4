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
    <title>Contact</title>
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

        <!-- Contact us section starts here -->
        <section id="ContactUs">
            <div class="container contact-container">
              <br><br>
                <div class="contact-outer-wrapper">
                    <div class="address-block">
                        <p class="add-title">Contatti</p>
                        <div class="c-detail">
                            <span class="c-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span> <span class="c-info">Piazzale Romano Guardini, 1, 37138 Verona VR</span>
                        </div>
                        <div class="c-detail">
                            <span class="c-icon"><i class="fa fa-phone" aria-hidden="true"></i></span> <span class="c-info">045/8101428</span>
                        </div>
                        <div class="c-detail">
                            <span class="c-icon"><i class="fa fa-envelope" aria-hidden="true"></i></span> <span class="c-info">vrtf03000v@istruzione.it</span>
                        </div>
						<p class="add-title">Mappa</p>
						<div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=marconi%20verona&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.utilitysavingexpert.com">Utility Saving Expert</a>
						</div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
                    </div>
                    <div class="form-wrap">
                        <p class="add-title">Mandaci un messaggio</p>
                        <form>
                            <div class="fname floating-label">
                                <input type="text" class="floating-input" name="first name" id="name-field" />
                                <label for="full-name-field">Nome</label>
                            </div>
                            <div class="email floating-label">
                                <input type="email" class="floating-input" name="email" id="mail-field" />
                                <label for="mail-field">Email</label>
                            </div>
                            <div class="contact floating-label">
                                <input type="text" class="floating-input" name="second name" id="name-field" />
                                <label for="contact-us-field">Cognome</label>
                            </div>
                            <div class="company floating-label">
                                <input type="text" class="floating-input" name="class" id="class-field" />
                                <label for="company-field">Classe</label>
                            </div>
                            <div class="user-msg floating-label">
                                <textarea class="floating-input" name="user message" id="user-msg-field"></textarea>
                                <label for="user-msg-field" class="msg-label">Messaggio</label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact us section ends here -->
        <!-- Footer section starts here -->
		<br><br><br><br>
        <footer id="Footer">
            <div class="container">
                <div class="footer-logo-wrap">
                    Designed by Boniz, Sandrink & IsoTheKing </a>
                </div>
            </div>
        </footer>
        <!-- Footer section ends here -->
    </section>
</body>

</html>
