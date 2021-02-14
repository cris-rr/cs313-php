<?php

// echo 'this is the transactions model';

function getTransactions($userId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT t.userid, t.buddyid, b.firstname, b.lastname, 
    t.transactionid, t.description, t.date, t.amount, t.image_path
  FROM buddyloan.transactions t 
  JOIN buddyloan.users b on t.buddyid = b.userid 
  WHERE t.userid = :userId';

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  return $transactions;
}

function getTransaction($transactionId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT t.userid, t.buddyid, b.firstname, b.lastname, 
    t.transactionid, t.description, t.date, t.amount, t.image_path
  FROM buddyloan.transactions t 
  JOIN buddyloan.users b on t.buddyid = b.userid 
  WHERE t.userid = :userId';

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  return $transactions;
}
