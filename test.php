
<style media="screen">

</style>
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

    function randomId($Lengte){ //maakt een random string
      $randomid = "";
      $a = round($Lengte/10);
      $randomcijfers = Rand($a*1,$a*5);
      for($i=0; $i<=$Lengte; $i++){
        $random = Rand(1,60);
        $randomid .= chr(64+$random);//pakt een random letter uit de 60
      }
      for($b=0; $b<=$randomcijfers; $b++){
        $random = Rand(1,50);
        $randomid = str_replace(chr(64+$random),$random,$randomid);//replaced een paar random letters met random cijfers
      }
      $randomid = str_replace("'",$random,$randomid);
      $randomid = str_replace("`",$random,$randomid);

      return $randomid;
    }

    function check($randomid,$conn){//checkt voor double random id
      $sql = "SELECT UNIQ FROM `notusers`;";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $randomIdDB = $row['UNIQ'];
          if($randomid == $randomIdDB){
            return randomId(20);
          }
        }
      }
    }

    // echo $_SESSION["nu"];
    echo "Test : ".$_SESSION['test']."<br>";
    // print_r($_SESSION['test']);
    echo "Waar :".$_SESSION["Waar"]."<br>";
    echo "Bezoek :".$_SESSION["bezoek"]."<br>";



    // $tijdelijk = ['Dylanspin','Bonospin','Levispin','Lunaspin','Michel','Dylanspin2','lilian','rstoit','Testacount','GerardSpin','Artikel','Dylanspin4'];
    // $tijdelijk2 = ['ZS39R35ulltAv235JPYeSY35R','y{NZsTD^j^yTFMNVGj46dU','Y{XY44buHgNyM17Y44tMFoqC','ZAR20[QfLJ8mcJ16Aw41xQKv','{BSHHViQ[NvKJ[vZ{W12HG',
    //                'ySKbCkqj1633WFEtDfQedt','HdF14[UP]giWYlK10VIwsKu','9sSpnMnH2q29DKs{6U^6L','4BY5CbCY]lHyQbW{w10B24','o[23DJlm[jrSoVTqVeUZ5Z',
    //                'qY50MZ917Ttp18W{SFGKvkH','PwbxJALogo8SbI{Q15frua'];
    //
    // for($i=0; $i<=11; $i++){
    //   $randomid = randomId(20);
    //   $functie = check($randomid,$conn);
    //
    //   if(strlen($functie) > 0){
    //     $randomid = $functie;
    //   }
    //
    //   // $sql= "INSERT INTO `agenda` (`Gebruikersnaam`) VALUES ('$tijdelijk2[$i]');";
    //   $sql = "UPDATE `agenda` SET `Gebruikersnaam` = '$tijdelijk2[$i]' WHERE Gebruikersnaam = '$tijdelijk[$i]';";
    //   if ($conn->query($sql) === true) {
    //     echo "updated";
    //     reload();
    //   }
    // }

  ?>
