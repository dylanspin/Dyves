<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dyves</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
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
      include 'php/Poll.php';
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
      <div class="sectie blauw">Poll: </div>
        <div class="intellinginner">
          <label class="instelLabel">Vraag Poll</label><input type="text" name="PollTitle" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Antwoord-1</label><input type="text" name="Vraag1" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Antwoord-2</label><input type="text" name="Vraag2" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Antwoord-3</label><input type="text" name="Vraag3" class="instelling">
        </div>
        <div class="intellinginner">
          <label class="instelLabel">Antwoord-4</label><input type="text" name="Vraag4" class="instelling">
        </div>

      <div class="enter"></div>
      <div class="sectie blauw">Publish: </div>
        <label class="instelLabel">Status</label><!--Moet van het artikel status krijgen-->
        <input type="radio" name="AanPoll" value="1" class="instellingRadio" checked>
        <span class="text3">Aan</span>
        <input type="radio" name="AanPoll" value="0" class="instellingRadio">
        <span class="text3">Uit</span>

        <input type="submit" value="Post" name="Post" class="slaOp" >
    </div>

  </form>

  </body>
</html>
