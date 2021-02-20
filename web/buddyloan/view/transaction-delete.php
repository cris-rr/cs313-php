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
    <h1>Delete a transaction</h1>
    <p><span>Buddy: </span>
      <? echo $transactionData['fullname']?>
    </p>
    <p><span>Description: </span>
      <? echo $transactionData['description']?>
    </p>
    <p><span>Date: </span>
      <? echo $transactionData['date']?>
    </p>
    <p><span>Amount: </span>
      <? echo $transactionData['amount']?>
    </p>

    <form class="form-basic" id="confirm-transaction-delete" method="POST" action="../transactions/">
      <input type="submit" class="btn btn-del-big" name="submit" id="delTransaction-submit" value="Delete Transaction">
      <input type="hidden" name="action" value="delete">
      <input type="hidden" name="id" <?php if (isset($id)) {
                                        echo "value='$id'";
                                      } ?>>
      <input type="hidden" name="buddyid" <?php if (isset($transactionData['buddyid'])) {
                                            echo "value='$transactionData[buddyid]'";
                                          } ?>>
      <input type="hidden" name="fullname" <?php if (isset($transactionData['fullname'])) {
                                              echo "value='$transactionData[fullname]'";
                                            } ?>>
      <input type="hidden" name="description" <?php if (isset($transactionData['description'])) {
                                                echo "value='$transactionData[description]'";
                                              } ?>>
      <input type="hidden" name="date" <?php if (isset($transactionData['date'])) {
                                          echo "value='$transactionData[date]'";
                                        } ?>>
      <input type="hidden" name="amount" <?php if (isset($transactionData['amount'])) {
                                            echo "value='$transactionData[amount]'";
                                          } ?>>
    </form>

  </main>

  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>