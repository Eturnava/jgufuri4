<!-- Most Played -->
<div class="section most-played">
  <div class="container">
    <div class="row">
      <div class="col-lg-6"><div class="section-heading"><h6>TOP GAMES</h6><h2>Most Played</h2></div></div>
      <div class="col-lg-6"><div class="main-button"><a href="shop.php">View All</a></div></div>
      <?php foreach ($most_played as $game): ?>
      <div class="col-lg-2 col-md-6 col-sm-6">
        <div class="item">
          <div class="thumb">
            <a href="product-details.php"><img src="<?= $game['image'] ?>" alt=""></a>
          </div>
          <div class="down-content">
            <span class="category"><?= $game['category'] ?></span>
            <h4><?= $game['title'] ?></h4>
            <a href="product-details.php">Explore</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>