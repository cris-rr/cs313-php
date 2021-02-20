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

<body class="pageTemplate">
  <header>
    <?php
    require(dirname(__DIR__, 1) . '/common/header.php');
    ?>
  </header>
  <main>
    <h1>Buddy Loan</h1>
    <p>Add a new transaction</p>

    <form class="form-basic" id="transaction-add" method="POST" action="../transactions/">
      <label for="buddy">Select a buddy:</label>
      <?php
      if (isset($displayBuddies)) {
        echo $displayBuddies;
      }
      ?>
      <label for="description">Description: </label>
      <input class="data" type="text" name="description" id="description" <?php if (isset($description)) {
                                                                            echo "value='$description'";
                                                                          } ?> required>

      <label for="amount">Amount: </label>
      <input class="data" type="text" name="amount" id="amount" <?php if (isset($amount)) {
                                                                  echo "value='$amount'";
                                                                } ?> required>

      <label for="image">Image</label>
      <input class="data" type="text" name="image" id="transactionImage" <?php if (isset($image)) {
                                                                            echo "value='$image'";
                                                                          } ?>>

      <input type="hidden" name="action" value="newTransaction">
      <input type="submit" class="sign-button" name="submit" id="addTransaction-submit" value="Add Transaction">

    </form>

  </main>

  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>