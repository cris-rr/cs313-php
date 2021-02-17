<?php

// echo 'this is the user model';

function getBuddies($userId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT b.userid, u.firstname, u.lastname, u.pin, u. phone, u.email, b.balance 
  FROM buddyloan.buddies b 
  JOIN buddyloan.users u ON b.buddyid = u.userid 
  WHERE b.userid = :userId';

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $buddies = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  return $buddies;
}

function getBuddy($userId, $buddyId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT b.userid, u.firstname, u.lastname, u.pin, u. phone, u.email, b.balance 
  FROM buddyloan.buddies b 
  JOIN buddyloan.users u ON b.buddyid = u.userid 
  WHERE b.userid = :userId';

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $buddies = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  return $buddies;
}

// Register a new buddy
function regBuddy($userid, $buddyid, $date)
{
  // Create a connection object using connection function
  $db = get_db();

  // The SQL statememnt
  $sql = 'INSERT INTO buddyloan.buddies (userid, buddyid, date, balance)
            VALUES (:userid, :buddyid, :date, 0)';
  $stmt = $db->prepare($sql);

  // Replace placeholders with variables values, with the type.
  $stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
  $stmt->bindValue(':buddyid', $buddyid, PDO::PARAM_INT);
  $stmt->bindValue(':date', $date, PDO::PARAM_STR);

  // Insert the data
  $stmt->execute();

  // total rows affected, it should be 1
  $rowsChanged = $stmt->rowCount();

  // close the database interaction
  $stmt->closeCursor();

  // Return rows affected
  return $rowsChanged;
}
