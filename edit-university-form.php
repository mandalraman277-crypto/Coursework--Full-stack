<?php
include 'db.php';

$id = $_GET['id'];

// Get the specific game info
$sql = "SELECT * FROM University WHERE university_id = $id";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
<body>

<h1>Update university</h1>

<form action="update-university.php" method="post">
  <input type="hidden" name="university_id" value="<?=$row['university_id']?>">

  <label>university Name:</label><br>
  <input type="text" name="university_name" value="<?=$row['university_name']?>" required><br><br>
  
  <label>Description:</label><br>
  <textarea name="university_description" rows="5" cols="40" required><?=$row['university_description']?></textarea><br><br>

  <label>Rating:</label><br>
  <input type="number" name="rating" value="<?=$row['rating']?>" required><br><br>

  <label>Establish Date:</label><br>
  <input type="date" name="established_date" value="<?=$row['established_date']?>" required><br><br>

  <input class="btn" type="submit" value="Update university">
</form>

</body>
</html>
