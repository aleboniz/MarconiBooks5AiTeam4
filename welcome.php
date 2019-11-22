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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>

    <body data-spy="scroll" data-target=".main-navigation" data-offset="150">
        <section id="MainContainer">
            <!-- Header starts here -->
            <header id="Header">
                <nav class="main-navigation">
                    <div class="container clearfix">
                        <div class="site-logo-wrap">
                            <a class="logo" href="#"><img src="images/marconi-logo.png" style="width:170px; height:100px" alt="Itis Marconi"></a>
                        </div>
                        <a href="javascript:void(0)" class="menu-trigger hidden-lg-up"><span>&nbsp;</span></a>
                        <div class="main-menu hidden-md-down">
                            <ul class="menu-list">
                                <li><a class="nav-link" href="index.html">Home</a></li>
                                <li><a class="nav-link" href="services.html">Servizzi</a></li>
                                <li><a class="nav-link" href="contact.html">Contatti</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- Header ends here -->

            <!-- Banner starts here -->
            <section id="HeroBanner">
                <div class="hero-content" style="background-image: url('images/sfondo.jpg'); height:100%;">
                    <h1>Welcome to Marconi books</h1>
                    <p>The first Marconi's books site</p>
                    <a href="search.html" class="hero-cta">Start searching</a>
                </div>
            </section>
            <!-- Banner ends here -->

            <!-- Footer section starts here -->
            <footer id="Footer">
                <div class="container">
                    <div class="footer-logo-wrap">
                        Design Studio &copy; 2019. Designed by boniz & sandrink & isotheking</a>
                    </div>
                </div>
            </footer>
            <!-- Footer section ends here -->
        </section>
</body>
</html>
