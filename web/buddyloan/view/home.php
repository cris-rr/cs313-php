<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../images/site/buddy32.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/main.css">
  <title>BuddyLoan</title>
</head>

<body class="pageHome">
  <header>
    <?php
    require(dirname(__DIR__, 1) . '/common/header.php');
    ?>
  </header>
  <main>
    <h1 class="title">My Dashboard.</h1>
    <p>A balance of debts and Credits</p>

    <section class="summary">
      <h2 class="subtitle">My Balance</h2>
      <p><span class='partial'>Total Debt: </span>
        <? echo number_format($totalDebt,2) ?>
      </p>
      <p><span class='partial'>Total Credit: </span>
        <? echo number_format($totalCredit,2) ?>
      </p>
      <p><span class='partial'>Total Balance: </span>
        <? echo number_format($totalBalance,2) ?>
      </p>
    </section>

    <section class="summary">
      <h2 class="subtitle">Buddies review: </h2>
      <p><span class="subtitle2">Buddy who owes you more: </span>
        <? echo $dipslayBiggestDebt ?>
      </p>
      <p><span class="subtitle2">Buddy to whom do I owe more: </span>
        <? echo $dipslayBiggestCredit ?>
      </p>

    </section>

  </main>
  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>