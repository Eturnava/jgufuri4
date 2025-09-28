<?php
session_start();
include 'components.php';
include 'data.php';

render_head("Your Cart");

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
$show_checkout = isset($_POST['checkout']);
$payment_success = false;

if (isset($_POST['pay_now'])) {
    $payment_success = true;
    $_SESSION['cart'] = [];
}
?>
<div class="container mt-5">
  <h2>Your Cart</h2>
  <?php if ($payment_success): ?>
    <div class="alert alert-success">Payment Successful! Thank you for your order.</div>
    <a href="shop.php" class="btn btn-primary mt-3">Back to Shop</a>
  <?php elseif (empty($cart)): ?>
    <p>Your cart is empty.</p>
  <?php else: ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Image</th>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart as $item): 
          $subtotal = $item['price'] * $item['quantity'];
          $total += $subtotal;
        ?>
        <tr>
          <td><img src="<?= htmlspecialchars($item['image']) ?>" alt="" style="width:60px;"></td>
          <td><?= htmlspecialchars($item['name']) ?></td>
          <td>$<?= htmlspecialchars($item['price']) ?></td>
          <td><?= htmlspecialchars($item['quantity']) ?></td>
          <td>$<?= number_format($subtotal, 2) ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
          <td colspan="4" class="text-end"><strong>Total</strong></td>
          <td><strong>$<?= number_format($total, 2) ?></strong></td>
        </tr>
      </tbody>
    </table>
    <?php if (!$show_checkout): ?>
      <form method="post">
        <button type="submit" name="checkout" class="btn btn-success">Proceed to Checkout</button>
        <a href="shop.php" class="btn btn-secondary">Continue Shopping</a>
      </form>
    <?php else: ?>
      <div class="card p-4 mt-4" style="max-width:500px;">
        <h4>Payment Details</h4>
        <form id="paymentForm" method="post" novalidate>
          <div class="mb-3">
            <label for="card_name" class="form-label">Cardholder Name</label>
            <input type="text" class="form-control" id="card_name" name="card_name" required>
          </div>
          <div class="mb-3">
            <label for="card_number" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="card_number" name="card_number" maxlength="16" required pattern="\d{16}">
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="expiry" class="form-label">Expiry Date</label>
              <input type="text" class="form-control" id="expiry" name="expiry" placeholder="MM/YY" required pattern="\d{2}/\d{2}">
            </div>
            <div class="col-md-6 mb-3">
              <label for="cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cvv" name="cvv" maxlength="3" required pattern="\d{3}">
            </div>
          </div>
          <div class="mb-3">
            <label for="billing" class="form-label">Billing Address</label>
            <input type="text" class="form-control" id="billing" name="billing" required>
          </div>
          <button type="submit" name="pay_now" class="btn btn-primary">Pay Now</button>
        </form>
      </div>
      <script>
      document.getElementById('paymentForm').onsubmit = function(e) {
        var valid = true;
        var fields = ['card_name','card_number','expiry','cvv','billing'];
        fields.forEach(function(id){
          var el = document.getElementById(id);
          if(!el.value.trim()) valid = false;
        });
        var cardNum = document.getElementById('card_number').value;
        if(!/^\d{16}$/.test(cardNum)) valid = false;
        var cvv = document.getElementById('cvv').value;
        if(!/^\d{3}$/.test(cvv)) valid = false;
        var expiry = document.getElementById('expiry').value;
        if(!/^\d{2}\/\d{2}$/.test(expiry)) valid = false;
        if(!valid) {
          alert('Please fill all fields correctly.');
          e.preventDefault();
        }
      };
      </script>
    <?php endif; ?>
  <?php endif; ?>
</div>
<?php render_footer(); ?>
