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

function getBiggestDebt($userId)
{
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT b.userid, b.buddyid, u.firstname, u.lastname, u.phone, u.email, b.balance
  FROM buddyloan.users u
  JOIN buddyloan.balance b
  ON u.userid = b.buddyid 
  WHERE b.userid = :userId
  ORDER BY b.balance LIMIT 1';

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $buddy = $stmt->fetch(PDO::FETCH_ASSOC);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  return $buddy;
}

function getBiggestCredit($userId)
{
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT b.userid, b.buddyid, u.firstname, u.lastname, u.phone, u.email, b.balance
  FROM buddyloan.users u
  JOIN buddyloan.balance b
  ON u.userid = b.buddyid
  WHERE b.userid= :userId
  ORDER BY b.balance DESC LIMIT 1';

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $buddy = $stmt->fetch(PDO::FETCH_ASSOC);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  return $buddy;
}
