<?php
session_start();
function getAddress()
{
  echo 'address from Post: ';
  print_r($_POST);

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
  <title>Checkout</title>
</head>

<body>
  <h1>Checkout</h1>
  <a href="cart.php">Return to Cart</a>
  <form method="POST" action="checkout.php">
    <label for="address">Address</label>
    <input type="text" name="address">
    <label for="city">City</label>
    <input type="text" name="city">
    <label for="zipcode">ZIP Code</label>
    <input type="text" name="zipcode">
    <input type="submit" name="submit" value="Complete Purchase">
  </form>
  <?php
  getAddress();
  ?>
</body>

</html>