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
      include 'php/niet.php';
      include 'php/login.php';
      include 'php/get.php';
      include 'parts/cookies.php';
    ?>

    <div class="header">
      <?php
        include 'parts/header.php';
       ?>

       <form class="inlog iphone" action="" method="post" id="inlogForm">
         <input type="text" name="gebruiker" id="gebruiker" class="inlog_in" placeholder="Gebruikersnaam">
         <input type="password" name="wachtwoord" id="wachtwoord" class="inlog_in" placeholder="Wachtwoord">
         <button class="inlog_button" id="inlog_button" name="inlog_button">Inloggen</button><br>
         <button class="inlog_ver">
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

    <div class="niet" id="niet">Niet ingelogd!</div><!--niet ingelogged melding-->

    <div class="body" id="body">
      <!--De profiel pagina instellingen-->

    </div>

  </body>
</html>