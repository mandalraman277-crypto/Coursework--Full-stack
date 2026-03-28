<h1>Search results</h1>
<?php

  // Connect to database and run SQL query
  include("db.php");

  // Read value from form
  $keywords = $_POST['keywords'];  

  // Run SQL query
  $sql = "SELECT * FROM university 
          WHERE university_name LIKE '%{$keywords}%' 
          ORDER BY established_date";
          
  $results = mysqli_query($mysqli, $sql);
?>

<table>
  <?php while($a_row = mysqli_fetch_assoc($results)):?>
    <tr>
      <td><a href="university-details.php?id=<?=$a_row['university_id']?>"><?=$a_row['university_name']?></a></td>
      <td><?=$a_row['rating']?></td>
    </tr>
  <?php endwhile;?>
</table>
