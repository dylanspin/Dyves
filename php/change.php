<?php

  if(isset($_POST['Pollset'])){
    $welk = $_POST['Pollset'];
    $sql = "UPDATE `settings` SET `Poll` = '$welk' WHERE Id = '1';";
    if ($conn->query($sql) === true) {
      $sql = "UPDATE `notusers` SET `Voted` = '0';";
      if ($conn->query($sql) === true) {
      }
    }
    reloadPost();
  }


  if(isset($_POST['Artikelset'])){

  }

 ?>
