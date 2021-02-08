<?php

/*
* This is the main controller
*/

//Create or access a Session
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['userId'] = 1;

//Get database connection file
require_once(__DIR__ . '/library/connection.php');

//Get Buddyloan model
require_once(__DIR__ . '/model/users-model.php');

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_POST, 'action');
}

// Process action.
switch ($action) {
  case 'template':
    include 'view/template.php';
    break;
  default:
    if (isset($_SESSION['loggedin'])) {
      include 'view/home.php';
    } else {
      header('location: accounts/');
    }
}
