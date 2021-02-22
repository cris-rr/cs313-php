<?php

// this is the main model;

function getCredit($userId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT sum(amount)
  FROM buddyloan.transactions 
  WHERE userid = :userId';

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $credit = $stmt->fetch(PDO::FETCH_NUM);

  // Close the database interaction
  $stmt->closeCursor();
  // Return the client record
  if (is_null($credit[0])) {
    return 0; # code...
  }
  return $credit[0];
}

function getDebt($userId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT sum(amount)
  FROM buddyloan.transactions 
  WHERE buddyid = :userId';

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $debt = $stmt->fetch(PDO::FETCH_NUM);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  if (is_null($debt[0])) {
    return 0; # code...
  }
  return $debt[0];
}
