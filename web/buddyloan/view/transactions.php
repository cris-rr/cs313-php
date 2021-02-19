<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../images/site/buddy32.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/main.css">
  <title>Buddyloan transactions</title>
</head>

<body class="pageTransactions">
  <header>
    <?php
    require(dirname(__DIR__, 1) . '/common/header.php');
    ?>
  </header>

  <main>
    <div class="wrapper-title">
      <h1 class="title">All My Transactions</h1>
      <p>Manage your transactions.</p>
      <a class="btn btn-add-big" href="../transactions?action=add">Add a new transaction</a>
    </div>


    <?php
    if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    }
    if (isset($message)) {
      echo $message;
      unset($message);
    }
    ?>

    <table>
      <thead>
        <tr>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Id</td>
          <td>Description</td>
          <td>Date</td>
          <td>Amount</td>
          <td>Image</td>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($displayTransactions)) {
          echo $displayTransactions;
        }
        ?>

      </tbody>
    </table>

    <!-- <section class="transaction-add">
      <h2 class="subtitle">Add a new transaction</h2>
      <p>Enter your Buddy's pin number:</p>
      <form class="form-basic" id="addTransaction" method="POST" action="../transactions/">

        <input class="data" type="text" name="buddyPin" id="buddyPin" required>
        <input type="submit" class="sign-button" name="submit" id="buddy-add-submit" value="Add Buddy">
        <input type="hidden" name="action" value="add">
      </form>
    </section> -->

  </main>
  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>