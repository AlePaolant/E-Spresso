<?php
include '../php/funzioni_shop.php';
$products = getProducts();
?>


<!DOCTYPE html>
<html lang="it">

<head>

  <title>E-spresso | Caffè</title>
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
  <link rel="stylesheet" href="../styles/shop.css">  <!-- AGGIUNTA 24/05 -->



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
          <li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
          <li class="nav-item"><a href="custom.php" class="nav-link">Create</a></li>
          <li class="nav-item"><a href="contatti.html" class="nav-link">Contatti</a></li>
          <li class="nav-item"><a href="../account.php" class="nav-link bi bi-person-circle"></a></li>
          <li class="nav-item"><a href="carrello.php" class="nav-link bi bi-cart4"></a></li>
        </ul>
      </div>
    </div>
  </nav>


  <section class="page-class">

    <section class="shop-home">
      
      <div class="shop-container">
        <h1 class="shop-title">Shop</h1>
        <p class="shop-description">Qui potrai effettuare l'acquisto di diverse tipologie di caffè, divise in quattro categorie.
          <br>Ogni unità acquistata equivale a 450g di prodotto.
          <br>Usa i pulsanti "freccia" per navigare fra i prodotti disponibili, ed il pulsante "info" per visualizzarne descrizioni più dettagliate.
          <br>Sulla destra troverai il pulsante per accedere al carrello.</p>
      </div>

      <a href="#acquista"><button class="down-btn"><i class="bi bi-arrow-down"></i></button></a>
    
    </section>
      
    <!-- AGGIUNTA 24/05, AGGIORNATA 25/05 -->
    <?php 
      $categorie = ['Singole origini', 'Top selection', 'Miscele', 'Specialty'];
      $categorie['Singole origini'] = [];
      $categorie['Top selection'] = [];
      $categorie['Miscele'] = [];
      $categorie['Specialty'] = [];

      foreach ($products as $product) {
        $cat = $product['categoria'];
        if ( isset($categorie[$cat]) ){
          $categorie[$cat][] = $product;
        }
      }
    ?>

    <section id="acquista" class="acquista">
      <a href="../pages/carrello.php"><button id="cart-btn" class="cart-btn"><i class="bi bi-cart2"></i></button></a>

      <!-- SEZIONE SINGOLE ORIGINI -->
      <section class="category-section">
        <div class="category-container">
          <h1 class="category-title">SINGOLE ORIGINI</h1>
          <p class="category-description">Un caffè Singola Origine è un’unica varietà di caffè (Arabica, Robusta, Fine Robusta) coltivato all’interno di un’area geografica ben determinata. 
            Di conseguenza le sue proprietà organolettiche sono ben riconoscibili e distintive.</p>
        </div>

        <div class="slider-container">
          <div class="card-slider">
            <div class="pointer">
              <?php foreach ($categorie['Singole origini'] as $caffe) : ?>

                <div class="card">

                  <div class="card-img-container">
                    <img src="../img/caffe/tipicaffe/<?= $caffe['nome'] ?>.png" class="card-img">
                  </div>
                  <div class="card-title-container">
                    <p class="card-title"><?= $caffe['nome'] ?></p>
                  </div>

                  <button class="card-btn-price" onclick="addToCart(<?= $caffe['id'] ?>)">€<?= $caffe['prezzo'] ?>&nbsp&nbsp<i class="bi bi-cart2"></i></button>
                  <button class="card-btn-desc"><i class="bi bi-info"></i></button>
                  <div class="card-desc-container">
                    <p class="card-desc"><?= $caffe['descrizione'] ?></p>
                  </div>

                </div>

              <?php endforeach; ?>
            </div>

            <button class="left-btn"><i class="bi bi-caret-left-fill"></i></button>
            <button class="right-btn"><i class="bi bi-caret-right-fill"></i></button>
          </div>

          <div class="dot-container"></div>
        </div>
              
      </section>

      <!-- SEZIONE TOP SELECTION -->
      <section class="category-section2">
        <div class="category-container">
          <h1 class="category-title2">TOP SELECTION</h1>
          <p class="category-description2">I caffè Top Selection sono microlotti tacciabili di arabiche pregiate con un profilo aromatico complesso.</p>
        </div>

        <div class="slider-container">
          <div class="card-slider">
            <div class="pointer">
              <?php foreach ($categorie['Top selection'] as $caffe) : ?>

                <div class="card">

                  <div class="card-img-container">
                    <img src="../img/caffe/tipicaffe/<?= $caffe['nome'] ?>.png" class="card-img">
                  </div>
                  <div class="card-title-container">
                    <p class="card-title"><?= $caffe['nome'] ?></p>
                  </div>

                  <button class="card-btn-price" onclick="addToCart(<?= $caffe['id'] ?>)">€ <?= $caffe['prezzo'] ?>&nbsp&nbsp<i class="bi bi-cart2"></i></button>
                  <button class="card-btn-desc"><i class="bi bi-info"></i></button>
                  <div class="card-desc-container">
                    <p class="card-desc"><?= $caffe['descrizione'] ?></p>
                  </div>

                </div>

              <?php endforeach; ?>
            </div>

            <button class="left-btn"><i class="bi bi-caret-left-fill"></i></button>
            <button class="right-btn"><i class="bi bi-caret-right-fill"></i></button>
          </div>

          <div class="dot-container"></div>
        </div>
              
      </section>

      <!-- SEZIONE MISCELE -->
      <section class="category-section3">
        <div class="category-container">
          <h1 class="category-title">MISCELE</h1>
          <p class="category-description">Le miscele nascono dalla miscelazione delle singole origini e dalle arabiche top selection. 
            Gli unici caffè che non possono essere miscelati, per le loro caratteristiche organolettiche, sono i caffè della categoria Specialty Coffee.</p>
        </div>

        <div class="slider-container">
          <div class="card-slider">
            <div class="pointer">
              <?php foreach ($categorie['Miscele'] as $caffe) : ?>

                <div class="card">

                  <div class="card-img-container">
                    <img src="../img/caffe/tipicaffe/<?= $caffe['nome'] ?>.png" class="card-img">
                  </div>
                  <div class="card-title-container">
                    <p class="card-title"><?= $caffe['nome'] ?></p>
                  </div>

                  <button class="card-btn-price" onclick="addToCart(<?= $caffe['id'] ?>)">€ <?= $caffe['prezzo'] ?>&nbsp&nbsp<i class="bi bi-cart2"></i></button>
                  <button class="card-btn-desc"><i class="bi bi-info"></i></button>
                  <div class="card-desc-container">
                    <p class="card-desc"><?= $caffe['descrizione'] ?></p>
                  </div>

                </div>

              <?php endforeach; ?>
            </div>

            <button class="left-btn"><i class="bi bi-caret-left-fill"></i></button>
            <button class="right-btn"><i class="bi bi-caret-right-fill"></i></button>
          </div>

          <div class="dot-container"></div>
        </div>
              
      </section>

      <!-- SEZIONE SPECIALTY -->
      <section class="category-section4">
        <div class="category-container">
          <h1 class="category-title2">SPECIALTY</h1>
          <p class="category-description2">Un caffè verde pregiato della specie Arabica, tostato in modo da esprimere tutto il suo profilo aromatico e gustativo ed estratto secondo standard di qualità precisi. 
            Uno Specialty Coffee viene valutato con il metodo di degustazione del protocollo SCA (Specialty Coffee Association) che analizza l’alta qualità del chicco assegnando un punteggio su una scala che va da 80 a 100 punti (“cupping score” riportato in etichetta).</p>
        </div>

        <div class="slider-container">
          <div class="card-slider">
            <div class="pointer">
              <?php foreach ($categorie['Specialty'] as $caffe) : ?>

                <div class="card">

                  <div class="card-img-container">
                    <img src="../img/caffe/tipicaffe/<?= $caffe['nome'] ?>.png" class="card-img">
                  </div>
                  <div class="card-title-container">
                    <p class="card-title"><?= $caffe['nome'] ?></p>
                  </div>

                  <button class="card-btn-price" onclick="addToCart(<?= $caffe['id'] ?>)">€ <?= $caffe['prezzo'] ?>&nbsp&nbsp<i class="bi bi-cart2"></i></button>
                  <button class="card-btn-desc"><i class="bi bi-info"></i></button>
                  <div class="card-desc-container">
                    <p class="card-desc"><?= $caffe['descrizione'] ?></p>
                  </div>

                </div>

              <?php endforeach; ?>
            </div>

            <button class="left-btn"><i class="bi bi-caret-left-fill"></i></button>
            <button class="right-btn"><i class="bi bi-caret-right-fill"></i></button>
          </div>

          <div class="dot-container"></div>
        </div>
              
      </section>

    </section>
    <!-- FINE SEZIONI CATEGORIE -->
  </section>

  <!-- FOOTER -->
  <footer class="footer footer-bg">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md">
              <div class="mb-4">
                <img class="footer-logo" src="../img/logo_footer.png">
              </div>
            </div>
            <div class="col-md">
              <div class="mb-4">
                <h2 class="footer-heading">Navigazione</h2>
                <ul class="list-unstyled">
                  <li><a href="../index.html" class="py-2 d-block">Home</a></li>
                  <li><a href="shop.php" class="py-2 d-block">Caffe</a></li>
                  <li><a href="custom.php" class="py-2 d-block">Create</a></li>
                  <li><a href="contatti.html" class="py-2 d-block">Contatti</a></li>
                  <li><a href="../account.php" class="py-2 d-block">Account</a></li>
                  <li><a href="carrello.php" class="py-2 d-block">Carrello</a></li>
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
          <p>&copy; Exclusivity 2023. All Rights Reserved. Made by the E-Spresso Team.</p>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../scripts/script.js"></script>
  <script src="../scripts/shop.js"></script>

</body>

</html>