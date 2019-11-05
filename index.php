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
  <body onload="checkCookie()">

    <div class="cookie" id="cookie">
      Dyves kan cookies gebruiken. Klik
      <span class="iphone">
        <button class="cookie_button">Hier</button> voor meer informatie.
      </span>
      <button class="cookie_button" onclick="cookies()">Sluiten</button>
    </div>

    <div class="header">
      <div class="header_buttons">
        <div class="header_div">Nu & Straks</div>
        <span class="blauw">
          <div class="header_div">vrienden</div>
          <div class="header_div">agenda</div>
          <div class="header_div">games</div>
          <div class="header_div">Nieuws</div>
          <div class="header_div iphone">meer...</div>
        </span>
      </div>
      <div class="inlog iphone" id='inlog_div'> <!--Moet nog anders voor mobile met een mobile menu-->
        <input type="text" name="gebruiker" id="gebruiker" class="inlog_in">
        <input type="password" name="wachtwoord" id="wachtwoord" class="inlog_in">
        <button class="inlog_button" id="inlog_button" name="inlog_button">Inloggen</button><br>
        <button class="inlog_ver">
          <span class="blauw">Wachtwoord Vergeten ?</span>
        </button>
      </div>
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
      <div class="kop">
        <span class="blauw">Nu</span> Meest Besproken
      </div>

      <div class="niews">
        <div class="links" onclick="schuif(1,20)">
          <img src="pic/nieuws/nieuws1.jpg" class="nieuws_img">
          <div class="uitschuif" id="info1">
              Defensie erkent burgerdoden F-16-aanval Irak
          </div>
        </div>

        <div class="rechts" onclick="schuif(2,62)">
          <img src="pic/nieuws/nieuws2.jpg" class="nieuws_img">
          <div class="uitschuif" id="info2">
            Waar komt deze gigantische waterstraal vandaan?
          </div>
        </div>
        <div class="space"></div>
        <div class="rechts" onclick="schuif(3,45)">
          <img src="pic/nieuws/nieuws3.jpg" class="nieuws_img">
          <div class="uitschuif" id="info3">
              Komt er nog een vervolg van de joker film?
          </div>
        </div>
      </div>

      <div class="nieuws_sec">
        <span class="text">Laatste nieuws</span>
        <hr>
        <div class="space"></div>
        <div class="artikel">
          <img src="pic/nieuws/nieuws3.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">14:00</div>
            <span class="underline blauw">
              De nieuwe joker film is uit
            </span>
          </div>
        </div>
        <div class="artikel">
          <img src="pic/nieuws/nieuws2.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">11:22</div>
            <span class="underline blauw">
              Gigantische waterstraal in Philadelphia
            </span>
          </div>
        </div>
        <div class="artikel">
          <img src="pic/nieuws/nieuws1.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">11:30</div>
            <span class="underline blauw">
              Defensie erkent burgerdoden <span class="iphone">F-16-aanval Irak</span>
            </span>
          </div>
        </div>
        <div class="artikel">
          <img src="pic/nieuws/nieuws4.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">10:05</div>
            <span class="underline blauw">
              Zo denkt Redbull dat Ferrari valspeelt
            </span>
          </div>
        </div>
        <div class="artikel">
          <img src="pic/nieuws/nieuws5.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">09:45</div>
            <span class="underline blauw">
              Vodafoneziggo hoeft gegevens niet af te staan
            </span>
          </div>
        </div>
        <div class="artikel">
          <img src="pic/nieuws/nieuws6.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">09:40</div>
            <span class="underline blauw">
              De quota arbeidsmigranten buiten de EU
            </span>
          </div>
        </div>
      </div>



      <div class="poll"> <!--moet nog met een js of met php gedaan worden-->
        <span class="text">Wat vind jij ?</span>
        <hr>
        <div class="space"></div>
        <span class="text2">Heb jij een kaartje gekocht voor het concert van Justin Bieber</span>

        <div class="procent">
          <div class="blauw">9.7% </div><div class="pol_info">Ja, ik was er snel bij en heb er een weten te bemachtingen</div>
          <!-- <div class="procentages"></div> -->
        </div>
        <div class="procent">
          <div class="blauw">6.3% </div><div class="pol_info">Nee, het is me helaas niet meer gelukt om er een op de kop te tikken</div>
        </div>
        <div class="procent">
          <span class="blauw">23.1% </span>Nee, want ik heb niet zoveel met zijn muziek
        </div>
        <div class="procent">
          <span class="blauw">60.9% </span>Nee, want ik haat Justin Bieber
        </div>
        <div class="space"></div>

        <button class="inlog_ver">
          <span class="blauw">Lees meer of discussieer mee</span>
        </button>
      </div>



      <div class="weer">
        <span class="text">Weer in nederland</span>
        <div class="space"></div>

        <div class="dagen">
          <div class="center">
            <span class="text2">Maandag</span>
            <div class="dag" id="temp">12°</div>
            <div class="nacht" id="temp2">1°</div>
          </div>
        </div>
        <div class="dagen">
          <div class="center">
            <span class="text2">Dinsdag</span>
            <div class="dag" id="temp3">14°</div>
            <div class="nacht" id="temp4">4°</div>
          </div>
        </div>
        <div class="dagen">
          <div class="center">
            <span class="text2">Woensdag</span>
            <div class="dag" id="temp5">16°</div>
            <div class="nacht" id="temp6">1°</div>
          </div>
        </div>
        <div class="dagen">
          <div class="center">
            <span class="text2">Donderdag</span>
            <div class="dag" id="temp7">14°</div>
            <div class="nacht" id="temp8">2°</div>
          </div>
        </div>
        <div class="space"></div>
        <button class="inlog_ver">
          <span class="blauw">Bekijk de radarbeelden</span>
        </button>
      </div>



      <div class="vandaag iphone">
        <span class="text">Spotlight films</span>
        <hr>
        <div class="films">
          <img src="pic/films/m1.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">5-11-2019</div>
            <div class="space"></div>
            <span class="underline blauw">
              Ready Player One
            </span>
          </div>
        </div>
        <hr>
        <div class="films">
          <img src="pic/films/m2.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">5-11-2019</div>
            <div class="space"></div>
            <span class="underline blauw">
              The Joker movie
            </span>
          </div>
        </div>
        <hr>
        <div class="films">
          <img src="pic/films/m3.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">5-10-2019</div>
            <div class="space"></div>
            <span class="underline blauw">
              Vacation
            </span>
          </div>
        </div>
        <hr>
        <div class="films">
          <img src="pic/films/m5.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">5-9-2019</div>
            <div class="space"></div>
            <span class="underline blauw ">
              White boy Ricky
            </span>
          </div>
        </div>
        <hr>
        <div class="films">
          <img src="pic/films/m7.jpg" class="artikel_foto">
          <div class="artikel_text">
            <div class="datum">5-9-2019</div>
            <div class="space"></div>
            <span class="underline blauw ">
              Dunkirk
            </span>
          </div>
        </div>

      </div>



      <div class="recentchat">
        <span class="text">Latest post</span>
        <hr>
      </div>

      <div class="aanmelden iphone">
        <button class="aanmelden_button">Geen account? Meld je gratis aan!</button><br>
        <button class="inlog_ver">
          <span class="blauw">Vragen of hulp nodig ?</span>
        </button>
      </div>

    </div>

  </body>
</html>
