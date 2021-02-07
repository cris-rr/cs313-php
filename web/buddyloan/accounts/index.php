<?php

/*
* This is the accounts controller
*/

//Create or access a Session
session_start();

//Get database connection file
require_once(dirname(__DIR__, 1) . '/library/connection.php');

//Get Buddyloan model
require_once(dirname(__DIR__, 1) . '/model/users-model.php');


$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_POST, 'action');
}


// Process action.
switch ($action) {
  case 'template':
    include 'view/template.php';
    break;
  case 'login':
    include '../view/login.php';
    break;
  case 'registration':
    include '../view/registration.php';
    break;
  default:
    if (isset($_SESSION['loggedin'])) {
      include '../view/admin.php';
    } else {
      include '../view/login.php';
    }
}
