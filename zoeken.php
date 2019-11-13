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
  <body onload="checkCookie(true)">
    <?php
      include 'php/login.php';
      include 'php/uitloggen.php';
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
         <button class="inlog_ver" name="wachtwoordVer">
           <span class="blauw">Wachtwoord Vergeten ?</span>
         </button>
         <div class="fout text2" id="fout"></div>
       </form>
       <form action="" method="post">
         <button class="uitloggen blauw underline" name="uitloggen">Uitloggen</button>
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

    <div class="body" id="">
      <div class="kop">
        <span class="blauw">Zoek</span> Accounts
      </div>






      <div class="aanmelden iphone" id="aanmeldVak">
        <button class="aanmelden_button">
          <a href="aanmelden.php">Geen account? Meld je gratis aan!</a>
        </button><br>
        <button class="inlog_ver">
          <span class="blauw">Vragen of hulp nodig ?</span>
        </button>
      </div>
    </div>
    <?php
      include 'parts/footer.php';
     ?>
  </body>
</html>