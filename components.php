<?php
function render_head($title = "Lugx Gaming Shop") {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title><?= htmlspecialchars($title) ?></title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>
<body>
<?php
}

function render_header($active = "home") {
    if (session_status() == PHP_SESSION_NONE) session_start();
    $cart_count = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $cart_count += $item['quantity'];
        }
    }
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>
<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <a href="index.php" class="logo">
            <img src="assets/images/logo.png" alt="" style="width: 158px;">
          </a>
          <ul class="nav">
            <li><a href="index.php" class="<?= $active=='home'?'active':'' ?>">Home</a></li>
            <li><a href="shop.php" class="<?= $active=='shop'?'active':'' ?>">Our Shop</a></li>
            <li><a href="product-details.php" class="<?= $active=='product'?'active':'' ?>">Product Details</a></li>
            <li><a href="contact.php" class="<?= $active=='contact'?'active':'' ?>">Contact Us</a></li>
            <?php if ($username): ?>
              <li><a href="#"><?= htmlspecialchars($username) ?></a></li>
              <li><a href="signout.php">Sign Out</a></li>
            <?php else: ?>
              <li><a href="signin.php">Sign In</a></li>
            <?php endif; ?>
            <li><a href="cart.php">Cart (<?= $cart_count ?>)</a></li>
          </ul>
          <a class='menu-trigger'><span>Menu</span></a>
        </nav>
      </div>
    </div>
  </div>
</header>
<?php
}

function render_footer() {
?>
<footer>
  <div class="container">
    <div class="col-lg-12">
      <p>Copyright © 2048 LUGX Gaming Company. All rights reserved.</p>
    </div>
  </div>
</footer>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/counter.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
<?php
}
