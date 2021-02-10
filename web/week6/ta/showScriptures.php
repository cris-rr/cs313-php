<?php
require ('connection.php');
$db = get_db();


$display = "<h1>Scripture Resources</h1>";
$statement = $db->prepare('SELECT s.book, s.chapter, s.verse, s.content, t.name
FROM scriptures s
LEFT JOIN linking l ON l.scripture_id=s.id
LEFT JOIN topic t ON t.id=l.topic_id;');
$statement->execute();

// go through each scripture
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  $display .= "<p><strong>Book: $row[book] Chapter: $row[chapter] Verse: $row[verse]</strong>";
  $display .= " - '$row[content]'";
  $display .= "Topic:$row[name]";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scriptures in Database</title>
</head>

<body>
  <?php
    echo $display;
  ?>
<a href="scriptures.php">Back to Home</a>

  </body>

</html>
