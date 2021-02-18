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
  <h1 class="title">All My Transactions</h1>
  <p>This is the transactions page</p>

  <main>
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
  </main>
  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>