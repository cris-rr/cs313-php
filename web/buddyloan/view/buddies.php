<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buddyloan transactions</title>
</head>

<body>
  <header>
    <?php
    require($_SERVER['DOCUMENT_ROOT'] . '/common/header.php');
    ?>
  </header>
  <h1>All My Buddies</h1>
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
    require($_SERVER['DOCUMENT_ROOT'] . '/common/footer.php');
    ?>
  </footer>
</body>

</html>