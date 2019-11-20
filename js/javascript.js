
function getCookie(cname) {
  var cook = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(cook) == 0) {
      return c.substring(cook.length, c.length);
    }
  }
  return "";
}

function checkCookie(check){
  var wachtwoord = getCookie("wachtwoordCheck");
  if (wachtwoord == "true") { //als de pagina word ingeladen na dat er cookies zijn gezet
    document.getElementById('fout').innerHTML = "Mislukt met Inloggen";
  }
}

function goto(loc){
  window.location.href = loc+".php";
}

function cookies(){
  document.cookie = "cookies=true";
  var cookies = getCookie("cookies");
  document.getElementById('cookie').style.display = "none";
}


function aangemeld(){
  var aanmelgemeld = getCookie("aanmeld");

  if(aanmelgemeld == "true"){
    console.log("aangemeld");
    document.cookie = "aanmeld=false";
    window.location.href = "index.php";
  }
}

function checkdouble(){

  var checkGebruiker = getCookie("Gebruikers");
  var email = getCookie("email");

  if(checkGebruiker == "false"){
    console.log("Gebruiker bestaat nog niet");
    document.getElementById('4').style.visibility = "hidden";
  }
  else{
    console.log("Gebruiker bestaat");
    document.getElementById('4').style.visibility = "visible";
  }

  if(email == "false"){
    console.log("Email bestaat nog niet");
    document.getElementById('5').style.visibility = "hidden";
  }
  else{
    console.log("Email bestaat");
    document.getElementById('5').style.visibility = "visible";
  }
}

var nieuws  = ["",true,true,true];

function schuif(id,hoog){

  if(event.type == 'mouseout'){
    console.log("mouse out");
  }
  if(nieuws[id]){
    nieuws[id] = false;
    document.getElementById('info'+id).style.height = hoog+"%";
    console.log("Id : "+ id + " Hoog :" + hoog)
  }
  else{
    document.getElementById('info'+id).style.height = "0%";
    nieuws[id] = true;
  }
}

  function inlog(){

    if(inlog){
      document.getElementById('inlog_div').style.display = "none";
    }
  }

  var latest = "";

  function checkbox(id){
    if(latest == id){
      console.log("test");
    }
    else{
      console.log("test2");
    }
    if(latest.length > 0){
      document.getElementById(latest).style.width = "10vw";
      document.getElementById(latest).style.height = "15vw";
    }
    document.getElementById(id).style.width = "11vw";
    document.getElementById(id).style.height = "16vw";
    document.getElementById('Hidden').value = id;

    latest = id;
  }
