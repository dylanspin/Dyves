
<?php
    if($_COOKIE["wachtwoordCheck"] != "true"){
      echo "
      <form class='aanmelden iphone' id='aanmeldVak' method='post'>
          <button type='submit' name='Aanmelden' class='aanmelden_button'>
            Geen account? Meld je gratis aan!
          </button><br>
          <button class='inlog_ver'>
            <span class='blauw'>Vragen of hulp nodig ?</span>
          </button>
        </div>
      </form>";
    }
    elseif ($_COOKIE["wachtwoordCheck"] == "false") {
      echo "
       <form class='aanmelden iphone' id='aanmeldVak' method='post'>
          <button type='submit' name='Aanmelden'class='aanmelden_button'>
            Geen account? Meld je gratis aan!
          </button><br>
          <button class='inlog_ver'>
            <span class='blauw'>Vragen of hulp nodig ?</span>
          </button>
        </div>
      </form>";
    }

 ?>
