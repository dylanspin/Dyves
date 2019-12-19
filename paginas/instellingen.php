<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      include 'php/searchbar.php';
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

    <div class="body" id="body">

      <div class="intelKop">
          Mijn Instellingen
      </div>

      <!--De profiel pagina instellingen-->
      <form class="intellingenForm" method="post" enctype="multipart/form-data">
        <div class="sectie blauw">Profiel Foto: </div>
          <input type="file" name="fileToUpload" id="fileToUpload" class="instelling" accept="image/*">
          <span class="anderhalfv">2MB</span>

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
      <label class="instelLabel">Font :</label>
        <select name='font'>
          <option value='<?php echo $font; ?>'>Nu</option>
          <option value='0'>Standaard</option>
          <option value='1'>Oswald</option>
          <option value='2'>Girassol</option>
          <option value='3'>Lobster</option>
          <option value='4'>Righteous</option>
          <option value='5'>Lato</option>
          <option value='6'>Ubuntu</option>
          <option value='7'>Alatsi</option>
          <option value='8'>Arvo</option>
          <option value='9'>Acme</option>
          <option value='10'>Caveat</option>
          <option value='11'>Calistoga</option>
          <option value='12'>Mansalva</option>
          <option value='13'>Fondamento</option>
        </select>
      <input type="hidden" name="Hidden" value="" id="Hidden">
      <div class="themas">
        <?php include 'parts/themas.php'; ?>
      </div>



      <div class="enter"></div>
      <div class="sectie blauw">Favoriete Nummers: </div>
        <label class="instelLabel">Nummers</label><input type="text" name="Muziek" value="" class="instelling">
        <label class="instelLabel">Status</label>
        <input type="radio" name="AanMuziek" value="1" class="instellingRadio"<?php if($muziekAan_){echo "checked";}?>>
        <span class="text3">Aan</span>
        <input type="radio" name="AanMuziek" value="0" class="instellingRadio"<?php if(!$muziekAan_){echo "checked";}?>>
        <span class="text3">Uit</span>

      <div class="enter"></div>
      <div class="sectie blauw">Films: </div>
        <label class="instelLabel">Film</label><input type="text" name="Film" value="" class="instelling">
        <label class="instelLabel">Status</label>
        <input type="radio" name="AanFilms" value="1" class="instellingRadio"<?php if($filmAan_){echo "checked";}?>>
        <span class="text3">Aan</span>
        <input type="radio" name="AanFilms" value="0" class="instellingRadio"<?php if(!$filmAan_){echo "checked";}?>>
        <span class="text3">Uit</span>

      <div class="enter"></div>
      <div class="sectie blauw">Foto's Uploaden: </div>
        <input type="file" name="fotoToUpload" id="fotoToUpload" class="instelling" accept="image/*">
        <span class="anderhalfv">2MB</span>

    <div class="enter"></div>
        <input type="submit" value="Save" name="update" class="slaOp" >
    </div>
  </form>

  </body>
</html>
