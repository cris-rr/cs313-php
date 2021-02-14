<?php

/*
* This is the transactions controller
*/

//Create or access a Session
session_start();

//Get database connection file
require_once(dirname(__DIR__, 1) . '/library/connection.php');

// Get functions
require_once(dirname(__DIR__, 1) . '/library/functions.php');

//Get Buddyloan model
require_once(dirname(__DIR__, 1) . '/model/buddies-model.php');

// Get Transactions model
require_once(dirname(__DIR__, 1) . '/model/transactions-model.php');



$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_POST, 'action');
}


// Process action.
switch ($action) {
  case 'add':
    include 'view/transaction-add.php';
    break;
  case 'del':
    include 'view/transaction-delete.php';
    break;
  case 'mod':
    include 'view/transaction-update.php';
    break;
  default:
    $userId = $_SESSION['userId'];
    $transactions = getTransactions($userId);
    $displayTransactions = buildTransactionsDisplay($transactions);
    include '../view/transactions.php';
}
