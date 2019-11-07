
<?php
  include 'connect.php';

  if(isset($_POST['formSub'])){
    $naam =  $_POST['naam'];
    echo $naam;
  }
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

  var checks = [(check1.test(naam)),(check1.test(achternaam)),(check1.test(woonplaats)),false,false,(check3.test(email)),false,false];

  if(gebruikersnaam.length >30){
    checks[4] = false;
  }
  else{
    if(gebruikersnaam.length > 1){
      checks[4] = true;
    }
  }
  if(geboortedatum.length > 8){
    checks[3] = true;
  }
  else{
    checks[3] = false;
  }

  if(wachtwoord1 == wachtwoord2){
    if((check2.test(wachtwoord1)) || (check2.test(wachtwoord2))){
      // console.log("wachtwoord is goed")
      checks[6] = true;
      checks[7] = true;
    }
    else{
      //console.log("Wachtwoorden zijn het zelfde maar niet goed");
      checks[6] = false;
      checks[7] = false;
    }
  }
  else{
    checks[6] = false;
    checks[7] = false;
    // console.log("Wachtwoorden zijn niet het zelfde");
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
    <?php
      //de insert van het account in de database

     ?>
  }
  else{
    goed = 0;//reset goed
  }
}
</script>
