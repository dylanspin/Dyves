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
      include 'php/change.php';
      include 'php/foto.php';
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
          Back end Dyves
      </div>

      <form class="intellingenForm" method="post" enctype="multipart/form-data">

      <div class="enter"></div>
      <div class="sectie blauw">Backend: </div>
      <div class="intellinginner">
        <label class="instelLabel">Admins</label><input type="text" name="Admins" class="instelling">
      </div>
      <div class="intellinginner">
        <label class="instelLabel">DeleteAdmin</label><input type="text" name="DeleteAdmin" class="instelling">
      </div>

      <div class="enter"></div>
      <div class="sectie blauw">Spotlight Movies: </div>
        <label class="instelLabel">Film</label><input type="text" name="Film" value="" class="instelling">
        <label class="instelLabel">Status</label>
        <input type="radio" name="AanSpotFilms" value="1" class="instellingRadio"<?php if(true){echo "checked";}?>>
        <span class="text3">Aan</span>
        <input type="radio" name="AanSpotFilms" value="0" class="instellingRadio"<?php if(!true){echo "checked";}?>>
        <span class="text3">Uit</span>

        <div class="enter"></div>
        <div class="sectie blauw">Weer </div>
          <label class="instelLabel">Api</label><input type="text" name="Film" value="" class="instelling">
          <label class="instelLabel">Status</label>
          <input type="radio" name="AanWeer" value="1" class="instellingRadio"<?php if(true){echo "checked";}?>>
          <span class="text3">Aan</span>
          <input type="radio" name="AanWeer" value="0" class="instellingRadio"<?php if(!true){echo "checked";}?>>
          <span class="text3">Uit</span>

      <div class="enter"></div>
      <button type="Submit" name="Polls" value="Polls" class="sectie blauw underline">Polls <i class="fa fa-plus"></i></button>
        <div class="themas">
          <?php
            $sql = "SELECT Naam,Id FROM `poll`;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $vraagPoll = $row['Naam'];
                $IdPoll = $row['Id'];
                echo "<button type='submit' name='Pollset' class='Polls anderhalfv' value='$IdPoll'>$vraagPoll</button>";
              }
            }
         ?>
        </div>

      <div class="enter"></div>
      <button type="Submit" name="Artikel" value="Artikel" class="sectie blauw underline">Artikelen <i class="fa fa-plus"></i></button>
        <div class="themas">
          <?php
            $sql = "SELECT Artikel,Id FROM `artikels`;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                substr($ArtikelNaam = $row['Artikel'], 0, 10);
                $IdArtikel = $row['Id'];
                echo "<button type='submit' name='Artikelset' class='Polls anderhalfv' value='$IdArtikel'>$ArtikelNaam</button>";
              }
            }
          ?>
        </div>

      <div class="enter"></div>
          <input type="submit" value="Save" name="update" class="slaOp" >
      </div>

  </form>



  </body>
</html>
