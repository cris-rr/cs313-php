<?php

// Build Buddies display
function buildBuddiesDisplay($buddies)
{
  $dv = '<ul id="buddy-display">';
  foreach ($buddies as $buddy) {
    $dv .= "<tr>
      <td>$buddy[firstname]</td>
      <td>$buddy[lastname]</td>
      <td>$buddy[pin]</td>
      <td>$buddy[phone]</td>
      <td>$buddy[email]</td>
      <td>$buddy[balance]</td>
      </tr>";
  }

  $dv .= '</ul>';
  return $dv;
}

// Build Transaction display
function buildTransactionsDisplay($transactions)
{
  $dv = '<ul id="transactions-display">';
  foreach ($transactions as $transaction) {
    $dv .= "<tr>
      <td>$transaction[firstname]</td>
      <td>$transaction[lastname]</td>
      <td>$transaction[transactionid]</td>
      <td>$transaction[description]</td>
      <td>$transaction[date]</td>
      <td>$transaction[amount]</td>
      <td>$transaction[image_path]</td>      
      </tr>";
  }

  $dv .= '<ul/>';
  return $dv;
}

// Build Admin display
function buildUserDataDisplay($user)
{
  $dv = "

  ";
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
