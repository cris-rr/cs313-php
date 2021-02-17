<?php

// echo 'this is the user model';

// Get user using Id
function getUserById($userId)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT * FROM buddyloan.users WHERE userid = :userId';

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

// Get the user by Pin
function getUserByPin($pin)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT * FROM buddyloan.users WHERE pin = :pin';
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':pin', $pin, PDO::PARAM_STR);

  // Execute query
  $stmt->execute();
  $userData = $stmt->fetch(PDO::FETCH_ASSOC);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  return $userData;
}


// Get the user with email
function getUserByEmail($email)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement
  $sql = 'SELECT * FROM buddyloan.users WHERE email = :email';
  $stmt = $db->prepare($sql);

  // Replace  placeholders with variable values, with the type
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);

  // Ejecuta la consulta
  $stmt->execute();
  $userData = $stmt->fetch(PDO::FETCH_ASSOC);

  // Close the database interaction
  $stmt->closeCursor();

  // Return the client record
  return $userData;
}

// Check for an exising email
function checkExistingEmail($email)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement, prepare and bind values
  $sql = 'SELECT email FROM buddyloan.users WHERE email = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);

  // Ejecuta la consulta
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

  // Close the database interaction
  $stmt->closeCursor();

  // Return if 0 is the email does not exist, otherwise return 1.
  if (empty($matchEmail)) {
    return 0;
  } else {
    return 1;
  }
}

// Check for an exising pin
function checkExistingPin($pin)
{
  // Create a connection to the database
  $db = get_db();

  // SQL Statement, prepare and bind values
  $sql = 'SELECT pin FROM buddyloan.users WHERE pin = :pin';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':pin', $pin, PDO::PARAM_STR);

  // Ejecuta la consulta
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

  // Close the database interaction
  $stmt->closeCursor();

  // Return if 0 is the pin does not exist, otherwise return 1.
  if (empty($matchEmail)) {
    return 0;
  } else {
    return 1;
  }
}

// Register a new user
function regUser($firstname, $lastname, $pin, $phone, $email, $password)
{
  // Create a connection object using connection function
  $db = get_db();

  // The SQL statememnt
  $sql = 'INSERT INTO buddyloan.users (firstname, lastname, pin, phone, email, password)
            VALUES (:firstname, :lastname, :pin, :phone, :email, :password)';
  $stmt = $db->prepare($sql);

  // Replace placeholders with variables values, with the type.
  $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
  $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
  $stmt->bindValue(':pin', $pin, PDO::PARAM_STR);
  $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $stmt->bindValue(':password', $password, PDO::PARAM_STR);

  // Insert the data
  $stmt->execute();

  // total rows affected, it should be 1
  $rowsChanged = $stmt->rowCount();

  // close the database interaction
  $stmt->closeCursor();

  // Return rows affected
  return $rowsChanged;
}

// Update user info
function updateUser($userId, $firstname, $lastname, $pin, $phone, $email)
{
  // Create a connection object using the phpmotors connection function
  $db = get_db();

  // The SQL statememnt
  $sql = 'UPDATE buddyloan.users SET firstname = :firstname, lastname = :lastname,   pin = :pin, phone = :phone, email = :email
            WHERE userid = :userid';
  $stmt = $db->prepare($sql);

  // Replace placeholders with variables values, with the type.
  $stmt->bindValue(':userid', $userId, PDO::PARAM_INT);
  $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
  $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
  $stmt->bindValue(':pin', $pin, PDO::PARAM_STR);
  $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);

  // Insert the data
  $stmt->execute();

  // total rows affected, it should be 1
  $rowsChanged = $stmt->rowCount();

  // close the database interaction
  $stmt->closeCursor();

  // Return rows affected
  return $rowsChanged;
}


// Update user password
function updateUserPass($userId, $password)
{
  // Create a connection object using connection function
  $db = get_db();

  // The SQL statememnt
  $sql = 'UPDATE buddyloan.users SET password = :password
            WHERE userId = :userId';
  $stmt = $db->prepare($sql);

  // Replace placeholders with variables values, with the type.
  $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
  $stmt->bindValue(':password', $password, PDO::PARAM_STR);

  // Insert the data
  $stmt->execute();

  // total rows affected, it should be 1
  $rowsChanged = $stmt->rowCount();

  // close the database interaction
  $stmt->closeCursor();

  // Return rows affected
  return $rowsChanged;
}
