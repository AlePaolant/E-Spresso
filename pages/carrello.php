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
          <li class="nav-item"><a href="../account.php" class="nav-link bi bi-person-circle"></a></li>
          <li class="nav-item"><a href="carrello.php" class="nav-link bi bi-bag"></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="carrello start-animation" id="carrello">
    <div class="card-carrello bg-secondary">
      <div class="shopping-cart bg-primary">
        <h2>Shopping Cart</h2>
        <div class="cart-container">
          <?php if (empty($cartItems)) : ?>
            <p>Your cart is empty.</p>
          <?php else : ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Size</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cartItems as $item) : ?>
                  <tr>
                    <td><?= htmlspecialchars($item['nome']) ?></td>
                    <td><?= htmlspecialchars($item['size']) ?></td>
                    <td>
                      <input type="number" class="form-control" value="<?= htmlspecialchars($item['quantita']) ?>" min="1" onchange="updateQuantita(<?= $item['id'] ?>, this.value)">
                    </td>
                    <td>$<?= number_format($item['prezzo'], 2) ?></td>
                    <td>$<?= number_format($item['prezzo'] * $item['quantita'], 2) ?></td>
                    <td><button class="btn btn-danger btn-sm" onclick="rimuoviElementi(<?= $item['id'] ?>)">X</button></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php endif; ?>
        </div>
        <a href="shop.php" class="btn btn-secondary">Continue Shopping</a>
      </div>
      <!-- AAAAAAAAA -->
      <div class="checkout bg-secondary">
        <h2>Payment Info</h2>
        <form>
          <div class="form-group">
            <label for="paymentMethod">Payment Method</label>
            <select class="form-control" id="paymentMethod" onchange="selezionaMetodoPagamento()">
              <option value="creditCard">Credit Card</option>
              <option value="paypal">PayPal</option>
            </select>
          </div>
          <div id="creditCardInfo">
            <div class="form-group">
              <label for="cardName">Name on Card</label>
              <input type="text" class="form-control" id="cardName" value="John Carter">
            </div>
            <div class="form-group">
              <label for="cardNumber">Credit Card Number</label>
              <input type="text" class="form-control" id="cardNumber" value="**** **** **** 2153">
            </div>
            <div class="form-group">
              <label for="cardExpiry">Expiration Date</label>
              <input type="text" class="form-control" id="cardExpiry" value="05/2022">
            </div>
            <div class="form-group">
              <label for="cardCVC">CVC</label>
              <input type="text" class="form-control" id="cardCVC" value="136">
            </div>
          </div>
          <div id="paypalInfo" class="hidden">
            <button type="button" class="btn btn-primary btn-block">Pay with PayPal</button>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Check Out</button>
        </form>
      </div>
    </div>
  </section>

  <!-- <h2>Your Cart</h2>
    <?php if (empty($cartItems)) : ?>
        <p>Your cart is empty.</p>
    <?php else : ?>
        <ul>
            <?php foreach ($cartItems as $item) : ?>
                <li><?= htmlspecialchars($item['nome']) ?> - $<?= number_format($item['prezzo'], 2) ?> - Quantity: <?= $item['quantita'] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="shop.php">Back to Shop</a> -->





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


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../scripts/script.js"></script>
  <script src="../scripts/carrello.js"></script>

</body>

</html>