<?php
include 'db.php';


$university_id = $_POST['university_id'];
$university_name = $_POST['university_name'];
$university_description = $_POST['university_description'];
$rating = $_POST['rating'];
$established_date = $_POST['established_date'];

// Update query
$sql = "UPDATE University
        SET university_name='$university_name',
            university_description='$university_description',
            rating='$rating',
            established_date='$established_date'
        WHERE university_id=$university_id";

mysqli_query($mysqli, $sql);

// Redirect back to list
header("Location: list-university.php");
exit;
?>

