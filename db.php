<?php

  $mysqli = new mysqli("localhost","2449474","Guessit@1234","db2449474");

  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
?>
