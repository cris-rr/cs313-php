<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/main.css">
  <title>Confirmation</title>
</head>

<body id="confirma-page">
  <main>
    <h1>Confirmation purchase</h1>
    <section class="items">
      <h2>Thank you for purchase with us, these are your Items</h2>
      <div class='items'>
        <?php
        $displayItems = "";
        foreach ($_SESSION['cart'] as $item) {
          $displayItems .= "<div class='item'><img class='item-img' src='$item[imgurl]' alt=''>";
          $displayItems .= "<p class='item-desc'>$item[description]</p>";
          $displayItems .= "<p class='item-price'>$<span class='price'>$item[price]</span></p>";
          $displayItems .= "</div>";
        }
        echo $displayItems;
        ?>
      </div>
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
    <a class="menu-item" href="logout.php">Go to shopping again</a>
  </main>
</body>

</html>