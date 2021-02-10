<?php
require('connection.php');
$db = get_db();
// session_start();

$book = test_input($_POST['book']);
$chapter = test_input($_POST['chapter']);
$verse = test_input($_POST['verse']);
$content = test_input($_POST['content']);
// $topic_ids = array();
$topic_ids = $_POST['topic'];
$newtopic = test_input($_POST['topicname']);
$chbox = $_POST['newtopic'];

// echo $newtopic;
// exit;
// print_r($_POST['topic']);
// echo $book;
// echo $content;
// echo $topic_ids;

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// insert new topic
if (isset($newtopic) && isset($chbox)) {
  $qry = 'INSERT INTO topic(name) VALUES(:name)';
  $statment = $db->prepare($qry);
  $statment->bindValue(':name', $newtopic);
  $statment->execute();
  $newtopic_id = $db->lastInsertId("topic_id_seq");
  if (isset($topic_ids)) {
    array_push($topic_ids, $newtopic_id);
  } else {
    $topic_ids = [$newtopic_id];
  }
}


// // info just for the scriptures table
$query = 'INSERT INTO scriptures(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';
$stmt = $db->prepare($query);
$stmt->bindValue(':book', $book);
$stmt->bindValue(':chapter', $chapter);
$stmt->bindValue(':verse', $verse);
$stmt->bindValue(':content', $content);
$stmt->execute();
// get the scripture_id from above
$scripture_id = $db->lastInsertId("scriptures_id_seq");
foreach ($topic_ids as $topic_id) {
  $stmt = $db->prepare('INSERT INTO linking(scripture_id, topic_id) VALUES(:scripture_id, :topic_id);');
  $stmt->bindValue(':scripture_id', $scripture_id);
  $stmt->bindValue(':topic_id', $topic_id);
  $stmt->execute();
}

$displaynewstring = "<h1>Scriptures in Database</h1>";
$statement = $db->prepare('SELECT s.book, s.chapter, s.verse, s.content, t.name
FROM scriptures s
LEFT JOIN linking l ON l.scripture_id=s.id
LEFT JOIN topic t ON t.id=l.topic_id;');
$statement->execute();

// go through each scripture
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  $displaynewstring .= "<p><strong>Book: $row[book] Chapter: $row[chapter] Verse: $row[verse]</strong>";
  $displaynewstring .= " - '$row[content]'";
  $displaynewstring .= "Topic:$row[name]";
}
echo $displaynewstring;

// header("Location: scriptures.php");

// header doesn't keep variable names where location does

// if(isset($stmt)){
//     echo "<h2>Your scripture was added to the database.</h2>";
//     echo "$book $chapter:$verse $content<br>"; 
//     echo "<a href='scriptures.php'>Back to Scripture Page</a>";
// }
