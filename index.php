<!--
<form class="" method="post">
  <input type="submit" name="Menu" value="Menu">
  <input type="submit" name="Meldingen" value="Meldingen">
  <input type="submit" name="Test3" value="Test3">
  <input type="submit" name="Profiel" value="Profiel">
  <input type="submit" name="vrienden" value="vrienden">
  <input type="submit" name="Test6" value="Test6">
  <input type="submit" name="Test7" value="Test7">
  <input type="submit" name="zoeken" value="zoeken">
  <input type="submit" name="Aanmelden" value="Aanmelden">
</form> -->
<?php

  function reloadPost(){
    echo "<script>
              if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
                location.reload(true);
              }
            </script>";
  }
  error_reporting(0);
  session_start();
  include 'php/goto.php';
  if(isset($_POST['Menu'])){
    $_SESSION['Waar'] = "hoofdmenu";
    reloadPost();
  }
  elseif(isset($_POST['Meldingen'])){
    $_SESSION['Waar'] = "meldingen";
    reloadPost();
  }
  elseif(isset($_POST['instellingen'])){
    $_SESSION['Waar'] = "instellingen";
    reloadPost();
  }
  elseif(isset($_POST['Profiel'])){
    $_SESSION['Waar'] = "profiel";
    reloadPost();
  }
  elseif(isset($_POST['vrienden'])){
    $_SESSION['Waar'] = "vrienden";
    reloadPost();
  }
  elseif(isset($_POST['bezoek'])){
    $_SESSION['Waar'] = "bezoek";
    reloadPost();
  }
  elseif(isset($_POST['Test7'])){
    $_SESSION['Waar'] = "instellingen";
    reloadPost();
  }
  elseif(isset($_POST['zoeken'])){
    $_SESSION['Waar'] = "zoeken";
    reloadPost();
  }
  elseif(isset($_POST['Aanmelden'])){
    $_SESSION['Waar'] = "aanmelden";
    reloadPost();
  }
  if(!strlen($_SESSION['Waar']) > 0){
    $_SESSION['Waar'] = "hoofdmenu";
    $_SESSION['test'] = "True";
    reloadPost();
  }
  include "paginas/".$_SESSION['Waar'].".php";

  ?>
