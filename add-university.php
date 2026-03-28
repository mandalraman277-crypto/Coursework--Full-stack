<?php
  
  // Read values from the form
  $university_name = $_POST['UniversityName'];
  $university_description = $_POST['UniversityDescription'];
  $university_establish_date = $_POST['DateEstablished'];
  $university_rating = $_POST['UniversityRating'];
  
  // Connect to database
  include("db.php");
  
  // Build SQL statement
  $sql = "INSERT INTO Cars(university_name, university_description, established_date, rating)
          VALUE('{$university_name}', '{$university_description}', '{$university_establish_date}', '{$university_rating}')";
  
  // Run SQL statement and report errors
  if(!$mysqli -> query($sql)) {
      echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
  }
  
  // Redirect to list
  header("location: list-university.php");
?>