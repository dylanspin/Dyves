
<?php
    if($_COOKIE["wachtwoordCheck"] != "true"){
      echo "
      <div class='aanmelden iphone' id='aanmeldVak'>
          <button class='aanmelden_button'>
            <a href='aanmelden.php'>Geen account? Meld je gratis aan!</a>
          </button><br>
          <button class='inlog_ver'>
            <span class='blauw'>Vragen of hulp nodig ?</span>
          </button>
        </div>
      </div>";
    }
    elseif ($_COOKIE["wachtwoordCheck"] == "false") {
      echo "
       <div class='aanmelden iphone' id='aanmeldVak'>
          <button class='aanmelden_button'>
            <a href='aanmelden.php'>Geen account? Meld je gratis aan!</a>
          </button><br>
          <button class='inlog_ver'>
            <span class='blauw'>Vragen of hulp nodig ?</span>
          </button>
        </div>
      </div>";
    }

 ?>
