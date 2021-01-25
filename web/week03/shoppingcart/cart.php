<?php
session_start();

if (isset($_SESSION['cart'])) {
  $totalItems = count($_SESSION['cart']);
} else {
  $totalItems = 0;
}

function removeFromCart()
{
  if (isset($_POST['submit'])) {
    unset($_SESSION['cart'][$_POST['cart_index']]);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/main.css">
  <title>Cart Content</title>
</head>

<body>
  <h1>View Cart</h1>
  <a class="menu-item" href="index.php">Return to shopping</a>

  <h2>Total Items In Cart:
    <?$totalItems?>
  </h2>
  <?php
  $displayItems = "";
  $cart_index = 0;
  foreach ($_SESSION['cart'] as $item) {
    $displayItems .= "<img class='item-img' src='$item[imgurl]' alt=''>";
    $displayItems .= "<p class='item-desc'>$item[description]</p>";
    $displayItems .= "<p class='item-price'>$<span class='price'>$item[price]</span></p>";
    $displayItems .= "<form method='POST' action='cart.php'>";
    $displayItems .= "<input type='hidden' value='$item[imgurl]' name='imgurl'>";
    $displayItems .= "<input type='hidden' value='$item[description]' name='description'>";
    $displayItems .= "<input type='hidden' value= '$item[price]' name='price'>";
    $displayItems .= "<input type='hidden' value= '$cart_index' name='cart_index'>";
    $displayItems .= "<input type='submit' name='submit' value='Remove from Cart'>";
    $displayItems .= "</form>";
    $cart_index++;
  }
  echo $displayItems;
  removeFromCart();
  ?>
  <a href="checkout.php">Proceed to Checkout</a>

</body>

</html>