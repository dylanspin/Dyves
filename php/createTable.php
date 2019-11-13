<?php

  include 'connect.php';

  $sql = "CREATE TABLE Dylan (
    Id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Vrienden VARCHAR(255) NOT NULL,
  )";
  
  if ($conn->query($sql) === TRUE) {
  }
