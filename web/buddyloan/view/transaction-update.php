<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../images/site/buddy32.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/main.css">
  <title>Buddyloan</title>
</head>

<body>
  <header>
    <?php
    require(dirname(__DIR__, 1) . '/common/header.php');
    ?>
  </header>
  <main>
    <h1>Update transaction details</h1>
    <p><span>Buddy: </span>
      <? echo $transactionData['fullname']?>
    </p>

    <form class="form-basic" id="transactiond-update" method="POST" action="../transactions/">
      <label for="description">Description:</label>
      <input class="data" type="text" name="description" id="description" <?php if (isset($transactionData['description'])) {
                                                                            echo "value='$transactionData[description]'";
                                                                          } ?> required>
      <label for="date">date:</label>
      <input class="data" type="text" name="date" id="date" <?php if (isset($transactionData['date'])) {
                                                              echo "value='$transactionData[date]'";
                                                            } ?> required>
      <label for="amount">amount:</label>
      <input class="data" type="text" name="amount" id="amount" <?php if (isset($transactionData['amount'])) {
                                                                  echo "value='$transactionData[amount]'";
                                                                } ?> required>
      <label for="image">image:</label>
      <input class="data" type="text" name="image" id="image" <?php if (isset($transactionData['image_path'])) {
                                                                echo "value='$transactionData[image_path]'";
                                                              } ?> required>
      <input type="hidden" name="id" <?php if (isset($transactionData['transactionid'])) {
                                        echo "value='$transactionData[transactionid]'";
                                      } ?>>
      <input type="hidden" name="buddyid" <?php if (isset($transactionData['buddyid'])) {
                                            echo "value='$transactionData[buddyid]'";
                                          } ?>>
      <input type="hidden" name="fullname" <?php if (isset($transactionData['fullname'])) {
                                              echo "value='$transactionData[fullname]'";
                                            } ?>>

      <input type="hidden" name="action" value="update">
      <input type="submit" class="sign-button" name="submit" id="updateTransaction" value="Update Transaction">


  </main>

  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>