<?php

// echo 'this is the transactions model';

// Get all transactions by user id
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

// Get transcation using transaction id
function getTransactionById($id)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  // $sql = 'SELECT * from buddyloan.transactions 
  // WHERE transactionid = :id';

  $sql = "SELECT t.userid, t.buddyid, b.firstname, b.lastname, 
    concat_ws(' ', b.firstname, b.lastname) fullname,  
    t.transactionid, t.description, t.date, t.amount, t.image_path
  FROM buddyloan.transactions t 
  JOIN buddyloan.users b on t.buddyid = b.userid 
  WHERE t.transactionid = :id";

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $transactions = $stmt->fetch(PDO::FETCH_ASSOC);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  return $transactions;
}

// Add a transaction
function regTransaction($userId, $buddyId, $description, $date, $amount, $image)
{
  // Create a connection object using connection function
  $db = get_db();

  // The SQL statememnt
  $sql = 'INSERT INTO buddyloan.transactions 
          (userid, buddyid, description, date, amount, image_path)
          VALUES (:userid, :buddyid, :description, :date, :amount, :image)';
  $stmt = $db->prepare($sql);

  // Replace placeholders with variables values, with the type.
  $stmt->bindValue(':userid', $userId, PDO::PARAM_INT);
  $stmt->bindValue(':buddyid', intVal($buddyId), PDO::PARAM_INT);
  $stmt->bindValue(':description', $description, PDO::PARAM_STR);
  $stmt->bindValue(':date', $date, PDO::PARAM_STR);
  $stmt->bindValue(':amount', strval($amount), PDO::PARAM_STR);
  $stmt->bindValue(':image', $image, PDO::PARAM_STR);

  // Insert the data
  $stmt->execute();

  // total rows affected, it should be 1
  $rowsChanged = $stmt->rowCount();

  // close the database interaction
  $stmt->closeCursor();

  // Return rows affected
  return $rowsChanged;
}

// Delete a transaction
function deleteTransaction($id)
{
  // Create a connection object and create the sql statement
  $db = get_db();
  $sql = 'DELETE from buddyloan.transactions WHERE transactionid = :id';
  $stmt = $db->prepare($sql);

  // Replace placeholders with variables values, with type
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  // Delete data;
  $stmt->execute();

  // total rows affected
  $rowsChanged = $stmt->rowCount();
  // close the database interaction
  $stmt->closeCursor();
  // return rows affectec
  return $rowsChanged;
}

function updateTransaction($id, $description, $date, $amount, $image)
{
  // Create a connection object
  $db = get_db();
  // Sql statement
  $sql = 'UPDATE buddyloan.transactions SET description = :description, date = :date, 
        amount = :amount, image_path = :image 
        WHERE transactionid = :id';
  // Prepared statement
  $stmt = $db->prepare($sql);
  // Replace placeholders with variables values, with type
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':description', $description, PDO::PARAM_STR);
  $stmt->bindValue(':date', $date, PDO::PARAM_STR);
  $stmt->bindValue(':amount', $amount, PDO::PARAM_STR);
  $stmt->bindValue(':image', $image, PDO::PARAM_STR);
  // Update data;
  $stmt->execute();
  // total rows affected
  $rowsChanged = $stmt->rowCount();
  // close the database interaction
  $stmt->closeCursor();
  // retrun rows affectec
  return $rowsChanged;
}

function updateBalances()
{
}
