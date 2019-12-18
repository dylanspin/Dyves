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
      // include 'php/get.php';
      include 'php/foto.php';
      include 'php/Artikel.php';
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
        <div class="sectie blauw">Artikel Foto: </div>
          <input type="file" name="artikel_foto" id="artikel_foto" class="instelling" accept="image/*">
          <span class="anderhalfv">2MB</span>

      <div class="enter"></div>
      <div class="sectie blauw">Artikel: </div>
        <div class="intellinginner">
          <label class="instelLabel">Title</label><input type="text" name="ArtikelTitle" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Text</label><textarea type="text" rows="5" cols="80" name="ArtikelText" class="instelling articleText"></textarea>
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Label</label><input type="text" name="ArtikelLabel" class="instelling">
        </div>

      <div class="enter"></div>
      <div class="sectie blauw">Publish: </div>
        <label class="instelLabel">Status</label><!--Moet van het artikel status krijgen-->
        <input type="radio" name="AanArtikel" value="1" class="instellingRadio" checked>
        <span class="text3">Aan</span>
        <input type="radio" name="AanArtikel" value="0" class="instellingRadio">
        <span class="text3">Uit</span>


      <div class="enter"></div><!--Moet nog met php-->
      <div class="sectie blauw">Layouts: </div>
      <input type="hidden" name="Hidden" value="" id="Hidden">
      <div class="themas">
        <?php //Layouts ?>
      </div>

    <div class="enter"></div>
        <input type="submit" value="Post" name="Post" class="slaOp" >
    </div>

  </form>

  </body>
</html>
