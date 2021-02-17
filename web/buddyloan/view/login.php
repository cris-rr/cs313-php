<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../images/site/buddy32.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/main.css">
  <title>Buddyloan Registration</title>
</head>

<body>
  <header>
    <?php
    require(dirname(__DIR__, 1) . '/common/header.php');
    ?>
  </header>

  <main>
    <h1 class="title">Log In</h1>
    <p>Please login to use BuddyLoan</p>

    <?php
    // To display messages
    if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    }
    ?>

    <form class="form-basic" id="login" method="Post" action="../accounts/">
      <label for="email">Email</label>
      <input class="data" type="email" name="email" id="email" <?php if (isset($email)) {
                                                                  echo "value='$email'";
                                                                } ?> required>
      <label for="password">Password</label>
      <span class="password-requirements">Passwords must be at least 8 characters and
        contain at least 1 number, 1 capital letter and 1 special character</span>
      <input class="data" type="password" name="password" id="password" required">
      <input type="submit" class="sign-button" name="submit" id="signIn" value="Sign-in">
      <input type="hidden" name="action" value="Login">

      <a class="regbtn" href='../accounts/index.php?action=registration' title='Acces to registration page'>Not a member yet?</a>

    </form>
  </main>


  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>