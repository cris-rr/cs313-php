<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../images/site/buddy32.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/main.css">
  <title>Buddyloan admin</title>
</head>

<body class="pageAdmin">
  <header>
    <?php
    require(dirname(__DIR__, 1) . '/common/header.php');
    ?>
  </header>
  <h1 class="title">Configure your personal information</h1>
  <p>Here you can view and edit your data and credentials</p>

  <main class="user-data">
    <h2>Change your data</h2>
    <form class="form-basic" id="admin" method="POST" action="">
      <label for="firstname">First Name:</label>
      <input class="data" type="text" name="firstname" id="firstname" <?php if (isset($user['firstname'])) {
                                                                        echo "value='$user[firstname]'";
                                                                      } ?> required>
      <label for="lastname">Last Name:</label>
      <input class="data" type="text" name="lastname" id="lastname" <?php if (isset($user['firstname'])) {
                                                                      echo "value='$user[firstname]'";
                                                                    } ?> required>
      <label for="phone">Phone Number:</label>
      <input class="data" type="text" name="phone" id="phone" <?php if (isset($user['phone'])) {
                                                                echo "value='$user[phone]'";
                                                              } ?> required>
      <label for="email">Email:</label>
      <input class="data" type="email" name="email" id="email" <?php if (isset($user['email'])) {
                                                                  echo "value='$user[email]'";
                                                                } ?> required>
      <label for="pin">Pin Number:</label>
      <input class="data" type="text" name="pin" id="pin" <?php if (isset($user['pin'])) {
                                                            echo "value='$user[pin]'";
                                                          } ?> required>
      <label for="password">Password:</label>
      <span class="password-requirements">Passwords must be at least 8 characters and
        contain at least 1 number, 1 capital letter and 1 special character</span>
      <input class="data" type="password" name="password" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
      <input type="submit" class="sign-button" name="submit" id="updateInfo" value="Update Profile">
      <input type="hidden" name="action" value="register">

    </form>
  </main>


  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>