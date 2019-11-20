
<?php

  if($_COOKIE["wachtwoordCheck"] != "true"){
    echo "
    <form class='inlog iphone' action='' method='post' id='inlogForm'>
      <input type='text' name='gebruiker' id='gebruiker' class='inlog_in' placeholder='Gebruikersnaam'>
      <input type='password' name='wachtwoord' id='wachtwoord' class='inlog_in' placeholder='Wachtwoord'>
      <button class='inlog_button' id='inlog_button' name='inlog_button'>Inloggen</button><br>
      <button class='inlog_ver'>
        <span class='blauw'>Wachtwoord Vergeten ?</span>
      </button>
      <div class='fout text2' id='fout'></div>
    </form>";
  }
  elseif ($_COOKIE["wachtwoordCheck"] == "false") {
    echo "
    <form class='inlog iphone' action='' method='post' id='inlogForm'>
      <input type='text' name='gebruiker' id='gebruiker' class='inlog_in' placeholder='Gebruikersnaam'>
      <input type='password' name='wachtwoord' id='wachtwoord' class='inlog_in' placeholder='Wachtwoord'>
      <button class='inlog_button' id='inlog_button' name='inlog_button'>Inloggen</button><br>
      <button class='inlog_ver'>
        <span class='blauw'>Wachtwoord Vergeten ?</span>
      </button>
      <div class='fout text2' id='fout'></div>
    </form>";
  }


?>
