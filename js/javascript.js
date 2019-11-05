
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

function checkCookie(){
  var cookies = getCookie("cookies");//krijgt cookies
  if(cookies == "true"){
    document.getElementById('cookie').style.display = "none";
  }
}

function cookies(){
  document.cookie = "cookies=true";
  var cookies = getCookie("cookies");
  document.getElementById('cookie').style.display = "none";
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
    //document.getElementById('info'+id).style.height = "0%";
}

  function inlog(){

    if(inlog){
      document.getElementById('inlog_div').style.display = "none";
    }
  }
