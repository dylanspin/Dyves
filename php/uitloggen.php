<?php
  session_start();
  include 'block.php';
  if(isset($_POST['uitloggen'])){
    // unset($_SESSION["nu"]);
    $_SESSION["nu"] = "";
    $_SESSION["wachtwoordCheck"] = "false";
    $_SESSION["bezoek"] = "";
    header('Location: '.$_SERVER['PHP_SELF']);
  }
 ?>
