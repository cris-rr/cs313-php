<?php

/*
* This is the transactions controller
*/

//Create or access a Session
session_start();

// If not loggedin redirect to main controler
if (!isset($_SESSION['loggedin'])) {
  header('location: ../');
  die(); # code...
}

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
    $buddies = getBuddyList($_SESSION['userId']);
    $displayBuddies = buildBuddyList($buddies);
    include '../view/transaction-add.php';
    break;

  case 'newTransaction':
    $buddyId = filter_input(INPUT_POST, 'buddyid', FILTER_SANITIZE_NUMBER_INT);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    // $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $image = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $date = date('Y-m-d');

    if (!isset($image)) {
      $image = 'No image';
    }

    $regOutcome = regTransaction($_SESSION['userId'], $buddyId, $description, $date, $amount, $image);

    if ($regOutcome === 1) {
      $_SESSION['message'] = "<p class='notice'>Your new Transaction was added succesfully</p>";
    }

    header("Location: ../transactions/");
    exit;


  case 'del':
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    // Get transactionData
    $transactionData = getTransactionById($id);

    // Check if there is data.
    if (!$transactionData) {
      $_SESSION['message'] = "<p class='notice'>This transaction do not exist please check your request.</p>";
      header("Location: ../transactions/");
      exit;
    }

    include '../view/transaction-delete.php';
    break;

  case 'delete':
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $buddyId = filter_input(INPUT_POST, 'buddyId', FILTER_SANITIZE_NUMBER_INT);
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING);


    // Send the data to the model
    // $deleteResult = deleteBuddy($_SESSION['userId'], $buddyId);
    $deleteResult = deleteTransaction($id);

    // Check result and display message
    if ($deleteResult) {
      $message = "<p class='notice'>The transaction with $fullname for $amount was succesfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: ../transactions/');

      exit;
    } else {
      $message = "<p class='notice'>Error: The transaction with $fullname for $amount was not deleted.</p>";
      $_SESSION['messageReview'] = $message;
      header('location: ../transactions/');
      exit;
    }
    break;

  case 'mod':
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    // Get transactionData
    $transactionData = getTransactionById($id);

    // Check if there is data.
    if (!$transactionData) {
      $_SESSION['message'] = "<p class='notice'>This transaction do not exist please check your request.</p>";
      header("Location: ../transactions/");
      exit;
    }
    include '../view/transaction-update.php';
    exit;
    break;

  case 'update':
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $buddyId = filter_input(INPUT_POST, 'buddyid', FILTER_SANITIZE_NUMBER_INT);
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING);
    $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);

    if (!isset($image)) {
      $image = 'No image';
    }

    // check for missing data
    if (empty($description) || empty($amount) || empty($date) || empty($buddyId)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/transaction-update.php';
      exit;
    }

    // Send the data to the model
    $updateResult = updateTransaction($id, $description, $date, $amount, $image);

    // Check and display the result
    if ($updateResult) {
      $message = "<p class='notice'>Congratulations, transaction with $fullname for $amount was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: ../transactions/');
      exit;
    } else {
      $message = "<p>Error. The transaction with $fullname for $amount was not updated.<p/>";
      include '../view/transaction-update.php';

      exit;
    }
    break;

  default:
    $userId = $_SESSION['userId'];
    $transactions = getTransactions($userId);
    $displayTransactions = buildTransactionsDisplay($transactions);
    include '../view/transactions.php';
}
