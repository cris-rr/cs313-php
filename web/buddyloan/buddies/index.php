<?php

/*
* This is the buddies controller
*/

//Create or access a Session
session_start();

//Get database connection file
require_once(dirname(__DIR__, 1) . '/library/connection.php');

// Get functions
require_once(dirname(__DIR__, 1) . '/library/functions.php');

//Get users model
require_once(dirname(__DIR__, 1) . '/model/users-model.php');

//Get buddies model
require_once(dirname(__DIR__, 1) . '/model/buddies-model.php');

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_POST, 'action');
}


// Process action.
switch ($action) {
  case 'add':
    // Filter and store data
    $buddyPin = filter_input(INPUT_POST, 'buddyPin', FILTER_SANITIZE_STRING);

    // check if pin correspond to a registered user
    $buddyData = getUserByPin($buddyPin);
    if (!$buddyData) {
      $message = '<p>This Pin number is not associated with any user, check Pin number an try again.</p>';
      include '../view/buddies.php';
      exit;
    }

    // show buddy details and confirm
    include '../view/buddy-add.php';
    break;

  case 'confirmBuddy':
    // Filter buddyId
    $buddyId = filter_input(INPUT_POST, 'buddyId', FILTER_SANITIZE_NUMBER_INT);
    // Insert buddy to database
    $date = date('Y-m-d');
    $regOutcome = regBuddy($_SESSION['userId'], $buddyId, $date);

    if ($regOutcome === 1) {
      $_SESSION['message'] = "<p>Your new Buddy was added succesfully</p>";
    }
    header("Location: ../buddies/");


    // go to default

  case 'del':
    include 'view/buddy-delete.php';
    break;
  default:
    $userId = $_SESSION['userId'];
    $buddies = getBuddies($userId);
    $displayBuddies = buildBuddiesDisplay($buddies);
    include '../view/buddies.php';
}
