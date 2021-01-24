<?php
  session_start();
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  if (!isset($_SESSION['items'])) {
    $items = array(
      1 => array(
        "description" => "Camaro, modern an fast card in black",
        "price" => 20000,
        "imgurl" => "../images/camaro.jpg"
      ),
      2 => array(
        "description" => "Hummer, every fits in the hummer, to travel every where",
        "price" => 35000,
        "imgurl" => "../images/hummer.jpg"
      )
    );
    $_SESSION['items'] = $items;
  }

  function addToCart(){
    $item = array(
      "description" => $_POST[''],
      "price" => $_POST[''],
      "imgurl" => $_POST['']
    );
    array_push($_SESSION['cart'],$item)
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
  <h1>Browse Items</h1>
</body>
<main>
  <section items>
    <h2>Items</h2>
    <div class="item">

      <?php
      foreach ($$_SESSION['items'] as $item) {
        $displayItems = "<img class='item-img' src='$item[imgurl]' alt=''>";
        $displayItems .= "<p class='item-desc'>$items[description]</p>";
        $displayItems .= "<p class='item-price'>$<span class='price'>$items[price]</span></p>";
        $displayItems.= "<form method='POST' action='addToCart'>";
        $displayItems .= "<input type='hidden' value='$item[imgurl]' name='imgUrl'>";
        $displayItems .= "<input type='hidden' value='$items[description]' name='description'>";
        $displayItems .= "<input type='hidden' value= '$items[price]' name='price'>";
        $displayItems .= "<input type='submit' name='submit'>";
        $displayItems .= "</form>";
      }

      ?>

      <?php
      ?>
    </div>
  </section>
</main>

</html>