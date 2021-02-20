<?php

/*
* This is the accounts controller
*/

//Create or access a Session
session_start();

// If not loggedin redirect to main controler

//Get database connection file
require_once(dirname(__DIR__, 1) . '/library/connection.php');

//Get functions
require_once(dirname(__DIR__, 1) . '/library/functions.php');

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

  case 'admin':
    $userId = $_SESSION['userId'];
    $user = getUserById($userId);
    // $displayUserData = buildUserDataDisplay($user);
    include '../view/admin.php';
    break;

  case 'update':
    // Filter and store the data
    $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_STRING);

    // Check email
    $email = checkEmail($email);

    //Check for existing email
    $existingEmail = checkExistingEmail($email);

    //If email exists show message and redirect to login.php
    if ($existingEmail) {
      $message = '<p>This email address already exists. Do you want to login instead?</p>';
      include '../view/login.php';
      exit;
    }

    //Check for existing ping
    $existingPin = checkExistingPin($pin);

    //If pin exists show message and redirect to login.php
    if ($existingPin) {
      $message = '<p>This pin already exists. Enter a different pin</p>';
      include '../view/admin.php';
      exit;
    }

    // Check for missing data
    if (
      empty($firstname) || empty($lastname) || empty($email)
      || empty($phone) || empty($pin)
    ) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/admin.php';
      exit;
    }

    // Send the data to the model
    $updateResult = updateUser($userId, $firstname, $lastname, $pin, $phone, $email);

    // Check and display the result
    if ($updateResult) {
      // get the updated user from database
      $userData = getUserById($userId);
      // Store the array into the session
      $_SESSION['userData'] = $userData;
      // Store fullname variable
      $_SESSION['fullName'] = $userData['firstname'] . ' ' . $userData['lastname'];

      // Succes message and redirect to admin page.
      $_SESSION['message'] = "<p class='notification'>$firstname. Your information has been updated.</p>";
      include '../view/admin.php';
      exit;
    } else {
      // Error message.
      $_SESSION['message']  = "<p class='notification'>Error: $firstname, the update failed. Please try again.<p/>";
      include '../view/admin.php';
      exit;
    }
    break;

  case 'updatePass':
    // Filter and store the data
    $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Check password
    $checkPassord = checkPassword($password);

    // Check for missing data
    if (empty($checkPassord)) {
      $messagePassword = "<p class='notification'>Please provide information for all empty form fields.</p>";
      include '../view/admin.php';
      exit;
    }

    // Hash the checked password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Send the data to the model
    $updatePassResult = updateUserPass($clientId, $hashedPassword);

    // Check and display the result
    if ($updatePassResult) {
      // get the updated client from database
      $clientData = getUserById($clientId);
      // Store the array into the session
      $_SESSION['userData'] = $userData;
      // Store fullname variable
      $_SESSION['fullName'] = $clientData['firstname'] . ' ' . $clientData['lastname'];

      // Succes message and redirect to admin page.
      $_SESSION['message'] = "<p class='notification'>$userData[firstname]. Your password has been changed.</p>";
      include '../view/admin.php';
      exit;
    } else {
      // Error message.
      $_SESSION['message'] = "<p class='notification'>Error: $firstname, the update failed. Please try again.<p/>";
      include '../view/admin.php';
      exit;
    }
    break;

  case 'login':
    unset($_SESSION);
    include '../view/login.php';
    break;

  case 'registration':
    include '../view/registration.php';
    break;

  case 'Login':
    // Filter and store de data
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    // Check email
    $email = checkEmail($email);

    // Check password
    // $passwordCheck = checkPassword($password);
    // TODO change this after instructor review, change cris user password
    $passwordCheck = true;

    // Check for missing data
    if (empty($email) || empty($passwordCheck)) {
      $_SESSION['message'] = '<p class="notice">Please provide a valid email address and password.</p>';
      include '../view/login.php';
      exit;
    }

    // A valid password exists, proceed with the login process
    // Query the user data based on the email address, getting an array.
    $userData = getUserbyEmail($email);

    // Compare password
    $hashCheck = password_verify($password, $userData['password']);
    // $hashCheck = $password === $userData['password'];

    // If password don't match create an error and return to the login view
    if (!$hashCheck) {
      $_SESSION['message'] = '<p class="notice">Please check your password and try again.</p>';
      include '../view/login.php';
      exit;
    }

    // A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['userId'] = $userData['userid'];

    // Remove the password from the array
    array_pop($userData);

    // Store the array into the session
    $_SESSION['userData'] = $userData;

    // Store fullname variable
    $_SESSION['fullName'] = $userData['firstname'] . ' ' . $userData['lastname'];

    // Send them to the admin view
    include '../view/home.php';
    break;

  case 'register':
    // Filter and store the data
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Check email
    $email = checkEmail($email);

    // Check password
    $checkPassword = checkPassword($password);

    //Check for existing email
    $existingEmail = checkExistingEmail($email);

    //If email exists show message and redirect to login.php
    if ($existingEmail) {
      $message = '<p>This email address already exists. Do you want to login instead?</p>';
      include '../view/login.php';
      exit;
    }

    //Check for existing ping
    $existingPin = checkExistingPin($pin);

    //If pin exists show message and redirect to login.php
    if ($existingPin) {
      $message = '<p>This pin already exists. Enter a different pin</p>';
      include '../view/registration.php';
      exit;
    }

    // Check for missing data
    if (
      empty($firstname) || empty($lastname) || empty($email)
      || empty($phone) || empty($pin) || empty($checkPassword)
    ) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/registration.php';
      exit;
    }

    // Hash the checked password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Send the data to the model
    $regOutcome = regUser($firstname, $lastname, $pin, $phone, $email, $hashedPassword);

    // Check and display the result
    if ($regOutcome === 1) {
      // Succes message and redirect to login page.
      $_SESSION['message'] = "<p>Thanks for registering $firstname. Please use your email and password to login.</p>";
      header('Location: ../accounts/?action=login');
      exit;
    } else {
      // Error message try registration again.
      $message = "<p>Sorry $firstname, but the registration failed. Please try again.<p/>";
      include '../view/registration.php';
      exit;
    }
    break;

  case 'logout':
    session_destroy();
    header('location: /');
    break;

  default:
    if (isset($_SESSION['loggedin'])) {
      include '../view/home.php';
    } else {
      include '../view/login.php';
    }
}
