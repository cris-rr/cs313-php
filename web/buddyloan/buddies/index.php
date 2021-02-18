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
      $_SESSION['message'] = '<p>This Pin number is not associated with any user, check the Pin number an try again.</p>';
      header("Location: ../buddies/");
      exit;
    }

    // check if this buddy is already included
    $existBuddy = existingBuddy($_SESSION['userId'], $buddyData['userid']);
    if ($existBuddy) {
      $_SESSION['message'] = '<p>This User is already added, check the Pin number an try again.</p>';
      header("Location: ../buddies/");
      exit;
    }

    // show buddy details and confirm
    include '../view/buddy-add.php';
    break;

  case 'confirm':
    // Filter buddyId
    $buddyId = filter_input(INPUT_POST, 'buddyId', FILTER_SANITIZE_NUMBER_INT);
    // Insert buddy to database
    $date = date('Y-m-d');
    $regOutcome = regBuddy($_SESSION['userId'], $buddyId, $date);

    if ($regOutcome === 1) {
      $_SESSION['message'] = "<p>Your new Buddy was added succesfully</p>";
    }

    header("Location: ../buddies/");
    exit;

    // request delete
  case 'del':
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $buddyId = filter_input(INPUT_GET, 'buddy', FILTER_VALIDATE_INT);


    // TODO check if there is a pending balance, pass a warning message to delete page

    // Get buddyData
    $buddyData = getUserById($buddyId);

    // Check if there is data.
    if (!$buddyData) {
      $_SESSION['message'] = '<p>This buddy do not exist please check your request.</p>';
      header("Location: ../buddies/");
      exit;
    }
    include '../view/buddy-delete.php';
    break;

    // proceed delete
  case 'delete':
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $buddyId = filter_input(INPUT_POST, 'buddyId', FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);

    // Send the data to the model
    // $deleteResult = deleteBuddy($_SESSION['userId'], $buddyId);
    $deleteResult = deleteBuddy($id);

    // Check result and display message
    if ($deleteResult) {
      $message = "<p class='notice'>The User: $firstname $lastname was succesfully deleted from your buddies.</p>";
      $_SESSION['messageReview'] = $message;
      header('location: ../buddies/');
      exit;
    } else {
      $message = "<p class='notice'>Error: The User: $firstname $lastname  was not deleted.</p>";
      $_SESSION['messageReview'] = $message;
      header('location: ../buddies/');
      exit;
    }
    break;

    // go to default
  default:
    $userId = $_SESSION['userId'];
    $buddies = getBuddies($userId);
    $displayBuddies = buildBuddiesDisplay($buddies);
    include '../view/buddies.php';
}
