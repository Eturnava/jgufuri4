<?php
session_start();
include 'components.php';
include 'data.php';

// Get product ID from query string
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = null;
foreach ($products as $p) {
    if ($p['id'] == $product_id) {
        $product = $p;
        break;
    }
}
if (!$product) {
    // Product not found
    header("Location: shop.php");
    exit;
}

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $qty = isset($_POST['quantity']) ? max(1, intval($_POST['quantity'])) : 1;
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $qty;
    } else {
        $_SESSION['cart'][$product_id] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'quantity' => $qty
        ];
    }
    header("Location: product-details.php?id=$product_id&added=1");
    exit;
}

render_head("Product Details");
render_header('product');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Lugx Gaming - Product Detail</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
  </head>

<body>



  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3><?= htmlspecialchars($product['name']) ?></h3>
          <span class="breadcrumb"><a href="index.php">Home</a>  >  <a href="shop.php">Shop</a>  >  <?= htmlspecialchars($product['name']) ?></span>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="<?= htmlspecialchars($product['image']) ?>" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4><?= htmlspecialchars($product['name']) ?></h4>
          <span class="price">
            <?php if (!empty($product['old_price'])): ?>
              <em>$<?= htmlspecialchars($product['old_price']) ?></em>
            <?php endif; ?>
            $<?= htmlspecialchars($product['price']) ?>
          </span>
          <?php if (isset($_GET['added'])): ?>
            <div class="alert alert-success mt-2">Added to cart!</div>
          <?php endif; ?>
          <form id="qty" method="post" action="">
            <input type="number" name="quantity" class="form-control mb-2" value="1" min="1" style="width:100px;display:inline-block;">
            <button type="submit" name="add_to_cart" class="btn btn-primary"><i class="fa fa-shopping-bag"></i> ADD TO CART</button>
          </form>
          <ul>
            <li><span>Game ID:</span> <?= htmlspecialchars($product['id']) ?></li>
            <li><span>Genre:</span> <?= htmlspecialchars($product['category']) ?></li>
          </ul>
        </div>
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>
<?php render_footer(); ?>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>