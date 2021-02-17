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
  <h1>Add user to your Buddies</h1>
  <p><span>First Name: </span>
    <? echo buddyData['firstname']?>
  </p>
  <p><span>Last Name: </span>
    <? echo buddyData['lastname']?>
  </p>
  <p><span>phone: </span>
    <? echo buddyData['phone']?>
  </p>

  <form class="form-basic" id="confirm-buddy-add" method="POST" action="../buddies/">
    <input type="submit" class="sign-button" name="submit" id="addBuddy-submit" value="Confirm Buddy">
    <input type="hidden" name="action" value="confirmBuddy">
    <input type="hidden" name="buddyPin" value="">
    <input type="hidden" name="action" value="confirmBuddy">
  </form>


  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>