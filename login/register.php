<!DOCTYPE html>
<html  lang="it">
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
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/register.css">
        


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
              <li class="nav-item"><a href="../pages/caffe.html" class="nav-link">Caffè</a></li>
              <li class="nav-item"><a href="../pages/custom.php" class="nav-link">Create</a></li>
              <li class="nav-item"><a href="../pages/contatti.html" class="nav-link">Contatti</a></li>
              <li class="nav-item"><a href="../account.php" class="nav-link bi bi-person-circle"></a></li>
              <li class="nav-item"><a href="../pages/carrello.html" class="nav-link bi bi-bag"></a></li>
            </ul>
        </div>
      </div>
    </nav>

<!-- LATO CLIENT -->

<!-- Contenuto sotto la navbar -->
<div class="page-content-login ">
  <div class="container-register"> 
    <!--INSERISCI QUI IL NUOVO CODICE-->
    <video id="login-video-register" autoplay loop muted>
      <source src="../img/video/c03_top.MOV" type="video/mp4">
    </video>
    <form class="" action="utility/register.php" method="POST">  <!-- la post serve per mandare i dati ad utility/register.php per processarli -->
    <div class="row justify-content-center">
        <div class="col-md-6 login-container">
          <div class="card">
          <h2 class="card-under-header">Completa la registrazione!</h2>
            <div class="card-body">

                  <form id="register-form">
                    <input type="hidden" name="action" value="register">
                    <div class="form-group">
                      <label for="nome">Nome</label>
                      <input autofocus name="nome" type="text" class="form-control" id="nome" required placeholder="Il tuo nome">
                    </div>

                    <div class="form-group">
                      <label for="cognome">Cognome</label>
                      <input autofocus name="cognome" type="text" class="form-control" id="cognome"  required placeholder="Il tuo cognome">
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label> 
                      <!-- pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}" -->
                      <input autofocus name="email" type="text" class="form-control" id="email"  required placeholder="tuamail@gmail.it">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label> 
                        <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" --> 
                        <input name="password" id="password" type="text"  class="form-control"  required placeholder="Password12.">
                    </div>

                    <div class="form-group">
                        <label for="indirizzo">Indirizzo</label> 
                        <input type="text" class="form-control" id="indirizzo" autofocus name="indirizzo" required placeholder="Il tuo indirizzo">
                    </div>

                    <div class="form-group">
                      <label for="n_civico">Numero civico</label> 
                      <input type="text" class="form-control" id="n_civico" autofocus name="n_civico" required placeholder="Numero civico">
                    </div>
                    
                    <div class="form-group">
                      <label for="citta">Città</label> 
                      <input type="text" class="form-control" id="citta" autofocus name="citta" required placeholder="La tua città">
                    </div>

                    <div class="form-group">
                      <label for="numero_telefono">Numero di telefono</label> 
                      <input type="text" class="form-control" id="numero_telefono" autofocus name="numero_telefono" required placeholder="Il tuo numero">
                    </div>
                 </form>
            </div>
          <div class="btn-login">
            <button class="btn btn-primary" type="submit"> Registrati </button>
          </div>
        </div>
    </div>
    </form>
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
                    <li><a href="../pages/caffe.html" class="py-2 d-block">Caffe</a></li>
                    <li><a href="../pages/custom.php" class="py-2 d-block">Custom</a></li>
                    <li><a href="../pages/contatti.html" class="py-2 d-block">Contatti</a></li>
                    <li><a href="../account.php" class="py-2 d-block">Account</a></li>
                    <li><a href="../pages/carrello.html" class="py-2 d-block">Carrello</a></li>
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
            <p><a target="_blank" href="#">Informativa sulla privacy</a>  /  <a target="_blank" href="#">Cookie policy</a></p>
            <p>&copy; Exclusivity 2024. All Rights Reserved. Made by the E-Spresso Team.</p>
          </div>
        </div>
      </div>
    </footer>


      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="../scripts/script.js"></script>

    </body>
</html>