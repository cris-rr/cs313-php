<?php
if ($_SESSION['loggedin']) {
  //echo "<span>Welcome $cookieFirstname</span>";
  $displayWelcome = '<p>Welcome User Name</p>';
  $baseurl = $_SERVER['DOCUMENT_ROOT'];
  $baseurl = '';

  $displayMenu = <<<EOT
    <ul class="menubar">
    <li class="menu-item"><a href='{$baseurl}/'>Home</a></li>
    <li class='menu-item'><a href='{$baseurl}/accounts/' title='view buddies page'>Admin</a></li>"
    <li class='menu-item'><a href='{$baseurl}/buddies/' title='view Buddies page'>Buddies</a></li>"
    <li class='menu-item'><a href='{$baseurl}/transactions/' title='view Transactions page'>Transactions</a></li>"
    <li class='menu-item'><a href='{$baseurl}/buddies/?action='balance' title='view buddies page'>Balance</a></li>"
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