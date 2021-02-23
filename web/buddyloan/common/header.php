<?php
$folder = $_SERVER['DOCUMENT_ROOT'];
if ($folder == '/app/web') {
  $rootPath = "$folder/buddyloan";
} else {
  $rootPath = '..';
}

if ($_SESSION['loggedin']) {
  //echo "<span>Welcome $cookieFirstname</span>";
  $displayWelcome = "<p>Welcome $_SESSION[fullName]</p>
                      <a class='signout' href='$rootPath/accounts?action=logout'>Sign Out</a>
                    ";
  $displayMenu = "
    <ul class='menubar'>
    <li class='menu-item'><a class='pageHome' href='$rootPath/'>Home</a></li>
    <li class='menu-item'><a class='pageAdmin' href='$rootPath/accounts/?action=admin' title='view buddies page'>Admin</a></li>
    <li class='menu-item'><a class='pageBuddies' href='$rootPath/buddies/' title='view Buddies page'>Buddies</a></li>
    <li class='menu-item'><a class='pageTransactions' href='$rootPath/transactions/' title='view Transactions page'>Transactions</a></li>
    </ul>";
} else {
  $displayWelcome = '';
}
?>
<div class="header-top">
  <div class="logo">
    <img <? echo "src=$rootPath/images/site/buddy256.png" ?> alt="BuddyLoan">
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
  if (isset($displayMenu)) {
    echo $displayMenu;
  }
  ?>
</nav>