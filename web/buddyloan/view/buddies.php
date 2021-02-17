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
  <main>
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

    <section class="buddy-add">
      <h2 class="subtitle">Add a new body</h2>
      <p>Enter your Buddy's pin number:</p>
      <form class="form-basic form-horizontal" id="addBuddy" method="POST" action="../buddies/">

        <!-- <label for="buddyPin">Enter the your Buddy's Pin number:</label> -->
        <input class="data" type="text" name="buddyPin" id="buddyPin">
        <input type="submit" class="sign-button" name="submit" id="buddy-add-submit" value="Add Buddy">
        <input type="hidden" name="action" value="add">
      </form>
    </section>

  </main>
  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>