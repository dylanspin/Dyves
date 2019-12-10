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
  $current = $_SESSION["nu"];
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
  if(isset($_POST['Meerfotos'])){
    $_SESSION['Waar'] = "fotos";
    reloadPost();
  }
  elseif(isset($_POST['vrienden'])){
    $_SESSION['Waar'] = "vrienden";
    reloadPost();
  }
  elseif(isset($_POST['backend'])){
    if($current == "Dylanspin"){
      $_SESSION['Waar'] = "backend";
      reloadPost();
    }
  }
  elseif(isset($_POST['Polls'])){
    if($current == "Dylanspin"){
      $_SESSION['Waar'] = "poll";
      reloadPost();
    }
  }
  elseif(isset($_POST['Artikel'])){
    if($current == "Dylanspin"){
      $_SESSION['Waar'] = "artikel";
      reloadPost();
    }
  }
  elseif(isset($_POST['bezoek'])){
    $_SESSION['Waar'] = "bezoek";
    reloadPost();
  }
  elseif(isset($_POST['Article'])){
    $_SESSION['Waar'] = "Currentarticle";
    $_SESSION['CurentArticle'] = $_POST['Article'];
    reloadPost();
  }
  elseif(isset($_POST['Nieuws'])){
    $_SESSION['Waar'] = "Nieuws";
    $_SESSION['label'] = $_POST['Nieuws'];
    $_SESSION['Aantal']  = 13;
    $_SESSION['Start'] = 0;
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
    reloadPost();
  }
  include "paginas/".$_SESSION['Waar'].".php";

  ?>
