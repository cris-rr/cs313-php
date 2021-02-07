<?php

/*
* This is the accounts controller
*/

//Create or access a Session
session_start();

//Get database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connection.php');
//Get Buddyloan model
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/users-model.php');


$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_POST, 'action');
}


// Process action.
switch ($action) {
  case 'template':
    include 'view/template.php';
    break;
  case 'admin':
    if (isset($_SESSION['userData'])) {
      include '../view/admin.php';
    }
    break;
  case 'login':
    include '../view/login.php';
    break;
  case 'registration':
    include '../view/registration.php';
    break;
  default:
    include '../view/login.php';
}
