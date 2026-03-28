<?php
  // Connect to database and run SQL query
  include("db.php");

  // Grabs id value from URL
  $id = $_GET['id'];

  $sql = "SELECT * FROM university WHERE university_id = {$id}";
  $rst = mysqli_query($mysqli, $sql);
  $a_row = mysqli_fetch_assoc($rst);
?>

<h1><?=$a_row['university_name']?></h1>
<p><?=$a_row['university_description']?></p>

<a href=" list-university.php"><< Back to list</a>
