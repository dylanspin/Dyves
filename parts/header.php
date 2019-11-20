
<!--nieuws sectie-->

<div class="header_buttons">
  <div class="header_div">HOOFD MENU</div>
  <span class="blauw">
    <div class="header_div">
      Vrienden
      <div class="overlay iphone twee">
        <button class="overlay_button tweeBu">
          <i class="fa fa-list icon"></i><div class="textbutton blauw">Vrienden beheeren</div>
        </button>
        <button class="overlay_button tweeBu">
          <i class="fa fa-calendar icon"></i><div class="textbutton blauw">Vrienden verjaardag</div>
        </button>
        <button class="overlay_button tweeBu" onclick="goto('zoeken')">
          <i class="fa fa-plus icon"></i><div class="textbutton blauw">Vrienden toevoegen</div>
        </button>
      </div>
    </div>
    <div class="header_div">
      Agenda
      <div class="overlay iphone twee">
        <button class="overlay_button tweeBu">
          <i class="fa fa-calendar icon"></i><div class="textbutton blauw">Vrienden verjaardag</div>
        </button>
        <button class="overlay_button tweeBu">
          <i class="fa fa-plus icon"></i><div class="textbutton blauw">Persoonlijk</div>
        </button>
      </div>
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
    <div class="header_div">
      Nieuws
      <div class="overlay iphone">
        <button class="overlay_button">
          <i class="fa fa-newspaper-o icon"></i><div class="textbutton blauw">nieuws</div>
        </button>
        <button class="overlay_button">
          <i class="fa fa-credit-card icon"></i><div class="textbutton blauw">Finacieel</div>
        </button>
        <button class="overlay_button">
          <i class="fa fa-futbol-o icon"></i><div class="textbutton blauw">Sport</div>
        </button>
        <button class="overlay_button">
          <i class="fa fa-clock-o icon"></i><div class="textbutton blauw">Recent</div>
        </button>
      </div>
    </div>

    <div class="header_div iphone">
      Meer...
      <div class="overlay">
        <button class="overlay_button">
          <i class="fa fa-square icon"></i><div class="textbutton blauw">meldingen</div>
        </button>
        <button class="overlay_button">
          <i class="fa fa-square icon"></i><div class="textbutton blauw"><a href="index.php">Menu</a></div>
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
        <button class="overlay_button">
          <i class="fa fa-square icon"></i><div class="textbutton blauw">Nog</div>
        </button>
        <button class="overlay_button">
          <i class="fa fa-square icon"></i><div class="textbutton blauw">Nog</div>
        </button>
      </div>
    </div>

    <?php
      if($_COOKIE["wachtwoordCheck"] == "true"){
     ?>
        <div class="header_div iphone uitlogg" id="profiel">
          <div class="uitlogimg">
            <img src="pic/profilepics/<?php echo $liveFoto ?>" class="nieuws_img">
          </div><div class="naam"><?php echo $gebruikersnaam_; ?></div>
          <div class="overlay">
            <button class="overlay_button" onclick="goto('profiel')">
              <i class="fa fa-user icon"></i><div class="textbutton blauw">Profiel</div>
            </button>
            <button class="overlay_button" onclick="goto('instellingen')">
              <i class="fa fa-cog icon"></i><div class="textbutton blauw">Instellingen</div>
            </button>
            <form action="" method="post" class="uitlog">
              <button class="overlay_button" name="uitloggen">
                <i class="fa fa-sign-out icon"></i><div class="textbutton blauw">Uitloggen</div>
              </button>
            </form>
          </div>
        </div>
    <?php
      }
     ?>


  </span>
</div>
