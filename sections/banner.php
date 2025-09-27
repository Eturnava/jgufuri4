<?php
include_once 'data.php';
$search_results = [];
if (isset($_GET['searchKeyword']) && trim($_GET['searchKeyword']) !== '') {
    $keyword = strtolower(trim($_GET['searchKeyword']));
    foreach ($products as $product) {
        if (strpos(strtolower($product['name']), $keyword) !== false) {
            $search_results[] = $product;
        }
    }
}
?>
<div class="main-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="caption header-text">
          <h6>Welcome to lugx</h6>
          <h2>BEST GAMING SITE EVER!</h2>
          <div class="search-input">
            <form id="search" action="" method="get">
              <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" value="<?= isset($_GET['searchKeyword']) ? htmlspecialchars($_GET['searchKeyword']) : '' ?>"/>
              <button role="button" type="submit">Search Now</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-2">
        <div class="right-image">
          <img src="assets/images/banner-image.jpg" alt="">
          <span class="price">$22</span>
          <span class="offer">-40%</span>
        </div>
      </div>
    </div>
    <?php if (isset($_GET['searchKeyword'])): ?>
      <div class="row mt-4">
        <div class="col-12">
          <?php if (empty($search_results)): ?>
            <div class="alert alert-warning">No products found for "<?= htmlspecialchars($_GET['searchKeyword']) ?>".</div>
          <?php else: ?>
            <h5>Search Results:</h5>
            <div class="row">
              <?php foreach ($search_results as $product): ?>
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <img src="<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                    <div class="card-body">
                      <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                      <p class="card-text">
                        <span class="badge bg-secondary"><?= htmlspecialchars($product['category']) ?></span>
                        <br>
                        <span class="text-muted">
                          <?php if (!empty($product['old_price'])): ?>
                            <em>$<?= htmlspecialchars($product['old_price']) ?></em>
                          <?php endif; ?>
                          $<?= htmlspecialchars($product['price']) ?>
                        </span>
                      </p>
                      <a href="product-details.php?id=<?= $product['id'] ?>" class="btn btn-primary btn-sm">View Product</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>