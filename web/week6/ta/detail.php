<?php
require ('connection.php');
$db = get_db();

$id = $_GET['id'];
$strSql = 'SELECT id, book, chapter, verse, content FROM scriptures WHERE id = :id';
$statement = $db->prepare($strSql);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
$displayScripture = "<p><strong>$row[book]$row[chapter]:$row[verse]</strong> &nbsp";
$displayScripture .= "$row[content]</p>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scripture Details</title>
</head>

<body>
  <?
  if (isset ($displayScripture)){
    echo $displayScripture;
  }
    
  ?>
</body>

</html>