<?php
  include 'php/headerNaam.php';
?>
<div class="header_buttons">
  <div class="header_div">Hoofd Menu</div>
  <span class="blauw">
    <div class="header_div">
      Vrienden
      <form class="overlay iphone twee" method="post">
        <button class="overlay_button tweeBu" type="submit" name="vrienden">
          <i class="fa fa-list icon"></i><div class="textbutton blauw">Vrienden beheeren</div>
        </button>
        <button class="overlay_button tweeBu" type="submit" name="zoeken">
          <i class="fa fa-plus icon"></i><div class="textbutton blauw">Vrienden toevoegen</div>
        </button>
      </form>
    </div>
    <div class="header_div">
      Agenda
      <form class="overlay iphone twee" method="post">
        <button class="overlay_button tweeBu" type="submit" name="Agenda">
          <i class="fa fa-calendar icon"></i><div class="textbutton blauw">Agenda</div>
        </button>
      </form>
    </div>
    <div class="header_div iphone">
      Games
      <div class="overlay iphone">
        <button class="overlay_button tweeBu">
          <i class="fa fa-gamepad icon"></i><div class="textbutton blauw">overzicht</div>
        </button>
        <button class="overlay_button tweeBu">
          <i class="fa fa-heart icon"></i><div class="textbutton blauw">Favoriete</div>
        </button>
        <button class="overlay_button tweeBu">
          <i class="fa fa-users icon"></i><div class="textbutton blauw">social</div>
        </button>
      </div>
    </div>
    <form class="header_div" method="post">
      Nieuws
      <div class="overlay iphone">
        <button class="overlay_button" type="submit" name="Nieuws" value="nieuws">
          <i class="fa fa-newspaper-o icon"></i><div class="textbutton blauw">nieuws</div>
        </button>
        <button class="overlay_button" type="submit" name="Nieuws" value="Financieel">
          <i class="fa fa-credit-card icon"></i><div class="textbutton blauw">Financieel</div>
        </button>
        <button class="overlay_button" type="submit" name="Nieuws" value="Sport">
          <i class="fa fa-futbol-o icon"></i><div class="textbutton blauw">Sport</div>
        </button>
      </div>
    </form>

    <div class="header_div iphone">
      Meer...
      <form class="overlay" method="post">
        <button class="overlay_button" type="submit" name="Menu">
          <i class="fa fa-square icon"></i><div class="textbutton blauw">Menu</div>
        </button>
        <?php
          if($current=="Dylanspin"){
            echo "<button class='overlay_button' type='submit' name='backend'>
                    <i class='fa fa-square icon'></i><div class='textbutton blauw'>backend</div>
                  </button>";
          }
         ?>
        <button class="overlay_button">
          <i class="fa fa-square icon"></i><div class="textbutton blauw">Nog</div>
        </button>
        <button class="overlay_button">
          <i class="fa fa-square icon"></i><div class="textbutton blauw">Nog</div>
        </button>
        <button class="overlay_button">
          <i class="fa fa-square icon"></i><div class="textbutton blauw">Nog</div>
        </button>
        <button class="overlay_button">
          <i class="fa fa-square icon"></i><div class="textbutton blauw">Nog</div>
        </button>
        <button class="overlay_button">
          <i class="fa fa-square icon"></i><div class="textbutton blauw">Nog</div>
        </button>
      </form>
    </div>

    <?php
      if($_SESSION["wachtwoordCheck"] == "true"){
     ?>
        <form class="header_div iphone uitlogg" id="profiel" method="post">
          <div class="uitlogimg">
            <div class="meldingIcon"></div>
            <img src="pic/profilepics/<?php echo $liveFoto2?>" class="nieuws_img">
          </div>
          <div class="naam"><?php echo $gebruikersnaam2_; ?></div>
          <div class="overlay">
            <button class="overlay_button"name="Profiel" type="submit">
              <i class="fa fa-user icon"></i><div class="textbutton blauw">Profiel</div>
            </button>
            <button class="overlay_button" name="Meldingen" type="submit">
              <i class="fa fa-bell icon melding_"></i><div class="textbutton blauw">meldingen</div>
            </button>
            <button class="overlay_button" type="submit" name="instellingen">
              <i class="fa fa-cog icon"></i><div class="textbutton blauw">Instellingen</div>
            </button>
            <div action="" method="post" class="uitlog">
              <button class="overlay_button" name="uitloggen">
                <i class="fa fa-sign-out icon"></i><div class="textbutton blauw">Uitloggen</div>
              </button>
            </div>
          </form>
        </div>
    <?php
      }
     ?>


  </span>
</div>
