<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('Location: carrello_nologin.php');
  exit();
}

include '../php/funzioni_shop.php';
$cartItems = getCartItems($_SESSION['id']);
?>



<!DOCTYPE html>
<html lang="it">

<head>

  <title>E-spresso | Carrello</title>
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
  <link rel="stylesheet" href="../styles/carrello.css">


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
          <li class="nav-item"><a href="../login/area_riservata.php" class="nav-link bi bi-person-circle"></a></li>
          <li class="nav-item"><a href="carrello.php" class="nav-link bi bi-cart4"></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- CARRELLO -->
  <section class="carrello start-animation" id="carrello">
    <div class="card-carrello ">
      <!-- SEZIONE CARRELLO -->
      <div class="div-carrello">
        <h2>Carrello</h2>
        <div class="container-carrello ">
          <?php if (empty($cartItems)) : ?>
            <p>Il carrello è vuoto.</p>
          <?php else : ?>
            <table class="tabella">
              <thead class="tabella-head">
                <tr>
                  <th class="prod">Prodotto</th>
                  <th class="quan">Quantità</th>
                  <th class="pu">Prezzo</th>
                  <th class="ptot">Totale</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $total = 0; //inizializza totale a zero ?> 
                <?php foreach ($cartItems as $item) : ?>
                  <tr>
                    <td class="img-item">
                      <img src="../img/caffe/tipicaffe/<?php echo $item['nome']; ?>.png" alt="<?php echo $item['nome']; ?>">
                      <span class="nome-item"><?= htmlspecialchars($item['nome']) ?></span>
                    </td>
                    <td>
                      <div class="quantita-container">
                        <i class="bi bi-dash icona" onclick="diminuisce(<?= $item['id'] ?>)"></i>
                        <input type="number" class="quantita" data-id="<?= $item['id'] ?>" value="<?= htmlspecialchars($item['quantita']) ?>" min="1" readonly onchange="updateQuantita(<?= $item['id'] ?>, this.value)">
                        <i class="bi bi-plus icona" onclick="aumenta(<?= $item['id'] ?>)"></i>
                      </div>
                    </td>
                    <td class="prezzo" id="prezzo<?= $item['id'] ?>">€ <?= number_format($item['prezzo'], 2) ?></td>
                    <td class="subtot" id="subtotale<?= $item['id'] ?>">€ <?= number_format($item['quantita'] * $item['prezzo'], 2) ?></td>
                    <td>
                      <div class="container-rimuovi">
                        <i class="bi bi-x icona" onclick="rimuoviElementi(<?= $item['id'] ?>)"></i>
                      </div>
                    </td>
                  </tr>
                  <?php $total += $item['quantita'] * $item['prezzo']; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php endif; ?>
        </div>
        <div class="totale-carrello ">
          <div class="div-sx ">
            <a href="shop.php"><i class="bi bi-caret-left-fill"></i> Torna allo Shop</a>
          </div>
          <div class="div-dx ">
            <div class="subtotale">
              <table class="tabella-totale">
                <tr>
                  <td>Subtotale:</td>
                  <td style="text-align: right;">€<?= number_format($total, 2) ?></td>
                </tr>
                <tr>
                  <td>Spedizione:</td>
                  <td style="text-align: right;">€0.00</td>
                </tr>
              </table>
            </div>
            <div class="totale">
              <h4>Totale: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;€<?= number_format($total, 2) ?></h4>
            </div>
          </div>
        </div>
      </div>
      <!-- SEZIONE CHECKOUT -->
      <div class="checkout">
        <h2>Checkout</h2>
        <form>
          <div class="form-group">
            <label for="paymentMethod">Metodo di pagamento</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="metodopagamento" id="cartacredito" onclick="cambioMetodoPagamento('cartacredito')" checked>
              <label class="form-check-label" for="cartacredito">
                Carta di Credito
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="metodopagamento" id="paypal" onclick="cambioMetodoPagamento('paypal')">
              <label class="form-check-label" for="paypal">
                PayPal
              </label>
            </div>
          </div>
          <div id="infoCartaCredito" class="hidden">
            <div class="form-group">
              <label for="NomeCarta">Nome sulla Carta</label>
              <input type="text" class="form-control" id="NomeCarta" placeholder="Il tuo Nome">
            </div>
            <div class="form-group">
              <label for="cardNumber">Numero della Carta</label>
              <input type="text" class="form-control" id="numerocarta" placeholder="**** **** **** 2153">
            </div>
            <div class="form-group">
              <label for="cardExpiry">Data di Scadenza</label>
              <input type="text" class="form-control" id="scadenzacarta" placeholder="MM/YYYY">
            </div>
            <div class="form-group">
              <label for="cardCVC">CVV</label>
              <input type="text" class="form-control" id="CVV" placeholder="***">
            </div>
          </div>
          <div id="infoPayPal" class="paypal-button hidden">
            <button type="button" class="btn btn-primary btn-block"><i class="bi bi-paypal"></i></button>
          </div>
          <div class="checkout-button">
            <button type="submit" class="btn btn-primary btn-block">CheckOut</button>
          </div>
        </form>
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
                  <li><a href="../login/area_riservata.php" class="py-2 d-block">Account</a></li>
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


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../scripts/script.js"></script>
  <script src="../scripts/carrello.js"></script>

</body>

</html>