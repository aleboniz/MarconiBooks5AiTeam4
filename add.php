<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "configLibro.php";

// Define variables and initialize with empty values
$utente = $anno = $materia = $nome = $codice = $prezzo = "";
$anno_err = $materia_err = $nome_err = $codice_err = $prezzo_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $utente = $_SESSION["username"];

    // Validate anno
    if(empty(trim($_POST["anno"]))){
        $anno_err = "Inserire l'anno.";
    } else{
        $anno = trim($_POST["anno"]);
    }

    // Validate materia
    if(empty(trim($_POST["materia"]))){
        $materia_err = "Inserire la materia.";
    } else{
        $materia = trim($_POST["materia"]);
    }

    // Validate nome
    if(empty(trim($_POST["nome"]))){
        $nome_err = "Inserire il nome del libro.";
    } else{
        $nome = trim($_POST["nome"]);
    }

    // Validate codice
    if(empty(trim($_POST["codice"]))){
        $codice_err = "Inserire il codice del libro.";
    } else{
        $codice = trim($_POST["codice"]);
    }

    // Validate prezzo
    if(empty(trim($_POST["prezzo"]))){
        $prezzo_err = "Inserire il prezzo del libro.";
    } else{
        $prezzo = trim($_POST["prezzo"]);
    }

    // Check input errors before inserting in database
    if(empty($anno_err) && empty($materia_err) && empty($nome_err) && empty($codice_err) && empty($prezzo_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO books (utente, anno, materia, nome, codice, prezzo) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_utente, $param_anno, $param_materia, $param_nome, $param_codice, $param_prezzo);

            // Set parameters
            $param_utente = $utente;
            $param_anno = $anno;
            $param_materia = $materia;
            $param_nome = $nome;
            $param_codice = $codice;
            $param_prezzo = $prezzo;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: services.php");
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
    <title>Add Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style type="text/css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
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

        <section style="border:3px solid black;margin-top: 290px;margin-bottom: 230px;margin-right: 800px;margin-left: 750px;">
          <div class="wrapper">
              <h2>Add a book</h2>
              <p>Please fill this form to add a book.</p>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                  <div class="form-group <?php echo (!empty($anno_err)) ? 'has-error' : ''; ?>">
                      <label>Anno</label>
                      <select name="anno" style="width: 140px; height: 35px;" class="form-control" value="<?php echo $anno; ?>">
                        <option value="1">Prima</option>
                        <option value="2">Seconda</option>
                        <option value="3">Terza</option>
                        <option value="4">Quarta</option>
                        <option value="5">Quinta</option>
                      </select>

                      <span class="help-block"><?php echo $anno_err; ?></span>
                  </div>

                  <div class="form-group <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
                      <label>Materia</label>
                      <select name="materia" style="width: 140px; height: 35px;" class="form-control" value="<?php echo $materia; ?>">
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
                      <span class="help-block"><?php echo $materia_err; ?></span>
                  </div>

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
                      <label>Prezzo di copertina del libro</label>
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
