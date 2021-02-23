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

//Get functions file
require_once(__DIR__ . '/library/functions.php');

//Get Buddyloan model
require_once(__DIR__ . '/model/users-model.php');

//Get main model
require_once(__DIR__ . '/model/main-model.php');

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_POST, 'action');
}

if (isset($_SESSION['loggedin'])) {
  // review general balance
  $userId = $_SESSION['userId'];
  $totalDebt = getDebt($userId);
  $totalCredit = getCredit($userId);
  $totalBalance = floatval($totalCredit) - floatval($totalDebt);

  // review top debt and credit
  $buddyDebt = getBiggestDebt($userId);
  if (!isset($buddyDebt) || $buddyDebt['balance'] >= 0) {
    $dipslayBiggestDebt = "<p>You are free of debts!</p>";
  } else {
    $dipslayBiggestDebt = buildReviewBuddy($buddyDebt);
  }

  $buddyCredit = getBiggestCredit($userId);
  if (!isset($buddyCredit) || $buddyCredit['balance'] <= 0) {
    $dipslayBiggestCredit = "<p>Nobody owes you!</p>";
  } else {
    $dipslayBiggestCredit = buildReviewBuddy($buddyCredit);
  }






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
