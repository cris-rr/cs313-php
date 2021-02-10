<?php
require('connection.php');
$db = get_db();
session_start();


$display = "<h1>Scriptures in Database</h1>";
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

if (isset($_POST['search'])) {
  $searchBook = $_POST['search'];
  $strSql = 'SELECT id, book, chapter, verse, content FROM scriptures WHERE book = :searchBook';
  $statement = $db->prepare($strSql);
  $statement->bindValue(':searchBook', $searchBook, PDO::PARAM_STR);
  $statement->execute();
  $displaySearch = "<h1>Scripture Search</h1>";

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $displaySearch .= "<a href='detail.php?id=$row[id]'><p><strong>$row[book]&nbsp$row[chapter]:$row[verse]</strong>";
    $displaySearch .= "'</p></a>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scripture Insert and Search</title>
</head>

<body>
  <div id="scripturedisplay">
    <?
    echo $display;
  ?>
  </div>

  <form method="POST" action="">
    <label for="search"></label>
    <input type="text" name="search">
    <input type="submit" name="submit" value="Search">
  </form>
  <?
  if (isset($displaySearch)) {
    echo $displaySearch;
  }
  
  ?>

  <h1>Insert a New Scripture</h1>
  <form method="POST" action="insert_scripture.php" id="scriptureform">
    <label>Book:</label>
    <input type="text" name="book"><br>
    <label>Chapter:</label>
    <input type="text" name="chapter"><br>
    <label>Verse:</label>
    <input type="text" name="verse"><br>
    <label>Content of Scripture:</label><br>
    <textarea name="content" rows="10" cols="50"></textarea><br>
    <label>Which topic does this scripture fit best?</label><br>
    <!-- <input type="checkbox" name="topic[]" display="none" default="notopic"> -->
    <?php
    // for the checkboxes of topics
    $stmt = $db->prepare('SELECT id, name FROM topic');
    $stmt->execute();
    $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $topicarray = array();
    foreach ($topics as $topic) {
      $topicid = $topic["id"];
      $topicname = $topic["name"];

      echo "<input type='checkbox' name='topic[]' value='$topicid'>";
      echo "<label for='topic'>$topicname</label><br>";
    }
    ?>
    <input type="checkbox" name="newtopic">
    <input type="text" name="topicname"><br>

    <input type="submit" name="submit" value="Add Scripture">
  </form>
  <div id="response">

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js.js"></script>

</body>

</html>