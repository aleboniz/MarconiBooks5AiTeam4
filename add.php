<?php
// Include config file
require_once "configLibro.php";

// Define variables and initialize with empty values
$nome = $codice = $prezzo = "";
$nome_err = $codice_err = $prezzo_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["nome"]))){
        $nome_err = "Inserire il nome del libro.";
    } elseif(strlen(trim($_POST["nome"])) < 6){
        $nome_err = "Password must have at least 6 characters.";
    } else{
        $nome = trim($_POST["codice"]);
    }

    // Validate password
    if(empty(trim($_POST["codice"]))){
        $codice_err = "Inserire il codice del libro.";
    } elseif(strlen(trim($_POST["codice"])) < 6){
        $codice_err = "Password must have at least 6 characters.";
    } else{
        $codice = trim($_POST["codice"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["prezzo"]))){
        $prezzo_err = "Inserire il prezzo del libro.";
    } elseif(strlen(trim($_POST["prezzo"])) < 6){
        $prezzo_err = "Password must have at least 6 characters.";
    } else{
        $prezzo = trim($_POST["prezzo"]);
    }

    // Check input errors before inserting in database
    if(empty($nome_err) && empty($codice) && empty($prezzo)){

        // Prepare an insert statement
        $sql = "INSERT INTO books (nome, codice, prezzo) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_nome, $param_codice, $param_prezzo);

            // Set parameters
            $param_nome = $nome;
            $param_codice = $codice;
            $param_prezzo = $prezzo;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: services.html");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
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
	  <style type="text/css"></style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <style type="text/css">
      body{ font: 14px sans-serif; }
      .wrapper{ width: 350px; padding: 20px; }
  </style>


</head>

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

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Header ends here -->

        <section style="border:3px solid black;margin-top: 290px;margin-bottom: 230px;margin-right: 800px;margin-left: 750px;">
          <div class="wrapper">
              <h2>Sign Up</h2>
              <p>Please fill this form to create an account.</p>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="form-group <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
                      <label>Nome</label>
                      <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
                      <span class="help-block"><?php echo $nome_err; ?></span>
                  </div>
                  <div class="form-group <?php echo (!empty($codice_err)) ? 'has-error' : ''; ?>">
                      <label>Codice del libro</label>
                      <input type="text" name="codice" class="form-control" value="<?php echo $codice; ?>">
                      <span class="help-block"><?php echo $codice_err; ?></span>
                  </div>
                  <div class="form-group <?php echo (!empty($prezzo_err)) ? 'has-error' : ''; ?>">
                      <label>Prezzo del libro</label>
                      <input type="text" name="prezzo" class="form-control" value="<?php echo $prezzo; ?>">
                      <span class="help-block"><?php echo $prezzo_err; ?></span>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Submit">
                      <input type="reset" class="btn btn-default" value="Reset">
                  </div>
              </form>
          </div>
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
