<?php

/*
* This is the buddies controller
*/

//Create or access a Session
session_start();

//Get database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connection.php');

// Get functions
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/functions.php');

//Get Buddyloan model
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/buddies-model.php');



$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_POST, 'action');
}


// Process action.
switch ($action) {
  case 'add':
    include 'view/template.php';
    break;
  default:
    $userId = $_SESSION['userId'];
    $buddies = getBuddies($userId);
    $displayBuddies = buildBuddiesDisplay($buddies);
    include '../view/buddies.php';
}
