<?php
$folder = $_SERVER['DOCUMENT_ROOT'];
if ($_SESSION['loggedin']) {
  //echo "<span>Welcome $cookieFirstname</span>";
  $displayWelcome = "<p>Welcome $_SESSION[fullName]</p>
                      <a class='signout' href='../accounts?action=logout'>Sign Out</a>
                    ";
  $displayMenu = "
    <ul class='menubar'>
    <li class='menu-item'><a class='pageHome' href='../'>Home</a></li>
    <li class='menu-item'><a class='pageAdmin' href='../accounts/?action=admin' title='view buddies page'>Admin</a></li>
    <li class='menu-item'><a class='pageBuddies' href='../buddies/' title='view Buddies page'>Buddies</a></li>
    <li class='menu-item'><a class='pageTransactions' href='../transactions/' title='view Transactions page'>Transactions</a></li>
    </ul>";
} else {
  $displayWelcome = '';
}
?>
<div class="header-top">
  <div class="logo">
    <img src="../images/site/buddy256.png" alt="BuddyLoan">
  </div>
  <div class="app-title">
    <h1><span class="title-first">B</span>uddy <span class="title-first">L</span>oan</h1>
    <p class="motto">Keep balance with your friends</p>
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
  echo $folder;
  if (isset($displayMenu)) {

    echo $displayMenu;
  }
  ?>
</nav>