<?php
session_start();
$sessionid = $_SESSION['id'];


//where user.id='$sessionid'--------------------------------------------->PER LA MODIFICA, PASSI ID UTENTE, SESSION è GLOBALE, QUINDI IN OGNI PHP
//------------------------------------------------------------------------è VISIBILE sessionid
if ($sessionid == "") {
  header('Location: error.php');
  exit;
}
//File per connessione al database
include("utility/config.php");

$sql = "SELECT id, nome, cognome, email, indirizzo, n_civico, citta, numero_telefono FROM users WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $sessionid, PDO::PARAM_INT);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "utente non trovato";
    exit();
}
?>


<!DOCTYPE html>
<html lang="it">

<head>

  <title>E-spresso</title>
  <meta charset="UTF-8">
  <!-- Responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Descrizione per motore di ricerca -->
  <meta name="description" content="Stanco del solito caffè? Entra nel mondo di E-Spresso e crea il caffè dei tuoi sogni.">
  <meta name="keywords" content="e-spresso, caffè, coffee, custom coffee, caffe personalizzato, custom brew">
  <meta name="author" content="Alessandro Paolantonio,2000159; Alessandro Nardi, 1853941; Andrea Panichi, 2008617 ">
  <!-- Descrizione per server esterni, es. condivisione link su whatsapp-->
  <meta property="og:type" content="website">
  <meta property="og:title" content="e-spresso">
  <meta property="og:description" content="Stanco del solito caffè? Entra nel mondo di E-Spresso e crea il caffè dei tuoi sogni.">
  <meta property="og:image" content="https://www.e-spresso.it/img/og_image.png"> <!-- ovviamente non funziona -->

  <link rel="icon" type="svg" href="../../img/icon.svg">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/home.css">
  <link rel="stylesheet" href="../styles/riservata.css">



</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg start-animation" id="navbar">
    <div class="container container-navbar">
      <a href="../index.html">
        <img src="../img/navbar-brand-w.png" class="logo-bianco" id="logo-bianco" alt="Logo Bianco">
        <img src="../img/navbar-brand-b.png" id="logo-nero" alt="Logo Nero">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-ham" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="container">
      <div class="collapse navbar-collapse" id="nav-ham">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="../index.html" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="../pages/shop.php" class="nav-link">Shop</a></li>
          <li class="nav-item"><a href="../pages/custom.php" class="nav-link">Create</a></li>
          <li class="nav-item"><a href="../pages/contatti.html" class="nav-link">Contatti</a></li>
          <li class="nav-item"><a href="../account.php" class="nav-link bi bi-person-circle"></a></li>
          <li class="nav-item"><a href="../pages/carrello.php" class="nav-link bi bi-cart4"></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- LATO CLIENT -->


  <div class="welcome">

    <div class="contenuto-sx">

      <table id="clickableTable">

        <!-- parte iniziale------------------------------------>

        <th class="riservata">AREA RISERVATA</th>

        <!-- corpo--------------------------------------------->

        <tr>
          <td class="area profilo" onclick="Cambio_area('profilo')"> <i class="bi bi-person-circle"></i> PROFILO </td>
        </tr>

        <tr>
          <td class="area indirizzo" onclick="Cambio_area('indirizzo')"> <i class="bi bi-house-check-fill"></i> INDIRIZZO</td>
        </tr>
        <tr>
          <td class="area pagamento" onclick="Cambio_area('pagamento')"> <i class="bi bi-cash-coin"></i> PAGAMENTO</td>
        </tr>
        <tr>
          <td class="area impostazioni" onclick="Cambio_area('impostazioni')"> <i class="bi bi-gear-wide-connected"></i> IMPOSTAZIONI</td>
        </tr>

        <!-- parte finale -------------------------------------->

        <tfoot>
          <th class= "logout" id="logout"> <i class="bi bi-box-arrow-left"></i>ESCI</th>
        </tfoot>

      </table>

    </div>
    <!-----------------------PRIMO CONTENUTO -------------------------------------->
    <div class="contenuto-dx">
      <div class="sezione-contenuto" id="profilo">
        <div class="interno">
          <div class="oggetti">
            <label class= "interni-label" for="nome"> Nome </label>
            <div class= "interni-sx" id="nomeDisplay">
              <p class="nome"><?php echo htmlspecialchars($user['nome']); ?></p>
            </div>
          </div>

          <div class="oggetti">
            <label class= "interni-label" for="cognome"> Cognome </label>
            <div class= "interni-dx" id="cognomeDisplay">
              <p class="cognome"><?php echo htmlspecialchars($user['cognome']); ?></p>
            </div>
          </div>

          <div class="oggetti">
            <label class= "interni-label" for="email"> Email </label>
            <div class= "interni-sx" id="emailDisplay">
              <p class="email"><?php echo htmlspecialchars($user['email']); ?></p>
            </div>
          </div>

          <div class="oggetti">
            <label class= "interni-label" for="telefono"> Telefono </label>
            <div class= "interni-dx" id="telefonoDisplay">
              <p class="telefono"><?php echo htmlspecialchars($user['numero_telefono']); ?></p>
            </div>
          </div>
        </div>
      </div>


      <!-----------------------SECONDO CONTENUTO -------------------------------------->
      <div class="sezione-contenuto" id="indirizzo" style="display:none;">
        <div class="interno">

          <div class="oggetti">
            <label class= "interni-label" for="indirizzo"> Indirizzo </label>
            <div class= "interni-sx" id="indirizzoDisplay">
              <p class="indirizzo"><?php echo htmlspecialchars($user['indirizzo']); ?></p>
            </div>
          </div>

          <div class="oggetti">
            <label class= "interni-label" for="n_civico"> Numero Civico </label>
            <div class= "interni-dx" id="civicoDisplay">
              <p class="n_civico"><?php echo htmlspecialchars($user['n_civico']); ?></p>
            </div>
          </div>

          <div class="oggetti">
            <label class= "interni-label" for="citta"> Città </label>
            <div class= "interni-sx" id="cittaDisplay">
              <p class="citta"><?php echo htmlspecialchars($user['citta']); ?></p>
            </div>
          </div>

        </div>
      </div>

      <!-----------------------TERZO CONTENUTO -------------------------------------->
      <div class="sezione-contenuto" id="pagamento" style="display:none;">
        <div class="interno">

          <div class="oggetti">
            <label class= "interni-label" for="pagamento"> Dettagli di pagamento: </label>
            <div id="pagamentoDisplay">
              <input type="text" placeholder="1234-XXXX-XXXX-XXXX">
            </div>
          </div>

        </div>
      </div>
      <!-----------------------QUARTO CONTENUTO -------------------------------------->
      <div class="sezione-contenuto" id="impostazioni" style="display:none;">
        <div class="interno-quarto">
          <div id="overlay" class="overlay"></div>
          <div class="elimina-dati">
            <h3 class="input-elimina">Vuoi eliminare i tuoi dati?</h3>
            <button id="deleteButton">Elimina</button>
            <div id="popupElimina" class="popup">
              <div class="popup-content">
                <span class="closed">&times;</span>
                <!-- ------------------contenuto pop-up------------------------------------------- -->
                <div class="elimina" id="elimina">
                  <a>Vuoi eliminare i tuoi dati?</a>
                  <button class="btn btn-danger" type="submit" id="deleteAccountButton"> Elimina </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- FOOTER -->
  <footer class="footer footer-bg">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md">
              <div class="mb-4">
                <img src="../img/logo_footer.png" style="width: 75%;">
              </div>
            </div>
            <div class="col-md">
              <div class="mb-4">
                <h2 class="footer-heading">Navigazione</h2>
                <ul class="list-unstyled">
                  <li><a href="../index.html" class="py-2 d-block">Home</a></li>
                  <li><a href="../pages/shop.php" class="py-2 d-block">Shop</a></li>
                  <li><a href="../pages/custom.php" class="py-2 d-block">Custom</a></li>
                  <li><a href="../pages/contatti.html" class="py-2 d-block">Contatti</a></li>
                  <li><a href="../account.php" class="py-2 d-block">Account</a></li>
                  <li><a href="../pages/carrello.php" class="py-2 d-block">Carrello</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="mb-4">
                <h2 class="footer-heading">Contatti</h2>
                <ul class="list-unstyled">
                  <li><a href="tel:0123456789" class="py-2 d-block">0123 456789</a></li>
                  <li><a href="mailto:info@e_spresso.it" class="py-2 d-block">info@e_spresso.it</a></li>
                  <li><a target="_blank" href="#" class="py-2 d-block">Via Roma 17 00159, Roma</a></li>
                  <li><a target="_blank" href="#" class="py-2 d-block">Lascia una recensione!</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-4">
            <ul class="footer-social list-unstyled ">
              <li><a target="_blank" href="https://www.facebook.com/"><span class="bi bi-facebook"></span></a></li>
              <li><a target="_blank" href="https://www.instagram.com/"><span class="bi bi-instagram"></span></a></li>
              <li><a target="_blank" href="https://wa.me/"><span class="bi bi-whatsapp"></span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col- text-left">
          <p><a target="_blank" href="#">Informativa sulla privacy</a> / <a target="_blank" href="#">Cookie policy</a></p>
          <p>&copy; Exclusivity 2024. All Rights Reserved. Made by the E-Spresso Team.</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../scripts/script.js"></script>
  <script src="../scripts/"></script>
  <script src="../scripts/area_riservata.js"></script>

</body>

</html>