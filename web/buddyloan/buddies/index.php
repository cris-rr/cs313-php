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
    // Filter adn store data
    $buddyPin = filter_input(INPUT_POST, 'buddyPin', FILTER_SANITIZE_STRING);

    // check if pin correspond to a registered user
    $buddyData = getUserByPin($buddyPin);

    if (!$buddyData) {
      $message = '<p>This Pin number is not associated with any user, check Pin number an try again.</p>';
      include '../view/buddies.php';
      exit;
    }

    // show buddy details and confirm
    include 'view/buddy-add.php';
    break;

  case 'del':
    include 'view/buddy-delete.php';
    break;
  default:
    $userId = $_SESSION['userId'];
    $buddies = getBuddies($userId);
    $displayBuddies = buildBuddiesDisplay($buddies);
    include '../view/buddies.php';
}
