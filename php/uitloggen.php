<?php

if(isset($_POST['uitloggen'])){
  setcookie("wachtwoordCheck", "false", time() + (86400 * 30), "/");
  setcookie("nu", "", time() + (86400 * 30), "/");

  header('Location: '.$_SERVER['PHP_SELF']);
}


 ?>
