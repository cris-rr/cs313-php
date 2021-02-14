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
