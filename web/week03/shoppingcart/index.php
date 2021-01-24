<?php
//session_start();
//session_destroy();
session_start();

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}
if (!isset($_SESSION['items'])) {
  $items = array(
    1 => array(
      "description" => "Camaro, modern an fast card in black",
      "price" => 20000,
      "imgurl" => "./images/camaro.jpg"
    ),
    2 => array(
      "description" => "Hummer, every fits in the hummer, to travel every where",
      "price" => 35000,
      "imgurl" => "./images/hummer.jpg"
    )
  );
  $_SESSION['items'] = $items;
}

function addToCart()
{
  if (isset($_POST['submit'])) {
    $item = array(
      "description" => $_POST['description'],
      "price" => $_POST['price'],
      "imgurl" => $_POST['imgurl']
    );
    array_push($_SESSION['cart'], $item);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Items to shop</title>
</head>

<body>
  <main>
    <h1>Browse Items</h1>
    <a href="cart.php">Go to Cart</a>
    <section items>
      <h2>Items</h2>
      <div class="item">
        <?php
        $displayItems = "";
        foreach ($_SESSION['items'] as $item) {
          $displayItems .= "<img class='item-img' src='$item[imgurl]' alt=''>";
          $displayItems .= "<p class='item-desc'>$item[description]</p>";
          $displayItems .= "<p class='item-price'>$<span class='price'>$item[price]</span></p>";
          $displayItems .= "<form method='POST' action='index.php'>";
          $displayItems .= "<input type='hidden' value='$item[imgurl]' name='imgurl'>";
          $displayItems .= "<input type='hidden' value='$item[description]' name='description'>";
          $displayItems .= "<input type='hidden' value= '$item[price]' name='price'>";
          $displayItems .= "<input type='submit' name='submit' value='Add to Cart'>";
          $displayItems .= "</form>";
        }
        echo $displayItems;
        addToCart();
        ?>

      </div>
    </section>
  </main>

</body>

</html>