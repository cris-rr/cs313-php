<?php

/*
* This is the main controller
*/

//Create or access a Session
session_start();
// unset($_SESSION['loggedin']);
// $_SESSION['loggedin'] = true;
// $_SESSION['userId'] = 0;

//Get database connection file
require_once(__DIR__ . '/library/connection.php');

//Get Buddyloan model
require_once(__DIR__ . '/model/users-model.php');

//Get main model
require_once(__DIR__ . '/model/main-model.php');

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_POST, 'action');
}

if (isset($_SESSION['loggedin'])) {
  $userId = $_SESSION['userId'];
  $totalDebt = getDebt($userId);
  $totalCredit = getCredit($userId);
  $totalBalance = floatval($totalCredit) - floatval($totalDebt);
  // $totalBalance = $totalCredit - $totalDebt;







  include 'view/home.php';
} else {
  header('location: accounts/');
}
// Process action.
// switch ($action) {
//   case 'template':
//     include 'view/template.php';
//     break;
//   default:
//     header('location: accounts/');
// }
