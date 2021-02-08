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

  <main class="data">
    <section class="info">
      <h2>Personal details</h2>
      <p><span class="info-title">First Name: </span>Pedro</p>
      <p><span class="info-title">Last Name: </span>Perez</p>
      <p><span class="info-title">Phome: </span>9989999555</p>
      <p><span class="info-title">Email: </span>pperez@gmail.com</p>
      <p><span class="info-title">Pin: </span>8734</p>
    </section>

    <section class="info-edit">
      <h2>Change your data</h2>
      <form action=""></form>
    </section>
  </main>


  <footer>
    <?php
    require(dirname(__DIR__, 1) . '/common/footer.php');
    ?>
  </footer>
</body>

</html>