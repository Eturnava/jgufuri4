<div class="section categories">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="section-heading">
          <h6>Categories</h6>
          <h2>Top Categories</h2>
        </div>
      </div>
      <?php foreach ($categories as $cat): ?>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4><?php echo $cat['title']; ?></h4>
            <div class="thumb">
              <a href="<?php echo $cat['link']; ?>">
                <img src="<?php echo $cat['image']; ?>" alt="">
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>