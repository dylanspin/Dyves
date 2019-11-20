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
  <body onload="checkCookie(false)" class="intel">
    <?php
      include 'php/login.php';
      include 'php/uitloggen.php';
      include 'php/get.php';
      include 'php/foto.php';
      include 'php/update.php';
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
        <div class="search">
          <input type="text" class="header_in" id="header">
          <label>
            <i class="fa fa-search fa-1x" onclick="search()"></i>
          </label>
        </div>
      </div>
    </div>

    <div class="niet" id="niet">Niet ingelogd!</div><!--niet ingelogged melding-->

    <div class="body" id="body">

      <div class="intelKop">
          Mijn Menu
      </div>

      <!--De profiel pagina instellingen-->
      <form class="intellingenForm" method="post" enctype="multipart/form-data">
        <div class="sectie blauw">Profiel Foto: </div>
          <input type="file" name="fileToUpload" id="fileToUpload" class="instelling" accept="image/*">

      <!-- <form class="intellingenForm" action="" method="post"> -->
        <div class="enter"></div>
        <div class="sectie blauw">Over: </div>
        <div class="intellinginner">
          <label class="instelLabel">Gebruiker</label><input type="text" name="Gebruikersnaam" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Voornaam</label><input type="text" name="Voornaam" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Achternaam</label><input type="text" name="Achternaam" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Woonplaats</label><input type="text" name="Woonplaats" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Opleiding</label><input type="text" name="Opleiding" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Baan</label><input type="text" name="Baan" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Fav Muziek</label><input type="text" name="MuziekU" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Fav Film</label><input type="text" name="FilmU" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Sport</label><input type="text" name="Sport" class="instelling">
        </div>

      <div class="enter"></div>
      <div class="sectie blauw">Profiel: </div>
        <label class="instelLabel">Private</label>
        <input type="radio" name="Aanprive" value="1" class="instellingRadio" <?php if($private_){echo "checked";}else{echo "";}?>>
        <span class="text3">Aan</span>
        <input type="radio" name="Aanprive" value="0" class="instellingRadio" <?php if(!$private_){echo "checked";}else{echo "";}?>>
        <span class="text3">Uit</span>

        <label class="instelLabel">Vrienden:  </label>
        <input type="radio" name="AanVrienden" value="1" class="instellingRadio" <?php if($vrienAan_){echo "checked";}else{echo "";}?>>
        <span class="text3">Aan</span>
        <input type="radio" name="AanVrienden" value="0" class="instellingRadio"<?php if(!$vrienAan_){echo "checked";}else{echo "";}?>>
        <span class="text3">Uit</span>

      <div class="enter"></div><!--Moet nog met php-->
      <div class="sectie blauw">Thema: </div>
      <input type="hidden" name="Hidden" value="" id="Hidden">
      <div class="themas">
        <?php include 'parts/themas.php'; ?>
      </div>



      <div class="enter"></div>
      <div class="sectie blauw">Favoriete Nummers: </div>
        <label class="instelLabel">Nummers</label><input type="text" name="Muziek" value="" class="instelling">
        <label class="instelLabel">Status</label>
        <input type="radio" name="AanMuziek" value="1" class="instellingRadio"<?php if($muziekAan_){echo "checked";}else{echo "";}?>>
        <span class="text3">Aan</span>
        <input type="radio" name="AanMuziek" value="0" class="instellingRadio"<?php if(!$muziekAan_){echo "checked";}else{echo "";}?>>
        <span class="text3">Uit</span>

      <div class="enter"></div>
      <div class="sectie blauw">Films: </div>
        <label class="instelLabel">Film</label><input type="text" name="Film" value="" class="instelling">
        <label class="instelLabel">Status</label>
        <input type="radio" name="AanFilms" value="1" class="instellingRadio"<?php if($filmAan_){echo "checked";}else{echo "";}?>>
        <span class="text3">Aan</span>
        <input type="radio" name="AanFilms" value="0" class="instellingRadio"<?php if(!$filmAan_){echo "checked";}else{echo "";}?>>
        <span class="text3">Uit</span>

        <input type="submit" value="Save" name="update" class="slaOp" >
    </div>

  </body>
</html>
