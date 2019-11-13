<?php
  error_reporting(0);
  include 'block.php';
?>
<script>
  function aanmelden(){

    var naam = document.getElementById('naam').value;
    var achternaam = document.getElementById('achternaam').value;
    var woonplaats = document.getElementById('woonplaats').value;
    var geboortedatum = document.getElementById('geboortedatum').value;
    var gebruikersnaam = document.getElementById('gebruikersnaam').value;
    var email = document.getElementById('email').value;
    var wachtwoord1 = document.getElementById('wachtwoord1').value;
    var wachtwoord2 = document.getElementById('wachtwoord2').value;
    var i;
    var goed = 0;

    var check1 = /^[a-z ,.'-]+$/i;//standaard check
    var check2 = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/i;//wachtwoord regex
    var check3 = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;//email regex

    var checks = [(check1.test(naam)),(check1.test(achternaam)),(check1.test(woonplaats)),false,true,(check3.test(email)),false,false];

    if(geboortedatum.length > 8){
      checks[3] = true;
    }
    else{
      checks[3] = false;
    }

    if(wachtwoord1 == wachtwoord2){
      if((check2.test(wachtwoord1)) || (check2.test(wachtwoord2))){
        checks[6] = true;
        checks[7] = true;
      }
      else{
        document.getElementById('6').innerHTML = "<div class='inner'>Wachtwoorden zijn het zelfde maar niet goed</div>";
        document.getElementById('7').innerHTML = "<div class='inner'>Wachtwoorden zijn het zelfde maar niet goed</div>";
        checks[6] = false;
        checks[7] = false;
      }
    }
    else{
      checks[6] = false;
      checks[7] = false;
      document.getElementById('6').innerHTML = "<div class='inner'>Wachtwoorden zijn niet het zelfde</div>";
      document.getElementById('7').innerHTML = "<div class='inner'>Wachtwoorden zijn niet het zelfde</div>";
    }

    if(gebruikersnaam.length > 30){
      checks[4] = false;
      document.getElementById('4').innerHTML = "<div class='inner'>Langer dan 30 letters</div>";
    }
    else{
      if(gebruikersnaam.length < 1){
        checks[4] = false;
        document.getElementById('4').innerHTML = "<div class='inner'>Geen gebruikers naam</div>";
      }
    }


    for(i=0; i<=7; i++){
      if(checks[i]){
        checks[i] = false;//reset checks
        goed ++;
        document.getElementById(i).style.visibility = "hidden";
      }
      else{
        checks[i] = false; //reset checks
        document.getElementById(i).style.visibility = "visible";
      }
    }

    if(goed == 8){
      goed = 0;//reset goed
      document.getElementById('button').setAttribute('type', 'submit'); //set de button naar submit
      <?php
        include 'database.php';
       ?>
    }
    else{
      goed = 0;//reset goed
    }
  }
</script>
<?php  ?>
