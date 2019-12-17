<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style media="screen">
  .lingobody{
    /* background: linear-gradient(180deg, rgba(74,188,201,1) 18%, rgba(75,192,236,1) 83%);
    height: 97vh;
    width: 100vw; */
  }
  .lingoRandom{
    font-family: 'Roboto';
    position: absolute;
    left: 42.5%;
    top: 14vw;
    padding: 1.2vw;
    font-size: 3.5vw;
    font-weight: 600;
    color: white;
    background: rgba(87,201,74,1);
    border-radius: 0.5vw;
    z-index: 100;
  }
  .lingoForm{
    position: absolute;
    right: 5vw;
    top: 10vw;
  }
  .lingoInput{
    font-size: 1.5vw;
    padding: 0.3vw 1vw 0.3vw 0.5vw;
    width: 15vw;
    border: 0.2vw solid rgba(87,201,74,1);
    border-radius: 0.25vw;
  }
  .LingoButton{
    border-radius: 0.25vw;
    border:none;
    background: linear-gradient(180deg, rgba(87,201,74,1) 18%, rgba(87,236,75,1) 83%);
    color:white;
    font-size: 2vw;
    padding: 0.3vw 1vw 0.3vw 0.5vw;
    margin-left: 1vw;
  }
  .lingo{
    position: absolute;
    right: 5vw;
    top: 16vw;
    height: 20vw;
    width: auto;
    max-width: 34vw;
    font-family: 'Roboto';
  }
  .lingovak{
    position: relative;
    min-width: 5vw;
    max-width: 34vw;
    height: 4vw;
    margin-top: 0.7vw;
  }
  .lingovakje{
    text-align: center;
    position: relative;
    left: 0;
    width: 4vw;
    height: 4vw;
    padding-top: 0.5vw;
    display: inline-block;
    font-size: 2.8vw;
    font-weight: 600;
    color: white;
    margin-left: 0.1vw;
    border-radius: 0.25vw;
  }
  .vak1{
    background: linear-gradient(180deg, rgba(233,11,38,1) 29%, rgba(217,55,61,1) 91%);
  }
  .vak2{
    background: linear-gradient(180deg, rgba(93,155,233,1) 18%, rgba(16,110,184,1) 83%);
  }
  .lingostip{
    position: relative;
    width: 4vw;
    height: 3.7vw;
    padding-top: 0.3vw;
    top: -0.3vw;
    left: 0;
    border-radius: 100%;
  }
  .stip1{
    background:#EADC17;
  }
  .stip2{
    background: none;
  }

  .Bingolingo{
    font-family: 'Roboto';
    position: absolute;
    left: 35%;
    bottom: 5vw;
  }
</style>
<div class="lingobody">
  <form method="post" class="lingoForm">
    <input type="text" name="Woord" class="lingoInput" placeholder="Woord :">
    <button type="submit" name="submit" class="LingoButton">Submit</button>
    <button type="submit" name="Nieuw">Nieuw</button>
  </form>
  <?php
    error_reporting(0);
    function reload(){
      echo "<script>
                if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, window.location.href );
                }
            </script>";
    }

    // error_reporting(0);//moet nog weg
    session_start();
    include 'php/connect.php';
    // $_SESSION['pogingen'] = 5;
    echo $_SESSION['test2'];

    $woorden = [ "scherm","laptop","apple","oplader","mobiel","water","stoel","leven","school",
        			   "fles","klomp","station","muismat","tafel","ader","aftel","alert","asbak","apart","baden",
        			   "takties","stage","fiets","android","busje","zeven","letter","pinpas","barst","beren",
        			   "camper","tesla","jumbo","kernbom","voedsel","begin","bekaf","bedel","beter","stronk","stuift",
        			   "chimmel","filmen","drugs","stralen","bluft","brand","botte","brief","snijdt","spiekt","status",
        			   "pakje","bakje","zakje","hekje","koffie","vlekje","suiker","hippo","brein","schelde","slapen",
        			   "papier","deuren","rood","bloed","oortjes","muziek","broek","cloon","clown","groei","ivoor",
        			   "natrium","brand","amazone","wcroll","wcbrill","kraan","dagen","dames","struik","rugzak","schelp",
        			   "maand","maart","makker","ijzer","kooper","mosterd","rusland","dicht","dreigen","dolen","drank",
        			   "amerika","naam","geen","muismat","hyper","lange","gordijn","dwang","drupt","druif","bedrukt","ondank",
        			   "monitor","kabel","pizza","tomaat","botten","jodium","pasje","plaat","plank","proost","puppy","bedenk",
        			   "cijfer","lucht","wolken","ratten","marters","potlood","kraam","random","noord","nylon","oksel","onzin",
                 "zinken","zink","slecht","wortel","werken","stoppen","vrouw","vissen","haven","sluiten","student",
        			   "schedel","drugs","droom","eigen","etage","eraan","ezel","floss","mango","macht","maait","meten",
        			   "opium","brood","vloer","draad","walvis","handel","afval","focus","fraai","forel","nobel","nette",
        			   "leugen","donker","hakte","hamen","handen","hackt","hikte","hurkt","honing","inkom","negen","nazie",
        			   "paard","rijden","sport","toets","normaal","vinger","galgje","lichaam","fluit","moord","mixen","mixer",
        			   "flag","spanje","brood","spoor","spatie","letter","weggaan","appel","meloen","schakel","kijkt",
        			   "toren","fiets","meneer","mevrouw","gerei","globe","gilde","gozer","groen","kadet","kapel",
        			   "kikker","afval","marvel","horloge","kunst","vloer","emotie","lucht","inzet","ipods","klonk",
        			   "halfuur","groot","klein","bever","vogel","japan","actie","klikt","knaak","knars","media","meme",
                 "insect","reeling","rellen","vallen","spijker","karton","kwijt","leest","lager","leunt","lotus",
                 "pizza","adelaar"];

                 $random = Rand(0,count($woorden)-1);
                 $lengte = strlen($woorden[$random]);
                 $woordS = $_SESSION['Woord'];
                 $lengteS = $_SESSION['Lengte'];
                 $geraden = array();
                 $goed = array();
                 $raad = $_POST['Woord'];
                 $woord = ["","","","","","",""];

                 for($i=0; $i<=$lengte; $i++){
                    $woord[$i] = $woorden[$random]{$i};
                 }

                 if(isset($_POST['Nieuw'])){
                    $_SESSION['Woord'] = $woord;
                    $_SESSION['Lengte'] = $lengte;
                    $_SESSION['goed'] = $goed;
                    $_SESSION['geraden'] = $geraden;
                    $_SESSION['beurt'] = 0;
                    if($_SESSION['pogingen'] == 5){
                        $_SESSION['random'] = [Rand(0,50)];
                    }
                    else{
                        array_push($_SESSION['random'],Rand(0,50));
                    }
                    reload();
                 }
                 if(count($woordS) < 1){
                     $_SESSION['Woord'] = $woord;
                     $_SESSION['Lengte'] = $lengte;
                 }
                 else{
                    $woordS = $woord;
                    $lengteS = $lengte;
                 }

                 $woordS = $_SESSION['Woord'];
                 $goedS = $_SESSION['goed'];
                 $geradenS = $_SESSION['geraden'];
                 $beurt = $_SESSION['beurt'];

                 if(isset($_POST['submit'])){
                     if($beurt < 5){
                         if(!$beurt == 0){
                            $tijdelijk = $goedS[$beurt-1];
                            $tijdelijk2 = $geradenS[$beurt-1];
                         }
                         else{
                             $tijdelijk = [1,0,0,0,0,0,0];
                             $tijdelijk2 = [$woordS[0],"-","-","-","-","-","-"];
                         }
                         $_SESSION['beurt'] ++;
                         $beurtS = $_SESSION['beurt'];

                         for($i=0; $i<=$lengteS; $i++){
                            if($raad{$i} == $woordS[$i]){
                                $tijdelijk[$i] = 1;
                                $tijdelijk2[$i] = $raad{$i};
                            }
                            else{
                                for($b=0; $b<=$lengteS; $b++){
                                    if($raad{$i} == $woordS[$b]){
                                        $tijdelijk[$i] = 2;
                                        $tijdelijk2[$i] = $raad{$i};
                                    }
                                }
                            }
                         }

                         array_push($goedS,$tijdelijk);
                         array_push($geradenS,$tijdelijk2);

                         $_SESSION['goed'] = $goedS;
                         $_SESSION['geraden'] = $geradenS;
                     }
                     else{
                       $_SESSION['pogingen'] --;
                     }
                     reload();
                 }

                 $beurtS = $_SESSION['beurt'];
                 $goedS = $_SESSION['goed'];
                 $geradenS = $_SESSION['geraden'];
                 $lengteS = $_SESSION['Lengte'];
                 $goedS = $_SESSION['goed'];

                 // print_r($_SESSION['pogingen']);
                 // print_r($woordS);
                 // echo "<br> Beurt: ".$beurtS;

                 $tell = 0;
                 for($c=0; $c<=$lengteS-1; $c++){
                   if($goedS[$beurtS-1][$c] == 1){
                     $tell++;
                   }
                 }
    ?>

    <div class="lingo">
      <?php
          if($tell == $lengteS){
            echo "Door naar de volgende ?";
          }
          if($beurtS == 0){
              echo "<div class='lingovakje vak1'><div class='lingostip stip2'>".strtoupper($woordS[0])."</div></div>";
              for($i=1; $i<=$lengteS-1; $i++){
                  echo "<div class='lingovakje vak2'><div class='lingostip stip2'>".strtoupper("-")."</div></div>";
              }
          }
          else{
              for($b=1; $b<=$beurtS; $b++){
                  echo "<div class='lingovak'>";
                  for($i=0; $i<=$lengteS-1; $i++){
                      if($goedS[$b-1][$i] == 1){
                          echo "<div class='lingovakje vak1'><div class='lingostip stip2'>".strtoupper($geradenS[$b-1][$i])."</div></div>";
                      }
                      if ($goedS[$b-1][$i] == 2) {
                          echo "<div class='lingovakje vak2'><div class='lingostip stip1'>".strtoupper($geradenS[$b-1][$i])."</div></div>";
                      }
                      if ($goedS[$b-1][$i] == 0) {
                          echo "<div class='lingovakje vak2'><div class='lingostip stip2'>".strtoupper($geradenS[$b-1][$i])."</div></div>";
                      }
                  }
                  echo "</div>";
              }
          }
       ?>
    </div>
    <?php
      if($tell == $lengteS){
        echo "<div class='lingoRandom'>$random</div>";
        $_SESSION['pogingen'] --;
      }

     ?>

    <div class="Bingolingo">
      <?php
          $tell = 0;
          for($b=0; $b<=4; $b++){
              echo "<div class='lingovak'>";
              for($i=0; $i<=4; $i++){
                  $tell ++;
                  echo "<div class='lingovakje vak2'><div class='lingostip stip2'>".$tell."</div></div>";
              }
              echo "</div>";
          }
       ?>
    </div>
  </div>
