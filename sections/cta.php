<!-- CTA Section -->
<div class="section cta">
  <div class="container">
    <div class="row">
      <!-- Shop -->
      <div class="col-lg-5">
        <div class="shop">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h6><?php echo $cta['shop']['title']; ?></h6>
                <h2><?php echo $cta['shop']['subtitle']; ?></h2>
              </div>
              <p><?php echo $cta['shop']['text']; ?></p>
              <div class="main-button">
                <a href="<?php echo $cta['shop']['buttonLink']; ?>">
                  <?php echo $cta['shop']['buttonText']; ?>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Subscribe -->
      <div class="col-lg-5 offset-lg-2 align-self-end">
        <div class="subscribe">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h6><?php echo $cta['subscribe']['title']; ?></h6>
                <h2><?php echo $cta['subscribe']['subtitle']; ?></h2>
              </div>
              <div class="search-input">
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subscribe_email'])): ?>
                  <div id="popup-alert" class="alert alert-success" style="position:fixed;top:20px;left:50%;transform:translateX(-50%);z-index:9999;min-width:300px;text-align:center;">
                    Your order has been placed. Please check your email inbox to receive the reward.
                  </div>
                  <script>
                    setTimeout(function() {
                      var alert = document.getElementById('popup-alert');
                      if(alert) {
                        alert.style.transition = "opacity 0.5s";
                        alert.style.opacity = 0;
                        setTimeout(function(){ alert.remove(); }, 500);
                      }
                    }, 3000);
                  </script>
                <?php endif; ?>
                <form id="subscribe" action="" method="post">
                  <input type="email" class="form-control" name="subscribe_email" placeholder="Your email..." required>
                  <button type="submit"><?php echo $cta['subscribe']['buttonText']; ?></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>