<?php
if ($_SESSION['loggedin']) {
  //echo "<span>Welcome $cookieFirstname</span>";
  $displayWelcome = '<p>Welcome User Name</p>';
  $displayMenu = "
    <ul class='menubar'>
    <li class='menu-item'><a class='pageHome' href='../'>Home</a></li>
    <li class='menu-item'><a class='pageAdmin' href='../accounts/?action=admin' title='view buddies page'>Admin</a></li>
    <li class='menu-item'><a class='pageBuddies' href='../buddies/' title='view Buddies page'>Buddies</a></li>
    <li class='menu-item'><a class='pageTransactions' href='../transactions/' title='view Transactions page'>Transactions</a></li>
    </ul>";
}
?>
<div class="header-top">
  <div class="logo">
    <img src="../images/site/buddy256.png" alt="BuddyLoan">
  </div>

  <div class="welcome ">
    <?php
    if (isset($displayWelcome)) {
      echo $displayWelcome;
    }
    ?>
  </div>
</div>

<nav>
  <?php
  if (isset($displayMenu)) {
    echo $displayMenu;
  }
  ?>
</nav>