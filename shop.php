<?php
session_start();
include 'components.php';
include 'data.php';
render_head();
render_header('shop');

?>

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Our Shop</h3>
        <span class="breadcrumb"><a href="index.php">Home</a> > Our Shop</span>
      </div>
    </div>
  </div>
</div>

<div class="section trending">
  <div class="container">


    <?php 
    $categories = array_unique(array_column($products, 'category')); 
    ?>
    <ul class="trending-filter">
      <li><a class="is_active" href="#!" data-filter="*">Show All</a></li>
      <?php foreach ($categories as $cat): ?>
        <li><a href="#!" data-filter=".<?php echo $cat; ?>">
          <?php echo ucfirst($cat); ?>
        </a></li>
      <?php endforeach; ?>
    </ul>

    <div class="row trending-box">
      <?php foreach ($products as $product): ?>
        <div class="col-lg-3 col-md-6 mb-30 trending-items <?php echo $product['category']; ?>">
          <div class="item">
            <div class="thumb">
              <a href="product-details.php?id=<?php echo $product['id']; ?>">
                <img src="<?php echo $product['image']; ?>" alt="">
              </a>
              <span class="price">
                <?php if (!empty($product['old_price'])): ?>
                  <em>$<?php echo $product['old_price']; ?></em>
                <?php endif; ?>
                $<?php echo $product['price']; ?>
              </span>
            </div>
            <div class="down-content">
              <span class="category"><?php echo ucfirst($product['category']); ?></span>
              <h4><?php echo $product['name']; ?></h4>
              <a href="product-details.php?id=<?php echo $product['id']; ?>"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>

<?php render_footer(); ?>
