<?php
include 'connection.php';
$db = get_db();

session_start();

$id = $_SESSION['scriptureId'];
$strSql = 'SELECT id, book, chapter, verse, content FROM ta.scriptures WHERE id = :id';
$statement = $db->prepare($strSql);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();

$displayScripture .= "<p><strong>Book: $row[book] Chapter: $row[chapter] Verse: $row[verse]</strong>";
$displayScripture .= "Content: $row[content]</p>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
</head>

<body>
  <?
    echo $displayScripture;
  ?>
</body>

</html>