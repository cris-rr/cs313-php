<?php

// Build Buddies display
function buildBuddiesDisplay($buddies)
{
  $dv = '<ul id="buddy-display">';
  foreach ($buddies as $buddy) {
    $dv .= "<tr>
      <td>$buddy[firstname]</td>
      <td>$buddy[lastname]</td>
      <td>$buddy[fpin]</td>
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
