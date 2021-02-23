<?php

// echo 'this is the user model';

function getBuddies($userId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT b.id, b.userid, b.buddyid, u.firstname, u.lastname, u.pin, u. phone, u.email, b.balance 
  FROM buddyloan.buddies b 
  JOIN buddyloan.users u ON b.buddyid = u.userid 
  WHERE b.userid = :userId';

  $sql = 'SELECT b.id, b.userid, b.buddyid, u.firstname, u.lastname, u.pin, u.phone, u.email, r.balance 
  FROM buddyloan.buddies b 
  left JOIN buddyloan.users u ON b.buddyid = u.userid
  left JOIN buddyloan.balance r on b.userid = r.userid
  and b.buddyid = r.buddyid 
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

// Get simple buddiy list by userId
function getBuddyList($userId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = "SELECT DISTINCT b.buddyid, concat_ws(' ', u.firstname, u.lastname) fullname
  FROM buddyloan.buddies b 
  JOIN buddyloan.users u ON b.buddyid = u.userid 
  WHERE b.userid = :userId";

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

function existingBuddy($userId, $buddyId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT userid, buddyid 
  FROM buddyloan.buddies 
  WHERE userid = :userId and buddyid = :buddyId';

  // prepared statemenet
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
  $stmt->bindValue(':buddyId', $buddyId, PDO::PARAM_INT);

  // Ejecuta la consulta
  $stmt->execute();
  $matchBuddy = $stmt->fetchAll(PDO::FETCH_NUM);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  if (empty($matchBuddy)) {
    return 0;
  } else {
    return 1;
  }
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

function deleteBuddy($id)
{
  // Create a connection object and create the sql statement
  $db = get_db();
  $sql = 'DELETE from buddyloan.buddies WHERE id = :id';
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


function deleteBuddy2($userId, $buddyId)
{
  // Create a connection object and create the sql statement
  $db = get_db();
  $sql = 'DELETE from buddyloan.buddies 
    WHERE userid = :userId AND buddyid=:buddyId';
  $stmt = $db->prepare($sql);

  // Replace placeholders with variables values, with type
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
  $stmt->bindValue(':buddyId', $buddyId, PDO::PARAM_INT);
  // Delete data;
  $stmt->execute();

  // total rows affected
  $rowsChanged = $stmt->rowCount();
  // close the database interaction
  $stmt->closeCursor();
  // return rows affectec
  return $rowsChanged;
}
