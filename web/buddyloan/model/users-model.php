<?php

// echo 'this is the user model';
function getUserById($userId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT * FROM buddyloan.users WHERE userid = :usrId';

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $userData = $stmt->fetch(PDO::FETCH_ASSOC);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  return $userData;
}
