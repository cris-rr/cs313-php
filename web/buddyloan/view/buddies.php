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

<body class="pageBuddies">
  <header>
    <?php
    require(dirname(__DIR__, 1) . '/common/header.php');
    ?>
  </header>
  <h1 class="title">All My Buddies</h1>
  <p>This is the buddies page</p>

  <table>
    <thead>
      <tr>
        <td>First Name</td>
        <td>Last Name</td>
        <td>pin</td>
        <td>Phone</td>
        <td>email</td>
        <td>Balance</td>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($displayBuddies)) {
        echo $displayBuddies;
      }
      ?>

    </tbody>
  </table>

  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>