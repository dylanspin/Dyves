<style media="screen">
  .dag{
    position: relative;
    height: 2.5vw;
    width: 2.5vw;
    color: #3C4043;
    transition: 0.3s;
    font-size: 1.5vw;
    border:none;
    border-radius: 100%;
    background: none;
    margin-left: 0.3vw;
    display: inline-block;
  }
  .dag:hover{
    background-color: rgb(57, 139, 222,0.7)
  }
  .outside{
    position: relative;
    width: 20%;
    height: 12.5vw;
    border: 0.1vw solid #3C4043;
    border-radius: 0.25vw;
    padding: 3vw;
    overflow: hidden;
    display: inline-block;
    margin-left: 0.5vw;
    margin-top: 0.5vw;
  }
  .body{
    margin: 0;
    position: relative;
    left: -0.5vw;
    width: 100vw;
    min-height: 20vw;
    height: auto;
    overflow-x: hidden;
  }
  .Maand{
    position: absolute;
    top: 0vw;
    color: #3C4043;
    left: 5%;
    font-size: 2.5vw;
    font-weight: 600;
  }
  .Maanden{
    position: relative;
    left: 8%;
  }
  .Jaar{
    position: relative;
    font-size: 3vw;
    font-weight: 600;
    color: #3C4043;
    left: 10vw;
    margin-bottom: 1vw;
  }
  .GroteMaand{
    position: relative;
    height: 40vw;
    border: 0.3vw solid #3C4043;
    border-radius: 0.25vw;
    width: 80%;
    left: 8%;
  }
  .GroteNaam{
    position: relative;
    top: 0;
    left: 2%;
    font-size: 4vw;
  }
  .Grote{
    width: 7vw;
    height: 7vw;
    font-size: 3vw;
    margin-left: 1.6vw;
    margin-top: 1vw;
  }
  .AgendaDiv{
    position: absolute;
    top: 10%;
    left: 25%;
    width: 46%;
    height: 25vw;
    border: 0.15vw solid #3C4043;
    background-color: white;
    z-index: 1;
    padding: 2vw;
  }
  .AgendaClose{
    position: absolute;
    right: 4%;
    top: 4%;
    font-size: 3vw;
    color: #3C4043;
  }
  .AgendaSave{
    position: absolute;
    right: 4%;
    bottom: 4%;
    font-size: 3vw;
    color: #4DA8ED;
  }
  .scale{
    transition: 0.3s;
  }
  .scale:hover{
    transform: scale(1.05,1.05);
  }
  .buttonnone{
    border:none;
    background: none;
  }
  .AgendaDatum{
    position: relative;
    top:-5%;
    width: 100%;
    font-size: 3vw;
    font-weight: 600;
    color: #3C4043;
  }
  .agendaPlaningen{
    position: relative;
    overflow-y:scroll;
    padding-bottom: 1vw;
    min-height:0%;
    max-height: 30%;
    width: 80%;
    left: 4%;
    bottom: 0;
    background-color: white;
  }
  .planning{
    position: relative;
    padding: 0.5vw;
    width: 95%;
    min-height: 3vw;
    color: white;
    font-size: 1.5vw;
    background-color: #4DA8ED;
    border-radius: 0.25vw;
    margin-top: 0.5vw;
  }
  .AgendaTextarea{
    font-size: 1.5vw;
    resize: none;
    border :0.1vw solid #4DA8ED;
  }
  .AgendaMelding{
    position: absolute;
    top: -5%;
    left: -10%;
    height: 0.9vw;
    width:  0.9vw;
    background-color: #4DA8ED;
    border-radius: 100%;
  }
  .GrotereMelding{
    height: 2vw;
    width:  2vw;
    top: 0%;
    left: 10%;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--moet nog weg-->

<?php
  function reload(){//moet nog weg
    echo "<script>
              if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
              }
          </script>";
  }

  function translatedag($Dag){
    switch ($Dag) {
    case "Mon":
        return "Maandag";
        break;
    case "Tue":
        return "Dinsdag";
        break;
    case "Wed":
        return "Woensdag";
        break;
    case "Thu":
        return "Donderdag";
        break;
    case "Fri":
        return "Vrijdag";
        break;
    case "Sat":
        return "Zaterdag";
        break;
    case "Sun":
        return "Zondag";
        break;
    default:
        return "Een dag";
    }
  }
  error_reporting(0);//moet nog weg
  session_start();//moet nog weg
  include 'php/connect.php';
  // echo $_SESSION['Waar'];


  $agenda = $_SESSION['Agenda'];
  echo "<form method='post'>";
        if($agenda){
          echo "<input type='submit' name='BackY' value='Back'>
                <input type='submit' name='NextY' value='Next'>";
        }
        else{
          echo "<input type='submit' name='BackM' value='Back'>
                <input type='submit' name='NextM' value='Next'>";
        }
          echo "<input type='submit' name='Jaar' value='Jaaren'>
                <input type='submit' name='Maand' value='Maanden'>
        </form>";


  if(isset($_POST['NextY'])){
    if($_SESSION['Jaar'] <= 7){
      $_SESSION['Jaar'] += 1;
    }
    reload();
  }
  if(isset($_POST['BackY'])){
    if(!$_SESSION['Jaar'] == 0){
      $_SESSION['Jaar'] -= 1;
    }
    reload();
  }
  if(isset($_POST['NextM'])){
    if($_SESSION['Maand'] <= 10){
      $_SESSION['Maand'] += 1;
    }
    reload();
  }
  if(isset($_POST['BackM'])){
    if($_SESSION['Maand'] > 0){
      $_SESSION['Maand'] -= 1;
    }
    reload();
  }
  if(isset($_POST['Jaar'])){
    $_SESSION['Agenda'] = 1;
    reload();
  }
  if(isset($_POST['Maand'])){
    $_SESSION['Agenda'] = 0;
    reload();
  }
  if(isset($_POST['planning'])){
    reload();
  }
  if(isset($_POST['close'])){
    $_SESSION['ShowForm'] = "false";
    reload();
  }


  $sql = "SELECT Agenda FROM `agenda` WHERE Gebruikersnaam = 'Dylanspin';";//$current
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $agendaDB = $row['Agenda'];
    }
  }
  $uncompressedAgenda = unserialize($agendaDB);


  $maanden = ["Januari","Februari","Maart","April","Mei","Juni","Juli","Augustus","September","Oktober","November","December"];
  $jarenNum = [2017,2018,2019,2020,2021,2022,2023,2024,2025]; //moet nog anders moet de current jaar pakken en daar -2 doen en plus 5 ong
  $J =  $_SESSION['Jaar'];
  $agenda = $_SESSION['Agenda'];
  $t = 0;
  $jaren = array();
  for($i = 2017; $i < 2026; $i++) {
    for($b=1; $b<=12; $b++){
      $dagen[$t] = cal_days_in_month(CAL_GREGORIAN, $b, $i); //dit was in de hoop dat die de schrikkel jaren zou pakken......
      $t++;
    }
    array_push($jaren,array($dagen));
  }


  echo "<div class='body'>";

  if(isset($_POST['Dag'])){
    $_SESSION['ShowForm'] = "true";
    $_SESSION['dag'] = $_POST['Dag'];
    $_SESSION['maandPOST'] = $_POST['agendaHidden'];
  }

  if($_SESSION['ShowForm'] == "true"){
    $dag = $_SESSION['dag'];
    $maandPOST = $_SESSION['maandPOST'];
    $datum = $jarenNum[$J]."-".($maandPOST+1)."-".$dag;
    $timestamp = strtotime($datum);
    $date =  date("D", $timestamp);
    $dagNaam = translatedag($date);

    if(isset($_POST['planning'])){ //Doet de informatie in de database
      $textAG = $_POST['AgendaTextarea'];

      $_SESSION['Test3'] = strlen($uncompressedAgenda[2]);
      if(!strlen($uncompressedAgenda[2]) > 0){
        $uncompressedAgenda = ['',''];
        array_push($uncompressedAgenda,$timestamp);
        array_push($uncompressedAgenda,$_POST['AgendaTextarea']);
      }
      else{
        array_push($uncompressedAgenda,$timestamp);
        array_push($uncompressedAgenda,$_POST['AgendaTextarea']);
      }
      $compresAgenda = serialize($uncompressedAgenda);

      $sql = "UPDATE `agenda` SET `Agenda` = '$compresAgenda' WHERE Gebruikersnaam = 'Dylanspin';";//$current
      if ($conn->query($sql) === true) {
      }
      reload();
    }

    echo "<form class='AgendaDiv' method='post'>
            <div class='AgendaDatum'>$dagNaam $dag $maanden[$maandPOST]</div>
            <textarea rows='7' cols='50' class='AgendaTextarea' name='AgendaTextarea'></textarea>
            <button class='AgendaSave buttonnone scale' type='submit' name='planning' value='Save'><i class='fa fa-plus'></i></button>
            <button class='AgendaClose buttonnone scale' type='submit' name='close'><i class='fa fa-times'></i></button>
            <div class='agendaPlaningen'>";
    for($i=1; $i<=count($uncompressedAgenda); $i++){
      if($timestamp == $uncompressedAgenda[$i]){ //checkt als er een planning is die dag
        echo "<div class='planning'>".$uncompressedAgenda[$i+1]."</div>";//De melding
      }
    }
    echo "   </div>
          </form>";
  }

  if($agenda){
    echo "<div class='Jaar'>$jarenNum[$J]</div><div class='Maanden'>";
    for($M=0; $M<=11; $M++){
      echo "<form class='outside' method='post'><div class='Maand'>$maanden[$M]</div>";
      for($D=1; $D<=$jaren[$J][0][$M]; $D++){
        $datum = $jarenNum[$J]."-".($M+1)."-".$D;
        $timestamp = strtotime($datum);
        $check = false;
        for($i=1; $i<=count($uncompressedAgenda); $i++){
          if($timestamp == $uncompressedAgenda[$i]){ //checkt als er een planning is die dag
            $check = true;
          }
        }
        if($check){
          echo "<button class='dag' type='submit' value='$D' name='Dag'>$D<div class='AgendaMelding'></div></button>";
        }
        else{
          echo "<button class='dag' type='submit' value='$D' name='Dag'>$D</button>";
        }
        echo "<input type='hidden' name='agendaHidden' value='$M'>";
      }
      echo "</form>";
    }
    echo "</div><br>";
  }
  else{
    $Maand = $_SESSION['Maand'];
    echo "<form class='GroteMaand' method='post'><div class='GroteNaam'>$maanden[$Maand]</div>";
    for($D=1; $D<=$jaren[$J][0][$Maand]; $D++){
      $datum = $jarenNum[$J]."-".($Maand+1)."-".$D;
      $timestamp = strtotime($datum);
      $check = false;
      for($i=1; $i<=count($uncompressedAgenda); $i++){
        if($timestamp == $uncompressedAgenda[$i]){ //checkt als er een planning is die dag
          $check = true;
        }
      }
      if($check){
        echo "<button class='dag Grote' type='submit' value='$D' name='Dag'>$D<div class='AgendaMelding GrotereMelding'></div></button>";
      }
      else{
        echo "<button class='dag Grote' type='submit' value='$D' name='Dag'>$D</button>";
      }
      echo "<input type='hidden' name='agendaHidden' value='$Maand'>";
    }
    echo "</form>";
  }

  echo "</div>";
  ?>
