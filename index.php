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
  <body onload="checkCookie()">
    <?php
      include 'php/login.php';
      include 'php/mail.php';
    ?>

    <div class="cookie" id="cookie">
      Dyves kan cookies gebruiken. Klik
      <span class="iphone">
        <button class="cookie_button">Hier</button> voor meer informatie.
      </span>
      <button class="cookie_button" onclick="cookies()">Sluiten</button>
    </div>

    <div class="header">
      <?php
        include 'parts/header.php';
       ?>

       <form class="inlog iphone" action="" method="post" id="inlogForm">
         <input type="text" name="gebruiker" id="gebruiker" class="inlog_in">
         <input type="password" name="wachtwoord" id="wachtwoord" class="inlog_in">
         <button class="inlog_button" id="inlog_button" name="inlog_button">Inloggen</button><br>
         <button class="inlog_ver" name="wachtwoordVer">
           <span class="blauw">Wachtwoord Vergeten ?</span>
         </button>
         <div class="fout text2" id="fout"></div>
       </form>
      <div class="searchbar">
        <div class="logotext">
          Tyves
        </div>
        <div class="search">
          <input type="text" class="header_in" id="header">
          <label>
            <i class="fa fa-search fa-1x" onclick="search()"></i>
          </label>
        </div>
      </div>
    </div>

    <div class="body">
      <div class="kop">
        <span class="blauw">Nu</span> Meest Besproken
      </div>

      <div class="niews">
        <?php
          include 'parts/nieuws.php';
         ?>
      </div>

      <div class="nieuws_sec">
        <?php
          include 'parts/latest.php';
        ?>
      </div>

      <div class="poll">
        <?php
          include 'parts/poll.php';
        ?>
      </div>

      <div class="weer">
        <?php
          include 'parts/weer.php';
        ?>
      </div>

      <div class="vandaag iphone">
        <?php
          include 'parts/films.php';
        ?>
      </div>

      <div class="recentchat">
        <span class="text">Latest post</span>
        <hr>
      </div>

      <div class="aanmelden iphone">
        <button class="aanmelden_button">Geen account? Meld je gratis aan!</button><br>
        <button class="inlog_ver">
          <span class="blauw">Vragen of hulp nodig ?</span>
        </button>
      </div>

    </div>

  </body>
</html>
