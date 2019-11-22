<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dyves</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="shortcut icon" type="image/png" href="pic/Dyves.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/javascript.js"></script>
  </head>
  <body onload="checkCookie(false)">
    <?php
      include 'php/login.php';
      include 'php/uitloggen.php';
      include 'php/get.php';
      include 'php/searchbar.php';
      include 'php/style.php';
      include 'parts/cookies.php';
    ?>

    <div class="header">
      <?php
        include 'parts/header.php';
        include 'parts/inlog.php';
       ?>
      <div class="searchbar">
        <div class="logotext">
          Dyves
        </div>
        <?php include 'parts/search.php'; ?>
      </div>
    </div>

    <?php if($_SESSION["wachtwoordCheck"] == "true"){?>

    <div class="body" id="body">
      <div class="kop">
        <?php
          echo $gebruikersnaam_; //krijgt de Gebruikers naam van de database
        ?>
      </div>
      <?php
      	 include 'parts/profielKop.php';//De main div van het profiel
      	 include 'parts/over.php'; //De basic informatie div
         if($vrienAan_){
           include 'parts/vrienden.php'; //De vrienden div
         }
         include 'parts/fotos.php'; //De basic informatie div
         if(true){
           include 'parts/krabels.php'; //De krabel post div
          }
         if($muziekAan_){
           include 'parts/muziek.php'; //De krabel post div
         }
         if($filmAan_){
           include 'parts/profFilms.php'; //De krabel post div
         }
      ?>
    </div>
  <?php
    }
    else{
      header ('location:index.php');
    }
    include 'parts/footer.php';
   ?>

  </body>
</html>
