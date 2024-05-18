<!DOCTYPE html>
<html  lang="it">
    <head>
      
      <title>E-spresso | CREATE</title>
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
      <meta property="og:image" content="http://www.e-spresso.it/img/og_image.png"> <!-- ovviamente non funziona -->
      
      <link rel="icon" type="svg" href="../img/icon.svg">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

      <link rel="stylesheet" href="../styles/style.css">
      <link rel="stylesheet" href="../styles/custom.css">
        


    </head>
    <body>
      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container container-navbar">
          <a href="../index.html">
            <img src="../img/navbar-brand-w.png" class="logo-bianco" id="logo-bianco" alt="Logo Bianco">
            <img src="../img/navbar-brand-b.png" id="logo-nero" alt="Logo Nero">
          </a>

          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#nav-ham" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="container">
          <div class="collapse navbar-collapse" id="nav-ham">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="../index.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="caffe.html" class="nav-link">Caffè</a></li>
                <li class="nav-item"><a href="custom.html" class="nav-link">Create</a></li>
                <li class="nav-item"><a href="contatti.html" class="nav-link">Contatti</a></li>
                <li class="nav-item"><a href="../account.php" class="nav-link bi bi-person-circle"></a></li>
                <li class="nav-item"><a href="carrello.html" class="nav-link bi bi-bag"></a></li>
              </ul>
          </div>
        </div>
      </nav>
      

      


      <section class="custom start-animation" id="custom">
        <div class="container justify-content-center align-items-center text-center">
          <h1>INSERIRE CARD CAFFE</h1>
          
        </div>
      </section>

          
      
      <section class="selezione start-animation" id="selezione">
        <div class="container mt-5">
          <h1 class="mb-4">Scelta del Caffè</h1>
          <img src="../img/divisore.png" class="img-divisore">
          <p>Tua la tazza, tua la miscela! Scegli tra una vasta selezione di caffè e crea la miscela perfetta per il tuo palato. 
            <br>Con un tocco di creatività e un pizzico di passione, ogni tazza diventa un'opera d'arte da gustare e apprezzare.</p>
          <p>Seleziona la corposità e l'acidità, seleziona fino a 2 gusti e 2 retrogusti e scopri se esiste il caffè perfetto per te!</p>
          <p>Non esiste? Non preoccuparti, puoi crearne uno tutto tuo!</p>
        </div>
            <!-- Filtri per la scelta del caffè -->
          <div class="filtri row mb-3">
            <div class="corposita">
              <label for="corposita-buttons" class="filtri-label">Corposità:</label>
              <div id="corposita-buttons" class="corposita-container"></div>
            </div>
            <div class="acidita">
              <label for="acidita-buttons" class="filtri-label">Acidità:</label>
              <div id="acidita-buttons" class="acidita-container"></div>
            </div>
            <div class="gusti">
              <label for="gusti-buttons" class="filtri-label">Gusti:</label>
              <div id="gusti-buttons" class="gusti-container"></div>
            </div>            
            <div class="retrogusti">
              <label for="retrogusti-buttons" class="filtri-label">Retrogusti:</label>
              <div id="retrogusti-buttons" class="retrogusti-container"></div>
            </div>
          </div>

          <button onclick="filtroCaffe()" class="btn">Applica Filtro</button>

          <!-- Risultati della ricerca -->
          <div id="risultati" class="risultati mt-5">
            <!-- Qui vengono visualizzati i risultati della ricerca -->
          </div>  
        </div>
        
      </section> 

      <section class="crea start-animation" id="crea">
        <div class="container">
          <?php
          // Configurazione database
          $dsn = 'pgsql:host=localhost;port=5432;dbname=Caffe';
          $username = 'postgres';
          $password = 'admin';

          try {
              //select - fondamentale rimuovere i gusti custom già esistenti nel database 
              $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
              $stmt = $pdo->prepare("SELECT id, nome FROM tipicaffe WHERE nome != :escludiGustoCustom");
              $escludiGustoCustom = "Gusto Custom";
              $stmt->bindParam(':escludiGustoCustom', $escludiGustoCustom, PDO::PARAM_STR);
              $stmt->execute(); 
              $caffeList = $stmt->fetchAll(PDO::FETCH_ASSOC);
          } catch (PDOException $e) {
              echo 'Connection failed: ' . $e->getMessage();
          }

          foreach ($caffeList as $caffe): ?>
              <div class="caffe-item" draggable="true" ondragstart="drag(event, <?php echo $caffe['id']; ?>)" id="caffe-<?php echo $caffe['id']; ?>">
                  <img src="../img/caffe/tipicaffe/<?php echo $caffe['nome']; ?>.png" alt="<?php echo $caffe['nome']; ?>">
                  <p><?php echo $caffe['nome']; ?></p>
              </div>
          <?php endforeach; ?>
        <div class="drop-zone-container">
          <div class="drop-sx">
            <div class="drop-zone1" ondrop="drop(event)" ondragover="allowDrop(event)" id="zone-1"></div>
            <input type="range" min="0" max="100" value="50" class="slider" id="slider-1" onchange="updateSliders(this)">
            <div class="percentage" id="percentage-1">50%</div>
          </div>
          <div class="drop-dx">
            <div class="drop-zone2" ondrop="drop(event)" ondragover="allowDrop(event)" id="zone-2"></div>
            <input type="range" min="0" max="100" value="50" class="slider" id="slider-2" onchange="updateSliders(this)">
            <div class="percentage" id="percentage-2">50%</div>
          </div>
        </div>
        <button class="submit-button" onclick="submitCustom()">Crea Gusto Custom</button>
        </div>

      </section>
    




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
                      <li><a href="caffe.html" class="py-2 d-block">Caffe</a></li>
                      <li><a href="custom.html" class="py-2 d-block">Create</a></li>
                      <li><a href="contatti.html" class="py-2 d-block">Contatti</a></li>
                      <li><a href="account.html" class="py-2 d-block">Account</a></li>
                      <li><a href="carrello.html" class="py-2 d-block">Carrello</a></li>
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
              <p>&copy; Exclusivity 2023. All Rights Reserved. Made by the E-Spresso Team.</p>
            </div>
          </div>
        </div>
      </footer>


      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="../scripts/script.js"></script>
      <script src="../scripts/custom.js"></script>

    </body>
</html>