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
    <h1>Delete user from your Buddies</h1>
    <p><span>First Name: </span>
      <? echo $buddyData['firstname']?>
    </p>
    <p><span>Last Name: </span>
      <? echo $buddyData['lastname']?>
    </p>
    <p><span>phone: </span>
      <? echo $buddyData['phone']?>
    </p>

    <form class="form-basic" id="confirm-buddy-delete" method="POST" action="../buddies/">
      <input type="submit" class="btn btn-del-big" name="submit" id="delBuddy-submit" value="Delete Buddy">
      <input type="hidden" name="action" value="delete">
      <input type="hidden" name="id" <?php if (isset($id)) {
                                        echo "value='$id'";
                                      } ?>>
      <input type="hidden" name="buddyId" <?php if (isset($buddyData['userid'])) {
                                            echo "value='$buddyData[userid]'";
                                          } ?>>
      <input type="hidden" name="firstname" <?php if (isset($buddyData['firstname'])) {
                                              echo "value='$buddyData[firstname]'";
                                            } ?>>
      <input type="hidden" name="lastname" <?php if (isset($buddyData['lastname'])) {
                                              echo "value='$buddyData[lastname]'";
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