<?php
if ($_SESSION['loggedin']) {
  //echo "<span>Welcome $cookieFirstname</span>";
  $displayWelcome = '<p>Welcome User Name</p>';
  $baseurl = dirname(__DIR__, 1);
  $baseurl = '';
  //echo 'baserurl: ' . dirname(__DIR__, 1);
  $displayMenu = <<<EOT
    <ul class="menubar">
    <li class="menu-item"><a href='../'>Home</a></li>
    <li class='menu-item'><a href='../accounts/' title='view buddies page'>Admin</a></li>"
    <li class='menu-item'><a href='../buddies/' title='view Buddies page'>Buddies</a></li>"
    <li class='menu-item'><a href='../transactions/' title='view Transactions page'>Transactions</a></li>"
    <li class='menu-item'><a href='../buddies/?action='balance' title='view buddies page'>Balance</a></li>"
    </ul>
    EOT;
}
?>
<div class="logo">
  <img src="images/logo.jpg" alt="BuddyLoan">
</div>

<div class="welcome ">
  <?php
  if (isset($displayWelcome)) {
    echo $displayWelcome;
  }
  ?>
</div>

<div class="menu">
  <?php
  if (isset($displayMenu)) {
    echo $displayMenu;
  }
  ?>
</div>