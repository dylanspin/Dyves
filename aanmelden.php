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
  <body onload="checkCookie() , checkdouble() , aangemeld()">
    <?php
      include 'php/login.php';
      include 'php/aanmelden.php';
      include 'parts/cookies.php';
    ?>

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

    <div class="body">
      <div class="aanmelden_info grijs">Maak een account voor Dyves Dylan1!</div>

      <div class="text2 grijs">
        <div class="space"></div>
        <!-- Maak vrienden , stuur elkaar berichten en maak je eigen profiel. -->
      </div>
      <div>
      </div>

      <form class="aanmelden_form" method="post">
        <input type="text" name="voornaam" placeholder="Voornaam" class="aanmelden_in" id="naam">
        <label class="label"><i class="fa fa-exclamation-circle fa-3x" id="0"></i></label>

        <input type="text" name="achternaam" placeholder="Achternaam" class="aanmelden_in" id="achternaam">
        <label class="label"><i class="fa fa-exclamation-circle fa-3x" id="1"></i></label>

        <input type="text" name="woonplaats" placeholder="Woonplaats" class="aanmelden_in" id="woonplaats">
        <label class="label"><i class="fa fa-exclamation-circle fa-3x" id="2"></i></label>

        <input type="date" name="geboortedatum" placeholder="Geboortedatum"class="aanmelden_in" id="geboortedatum">
        <label class="label"><i class="fa fa-exclamation-circle fa-3x" id="3"></i></label>

        <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam"class="aanmelden_in" id="gebruikersnaam">
        <label class="label"><p id="4"></p></label>

        <input type="email" name="email" placeholder="Email"class="aanmelden_in" id="email">
        <label class="label"><i class="fa fa-exclamation-circle fa-3x text_form" id="5"></i></label>

        <input type="radio" name="gender" value="1" class="aanmelden_in gender" checked >Man
        <input type="radio" name="gender" value="0" class="aanmelden_in gender">Vrouw

        <label class="label"><i class="fa fa-exclamation-circle fa-3x text_form" id="10"></i></label>

        <input type="password" name="password1" placeholder="Wachtwoord"class="aanmelden_in"id="wachtwoord1">
        <label class="label"><p id="6"></p></label>

        <input type="password" name="password2" placeholder="herhaal"class="aanmelden_in" id="wachtwoord2">
        <label class="label"><p id="7"></p></label>

        <button type="button"name='formSub' class='aanmelden_button2' onclick='aanmelden()' id="button">Registreren</button>
      </form>
    </div>
  </body>
</html>
