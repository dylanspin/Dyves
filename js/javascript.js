
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

function scrollmid(){
  window.scrollTo(0, 250);
}

function checkCookie(check){
  var wachtwoord = getCookie("wachtwoordCheck");
  if (wachtwoord == "true") { //als de pagina word ingeladen na dat er cookies zijn gezet
    document.getElementById('fout').innerHTML = "Mislukt met Inloggen";
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

function cookies(){
  document.cookie = "cookies=true";
  var cookies = getCookie("cookies");
  document.getElementById('cookie').style.display = "none";
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
//doet de smiley van het smiley toetsenbord in de textarea
function smiley(t){
  var smiley = document.getElementById(t).value;
  document.getElementById("textarea").value += smiley;
}

var checkkr = true;
//gaat naar de krabel post input
function showK(){
  if(checkkr){
    checkkr = false;
    document.getElementById("Krabelss").scrollTo(0, 0);
    document.getElementById("show1").style.display = "block";
    document.getElementById("show2").style.display = "block";
    document.getElementById("hide2").style.display = "block";
    document.getElementById("hide").style.display = "none";
  }
  else{
    checkkr = true;
    document.getElementById("show1").style.display = "none";
    document.getElementById("show2").style.display = "none";
    document.getElementById("hide2").style.display = "none";
    document.getElementById("hide").style.display = "block";
  }
}

//maakt de image groot als er op geklickt is
function modal(t){
  var div = t.id;
  var modal = document.getElementById("myModal");

  var img = document.getElementById(div);
  var modalImg = document.getElementById("img01");
      modal.style.display = "block";
      modalImg.src = t.src;
  var span = document.getElementById("close2");

  span.onclick = function() {
    modal.style.display = "none";
  }
}
