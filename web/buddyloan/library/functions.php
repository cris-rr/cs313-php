<?php
function buildBuddiesDisplay($buddies)
{
  $dv = '<ul id="buddy-display">';
  foreach ($buddies as $buddy) {
    $dv .= "<tr>
      <td>$buddy[firstname]</td>
      <td>$buddy[flastname]</td>
      <td>$buddy[fpin]</td>
      <td>$buddy[phone]</td>
      <td>$buddy[email]</td>
      <td>$buddy[balance]</td>
      </tr>";
  }

  $dv .= '</ul>';
  return $dv;
}
