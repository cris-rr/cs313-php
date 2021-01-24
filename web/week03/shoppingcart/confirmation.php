<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation</title>
</head>

<body>
  <h1>Confirmation purchase</h1>
  <section class="items">
    <h2>Items</h2>
    <?php
    $displayItems = "";
    foreach ($_SESSION['cart'] as $item) {
      $displayItems .= "<img class='item-img' src='$item[imgurl]' alt=''>";
      $displayItems .= "<p class='item-desc'>$item[description]</p>";
      $displayItems .= "<p class='item-price'>$<span class='price'>$item[price]</span></p>";
    }
    echo $displayItems;
    ?>
  </section>
  <section class="address">
    <h2>Your Address</h2>
    <div class="address">
      <p> <span>Adress: </span>
        <? echo $_SESSION['address'] ?>
      </p>
      <p><span>City: </span>
        <?echo $_SESSION['city'] ?>
      </p>
      <p><span>ZIP Code: </span>
        <?echo $_SESSION['zipcode'] ?>
      </p>

    </div>
  </section>
  <a href="index.php">Go to shopping again</a>
  <?php
  session_destroy();
  ?>
</body>

</html>