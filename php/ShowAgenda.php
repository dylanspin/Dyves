<?php
    include 'php/connect.php';
    function reload(){// is een andere versie dan die op de index
      echo "<script>
                if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, window.location.href );
                }
            </script>";
    }

    function translatedag($Dag){
      switch ($Dag) {
      case "Mon": return "Maandag";
      break;
      case "Tue": return "Dinsdag";
      break;
      case "Wed": return "Woensdag";
      break;
      case "Thu": return "Donderdag";
      break;
      case "Fri": return "Vrijdag";
      break;
      case "Sat": return "Zaterdag";
      break;
      case "Sun": return "Zondag";
      break;
      default: return "Een dag";
      }
    }

    $agenda = $_SESSION['Agenda'];
    echo "<div class='outsideAgenda'><form method='post'>";
          if($agenda){
            echo "<button class='nonbutton agendaNav' type='submit' name='BackY'><i class='fa fa-arrow-left'></button>
                  <button class='nonbutton agendaNav' type='submit' name='NextY'><i class='fa fa-arrow-right'></i></button>";
          }
          else{
            echo "<button class='nonbutton agendaNav' type='submit' name='BackM'><i class='fa fa-arrow-left'></button>
                  <button class='nonbutton agendaNav' type='submit' name='NextM'><i class='fa fa-arrow-right'></button>";
          }
            echo "<button class='nonbutton agendaNav' type='submit' name='Jaar'>Jaar</button>
                  <button class='nonbutton agendaNav' type='submit' name='Maand'>Maanden</button>
          </form>";

    //veel issets...........
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

    $sql = "SELECT Agenda FROM `agenda` WHERE Gebruikersnaam = '$current';";
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

    for($i = 2017; $i < 2026; $i++) { //dit Later in De setup page
      for($b=1; $b<=12; $b++){
        $dagen[$t] = cal_days_in_month(CAL_GREGORIAN, $b, $i); //dit was in de hoop dat die de schrikkel jaren zou pakken......
        $t++;
      }
      array_push($jaren,array($dagen));
    }


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
          array_push($uncompressedAgenda, str_replace("'", "",$_POST['AgendaTextarea']));//moet later mis nog anders met de replace van ''
        }
        else{
          array_push($uncompressedAgenda,$timestamp);
          array_push($uncompressedAgenda, str_replace("'", "''",$_POST['AgendaTextarea']));
        }
        $compresAgenda = serialize($uncompressedAgenda);

        $sql = "UPDATE `agenda` SET `Agenda` = '$compresAgenda' WHERE Gebruikersnaam = '$current';";
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
      echo "</form></div>";
    }

 ?>
