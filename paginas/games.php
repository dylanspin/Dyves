<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form class="inlog iphone" action="" method="post">
      <input type="text" name="gebruiker" id="gebruiker" class="inlog_in">
      <input type="password" name="wachtwoord" id="wachtwoord" class="inlog_in">
      <button class="inlog_button" id="inlog_button" name="inlog_button">Inloggen</button><br>
      <button class="inlog_ver">
        <span class="blauw">Wachtwoord Vergeten ?</span>
      </button>
    </form>
    <?php
      include 'php/login.php';
    ?>

  </body>
</html>
