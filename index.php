<?php
    // include 'php/Ban.php';//Ban systeem
    // $_SESSION['test'] = "mislukt". $sql . "<br>" . $conn->error;
    function reloadPost(){
        echo "<script>
                  if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href);
                    location.reload(true);
                  }
                  var scroll = $(window).scrollTop();
                  $('html').scrollTop(scroll);
              </script>";
      }

    error_reporting(0);
    session_start();

    $current = $_SESSION["nu"];
    if(isset($_POST['Menu'])){
        $_SESSION['Waar'] = "hoofdmenu";
        reloadPost();
    }
    elseif(isset($_POST['Meldingen'])){
        $_SESSION['Waar'] = "meldingen";
        reloadPost();
    }
    elseif(isset($_POST['formSub']) && $_SESSION['Nieuwacc'] == "true"){
        $_SESSION['Waar'] = "hoofdmenu";
        reloadPost();
    }
    elseif(isset($_POST['instellingen'])){
        $_SESSION['Waar'] = "instellingen";
        reloadPost();
    }
    elseif(isset($_POST['Profiel'])){
        $_SESSION['Waar'] = "profiel";
        $_SESSION["bezoek"] = "";
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
        if($current == "ZS39R35ulltAv235JPYeSY35R"){
            $_SESSION['Waar'] = "backend";
            reloadPost();
        }
    }
    elseif(isset($_POST['Polls'])){
        if($current == "ZS39R35ulltAv235JPYeSY35R"){ //moet nog veranderd worden naar de admin ids
            $_SESSION['Waar'] = "poll";
            reloadPost();
        }
    }
    elseif(isset($_POST['Artikel'])){
        if($current == "ZS39R35ulltAv235JPYeSY35R"){
            $_SESSION['Waar'] = "artikel";
            reloadPost();
        }
    }
    elseif(isset($_POST['bezoek'])){
        $_SESSION['Waar'] = "bezoek";
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
        $_SESSION['Nieuwacc'] = "false";
        $_SESSION['Waar'] = "aanmelden";
        reloadPost();
    }
    elseif(isset($_POST['Agenda'])){
        $_SESSION['Waar'] = "Agenda";
        $_SESSION['Agenda'] = 1;
        $_SESSION['Jaar'] = 2;
        reloadPost();
    }
    if(!strlen($_SESSION['Waar']) > 0){
        $_SESSION['Waar'] = "hoofdmenu";
        reloadPost();
    }
    include "paginas/".$_SESSION['Waar'].".php";

  ?>
