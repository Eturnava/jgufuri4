<div class="features">
  ...
</div>

<!-- Trending Games -->
<div class="section trending">
  <div class="container">
    <div class="row">
      <div class="col-lg-6"><div class="section-heading"><h6>Trending</h6><h2>Trending Games</h2></div></div>
      <div class="col-lg-6"><div class="main-button"><a href="shop.php">View All</a></div></div>
      <?php foreach ($trending_games as $game): ?>
      <div class="col-lg-3 col-md-6">
        <div class="item">
          <div class="thumb">
            <a href="product-details.php"><img src="<?= $game['image'] ?>" alt=""></a>
            <span class="price">
              <?php if (!empty($game['price_old'])): ?><em>$<?= $game['price_old'] ?></em><?php endif; ?>
              $<?= $game['price'] ?>
            </span>
          </div>
          <div class="down-content">
            <span class="category"><?= $game['category'] ?></span>
            <h4><?= $game['title'] ?></h4>
            <a href="product-details.php"><i class="fa fa-shopping-bag"></i></a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>