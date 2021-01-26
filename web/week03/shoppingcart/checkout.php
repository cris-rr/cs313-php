<?php
session_start();
function getAddress()
{
  if (isset($_POST['submit'])) {
    $_SESSION['address'] = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $_SESSION['city'] = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $_SESSION['zipcode'] = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
    header('Location: confirmation.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/main.css">
  <title>Checkout</title>
</head>

<body>
  <main>
    <h1>Checkout</h1>
    <h2>Please add your address</h2>
    <a class="menu-item" href="cart.php">Return to Cart</a>
    <form class="form-basic" method="POST" action="checkout.php">
      <label for="address">Address</label>
      <input class="data" type="text" name="address" required>
      <label for="city">City</label>
      <input class="data" type="text" name="city" required>
      <label for="zipcode">ZIP Code</label>
      <input class="data" type="text" name="zipcode" required>
      <input class="btn" type="submit" name="submit" value="Complete Purchase">
    </form>
    <?php
    getAddress();
    ?>
  </main>
</body>

</html>