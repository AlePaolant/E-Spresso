<!DOCTYPE html>
<html lang="it">

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
  <nav class="navbar navbar-expand-lg start-animation" id="navbar">
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
          <li class="nav-item"><a href="carrello.php" class="nav-link bi bi-bag"></a></li>
        </ul>
      </div>
    </div>
  </nav>




  <!-- LANDING -->
  <section class="landing start-animation" id="landing">
    <div class="container justify-content-center align-items-center text-center">
      <h1>Benvenuto nella sezione create!</h1>
      <p>Qui potrai trovare o creare il caffè perfetto per te, ma prima ti consigliamo di informarti sui criteri di selezione.
        <br>Sono 4, e scorrendo li potrai scoprire nel dettaglio: Corposità, Acidità, Gusto e Retrogusto
      </p>
      <p>Se conosci già la teoria e vuoi cimentarti con la creazione clicca <a href="custom.php#crea">QUI</a>.</p>
    </div>
  </section>

  <!-- SPIEGONE -->
  <section class="spiegone start-animation" id="spiegone">
    <div class="corpo">
      <img src="../img/custom/coffee-corpo.png" alt="corpo-img">
      <div class="testo">
        <h1>Corposità</h1>
        <p>La composita di un caffè si può ricondurre al senso del tatto: si tratta infatti,
          della proprietà fisica della bevanda percepita dalla bocca durante e dopo l’ingestione.
          <br>Indica la struttura del liquido e la concentrazione delle sostanze in esso disciolte.
          <br>Nell’analisi sensoriale del caffè, la corposità riguarda la <strong>densità</strong>,
          l’<strong>oleosità</strong> (ossia il contenuto in grassi) e la <strong>viscosità</strong> (ossia la quantità di materia solida sospesa nell’infuso).
        </p>
      </div>
    </div>
    <div class="acido">
      <div class="testo">
        <h1>Acidità</h1>
        <p>L’acidità è uno tra i gusti più confusi e incompresi dall’uomo, probabilmente per via del fatto che l’acidità
          è letta dal nostro cervello come un segnale di pericolo, o di possibile tossicità, ma nel caffè è un parametro positivo,
          anzi è indice di un caffè di qualità superiore.
          <br>A livello sensoriale l’acidità è una risorsa, è in grado di aprire le papille gustative,
          predisponendo il palato a recepire tutte le sfumature di un buon caffè.
        </p>
      </div>
      <img src="../img/custom/coffee-acido.png" alt="acido-img">
    </div>
    <div class="g-r-container">
      <div class="g-r g-r-margin">
        <h1>Gusto</h1>
        <p>Per gusto intendiamo le note aromatiche del caffè. Se ne percepiscono di diverse, e per distinguerle si ricorre alla ruota degli aromi:
          La ruota degli aromi è uno strumento ideato dalla SCAA (Specialty Coffee Association of America) fondamentale al fine di percepire e
          quindi descrivere correttamente tutte le note aromatiche di un caffè.</p>
      </div>
      <div class="g-r">
        <h1>Retrogusto</h1>
        <p>Il retrogusto è l’ultima fase dell’analisi sensoriale del caffè, e riguarda il gusto che il caffè ci lascia in bocca, il ricordo che rimane
          all’interno del palato una volta che la nostra tazzina sarà vuota.
          Oltre alle note aromatiche che variano a seconda del chicco e della provenienza, il retrogusto può variare anche in base alla persistenza,
          cioè per quanti minuti rimane in bocca una buona sensazione di caffe.</p>
      </div>
    </div>
  </section>

  <!-- SELEZIONE -->
  <section class="selezione start-animation" id="selezione">
    <div class="container mt-5">
      <h1 class="mb-4">Scelta del Caffè</h1>
      <img src="../img/divisore.png" class="img-divisore">
      <p>Tua la tazza, tua la miscela! Scegli tra una vasta selezione di caffè e crea la miscela perfetta per il tuo palato.
        <br>Con un tocco di creatività e un pizzico di passione, ogni tazza diventa un'opera d'arte da gustare e apprezzare.
      </p>
      <p>Seleziona la <strong>corposità</strong> e l'<strong>acidità</strong>, seleziona fino a <strong>2 gusti</strong> e <strong>2 retrogusti</strong> e scopri se esiste il caffè perfetto per te!</p>
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
  </section>

  <!-- CREAZIONE -->
  <section class="crea start-animation" id="crea">
    <div class="container">
      <div class="crea-intestazione testo">
        <h1>Qui tocca a te!</h1>
        <p>Crea il caffè perfetto combinando i tipi a disposizione!
          <br>Basta trascinare l'immagine del caffè desiderato nel riquadro e scegliere la percentuale di un gusto rispetto all'altro.
          <br>Ti consigliamo di controllare prima quale caffè ha il gusto desiderato, utilizzando il tool <a href="custom.php#selezione">qui sopra</a> e poi puoi sbizzarrirti a creare!
        </p>
      </div>
      <?php
      //File per connessione al database
      include("../login/utility/config.php");


      $stmt = $pdo->prepare("SELECT id, nome FROM tipicaffe WHERE nome != :escludiGustoCustom");
      $escludiGustoCustom = "Gusto Custom";
      $stmt->bindParam(':escludiGustoCustom', $escludiGustoCustom, PDO::PARAM_STR);
      $stmt->execute();
      $caffeList = $stmt->fetchAll(PDO::FETCH_ASSOC);


      foreach ($caffeList as $caffe) : ?>
        <div class="caffe-item" draggable="true" ondragstart="drag(event, <?php echo $caffe['id']; ?>)" id="caffe-<?php echo $caffe['id']; ?>">
          <img src="../img/caffe/tipicaffe/<?php echo $caffe['nome']; ?>.png" alt="<?php echo $caffe['nome']; ?>">
          <p class="text-on-drag-item"><?php echo $caffe['nome']; ?></p>
        </div>
      <?php endforeach; ?>
      <div class="drop-zone-container">
        <div class="drop-sx">
          <div class="drop-zone" ondrop="drop(event)" ondragover="allowDrop(event)" id="zone-1"></div>
          <input type="range" min="0" max="100" value="50" class="slider" id="slider-1" onchange="updateSliders(this)">
          <div class="percentage" id="percentage-1">50%</div>
        </div>
        <div class="drop-dx">
          <div class="drop-zone" ondrop="drop(event)" ondragover="allowDrop(event)" id="zone-2"></div>
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
                <img class="footer-logo" src="../img/logo_footer.png">
              </div>
            </div>
            <div class="col-md">
              <div class="mb-4">
                <h2 class="footer-heading">Navigazione</h2>
                <ul class="list-unstyled">
                  <li><a href="../index.html" class="py-2 d-block">Home</a></li>
                  <li><a href="shop.php" class="py-2 d-block">Shop</a></li>
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
  <script src="../scripts/custom.js"></script>

</body>

</html>