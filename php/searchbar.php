<?php
  include 'block.php';
  if(isset($_POST['zoekbutton'])){
    $_SESSION["zoek"] = $_POST['zoekinfor']; //dit moet nog gecheckt worden op script
    header ('location:zoeken.php');
  }

 ?>
