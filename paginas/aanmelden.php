<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      include 'php/get.php';
      include 'php/login.php';
      include 'php/database.php';
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

    <div class="body">
      <div class="aanmelden_info grijs">Maak vrienden , stuur elkaar berichten en maak je eigen profiel.</div>
      <div class="text2 grijs">
        <div class="space"></div>
      </div>
      <div>
      </div>
      <form class="aanmelden_form" method="post">
        <?php
            if($foutMelding[9]){
                echo "<div class='foutmelding'>Je hebt geen Voornaam ingevult.</div>";
            }
         ?>
        <input type="text" name="voornaam" placeholder="Voornaam" class="aanmelden_in" value='<?php echo $sumbmited[0]; ?>'>
        <?php
            if($foutMelding[10]){
                echo "<div class='foutmelding'>Je hebt geen Achternaam ingevult.</div>";
            }
         ?>
        <input type="text" name="achternaam" placeholder="Achternaam" class="aanmelden_in" value='<?php echo $sumbmited[1]; ?>'>
        <?php
            if($foutMelding[11]){
                echo "<div class='foutmelding'>Je hebt geen woonplaats ingevult.</div>";
            }
         ?>
        <input type="text" name="woonplaats" placeholder="Woonplaats" class="aanmelden_in" value='<?php echo $sumbmited[2]; ?>'>
        <?php
            if($foutMelding[4]){
                echo "<div class='foutmelding'>Geen geboortedatum ingevult.</div>";
            }
        ?>
        <input type="date" name="geboortedatum" placeholder="Geboortedatum"class="aanmelden_in" value='<?php echo $sumbmited[3]; ?>'>
        <?php
            if($foutMelding[6]){
                echo "<div class='foutmelding'>Geen gebruikersnaam ingevult.</div>";
            }
            elseif ($foutMelding[5]) {
                echo "<div class='foutmelding'>Je gebruikersnaam is te lang.</div>";
            }
            elseif ($foutMelding[7]) {
                echo "<div class='foutmelding'>De gebruikersnaam is all in gebruik.</div>";
            }
        ?>
        <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam"class="aanmelden_in" value='<?php echo $sumbmited[4]; ?>'>
        <?php
            if($foutMelding[1]){
                echo "<div class='foutmelding'>Geen of geen goede Email ingevult.</div>";
            }
            elseif ($foutMelding[8]) {
              echo "<div class='foutmelding'>Email is all ingebruik.</div>";
            }
        ?>
        <input type="email" name="email" placeholder="Email"class="aanmelden_in" value='<?php echo $sumbmited[5]; ?>'>
        <input type="radio" name="gender" value="1" class="aanmelden_in gender" checked >Man
        <input type="radio" name="gender" value="0" class="aanmelden_in gender">Vrouw

        <input type="password" name="password1" placeholder="Wachtwoord"class="aanmelden_in">
        <?php
            if($foutMelding[3]){
                echo "<div class='foutmelding'>Je wachtwoord moet 8 lang zijn met een hoofd letter en een special teken.</div>";
            }
            elseif ($foutMelding[2]) {
              echo "<div class='foutmelding'>De wachtwoorden zijn niet het zelfde.</div>";
            }
            if($foutMelding[0]){
                echo "Er is script gedetect in je inputs.";
            }
         ?>
        <input type="password" name="password2" placeholder="herhaal"class="aanmelden_in" id="wachtwoord2">

        <button type="submit" name='formSub' class='aanmelden_button2' id="button">Registreren</button>
      </form>
    </div>
  </body>
</html>
