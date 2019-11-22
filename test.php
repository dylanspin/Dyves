<?php
 // include 'php/get.php';
  // $_SESSION["nu"] = "Dylanspin";
  // unset($_SESSION["nu"]);
  echo "tedsd ";
  // $_SESSION["nu"] = "Dylanspin";
  $file =basename($_SERVER['PHP_SELF']);
  // echo $file;
  if($file == "test.php"){
    echo "Is test.php";
  }
  echo $_SESSION["nu"]." ".$_SESSION["wachtwoordCheck"]." ".$_SESSION["bezoek"];

 ?>
