<?php

// Build Buddies display
function buildBuddiesDisplay($buddies)
{
  // $route = (dirname(__DIR__, 1) . "/buddies?action=");
  // echo 'path: ' . $_SERVER['DOCUMENT_ROOT'];
  $route = "../buddies?action=";
  $dv = '<ul id="buddy-display">';

  foreach ($buddies as $buddy) {
    $delete = $route . 'del&id=' . $buddy['id'] . '&buddy=' . $buddy['buddyid'];
    $dv .= "<tr>
      <td>$buddy[firstname]</td>
      <td>$buddy[lastname]</td>
      <td>$buddy[pin]</td>
      <td>$buddy[phone]</td>
      <td>$buddy[email]</td>
      <td>$buddy[balance]</td>
      <td><a class='btn btn-del' href ='$delete'>Delete</a></td>
      </tr>";
  }
  $dv .= '</ul>';
  return $dv;
}

// Build buddy list to display in select
function buildBuddyList($buddies)
{
  $dv = "<select class='data' name='buddyid' id='buddyList'>
          <option>Choose a Buddy</option>";
  foreach ($buddies as $buddy) {
    $dv .= "<option value='$buddy[buddyid]'>$buddy[fullname]</option>";
  }
  $dv .= "</select>";
  return $dv;
}

// Build Transaction display
function buildTransactionsDisplay($transactions)
{
  $route = "../transactions?action=";
  $dv = '<ul id="transactions-display">';
  foreach ($transactions as $transaction) {
    $delete = $route . 'del&id=' . $transaction['transactionid'];
    $edit = $route . 'mod&id=' . $transaction['transactionid'];
    $dv .= "<tr>
      <td>$transaction[firstname]</td>
      <td>$transaction[lastname]</td>
      <td>$transaction[transactionid]</td>
      <td>$transaction[description]</td>
      <td>$transaction[date]</td>
      <td>$transaction[amount]</td>
      <td>$transaction[image_path]</td>
      <td class='col-edit'><a class='btn btn-edit' href ='$edit'>Edit</a></td>
      <td class='col-del'><a class='btn btn-del' href ='$delete'>Delete</a></td>
      </tr>";
  }

  $dv .= '<ul/>';
  return $dv;
}


/**
 * Check if the email adress is valid.
 * @param $clientEmail The email to validate.
 * @return $valEmail with the actual email if is valid or NULL id if not.
 */
function checkEmail($email)
{
  $valEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

/**
 * Check the password for a minimm of 8 characters,
 * at least 1 capital letter, at least 1 number and
 * at least 1 special caracter
 * @param $clientPassword The password to validate.
 * @return 1 if is valid or 0 if is not.
 */
function checkPassword($password)
{
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
  return preg_match($pattern, $password);
}

// Build dashboard biggest debt or credit
function buildReviewBuddy($buddy)
{
  $balance = number_format($buddy['balance'], 2);
  $dv = "<p><span class='partial'>Name: </span>$buddy[firstname] $buddy[lastname]</p>
    <p><span class='partial'>Phone: </span>$buddy[phone]</p>      
    <p><span class='partial'>Email: </span>$buddy[email]</p>      
    <p><span class='partial'>Amount: </span>$balance</p>";

  return $dv;
}
