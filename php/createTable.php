<?php

  include 'connect.php';
  include 'block.php';

  $test = "";
  $sql = "CREATE TABLE $test (
    Id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Vrienden VARCHAR(255) NOT NULL
  )";

  if ($conn->query($sql) === TRUE) {
  }
