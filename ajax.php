<?php

// Connect to database and run SQL query
include("db.php");

// Is a keyword provided in the URL?
if(isset($_GET['search']))
  $sql = "SELECT * FROM University WHERE university_name LIKE '%{$_GET['search']}%' ORDER BY established_date";
else
  $sql = "SELECT * FROM University ORDER BY established_date";

// Fetch all record, convert to JSON and return
$results = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
print(json_encode($results));

?>
