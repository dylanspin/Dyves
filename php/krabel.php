<?php
  include 'block.php';

  $bool = true;
  $tell = true;
  $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
  $text = $_POST['textarea'];
  $kleur = "black";

  if(isset($_POST['PostKrabel'])){
    if(basename($_SERVER['PHP_SELF']) == "bezoek.php"){
      $naar  = $_SESSION["bezoek"];
    }
    else{
      $naar = $current;
    }

    $sql = "SELECT Gebruikersnaam,Postnaam,Text_ FROM `krabels` WHERE Gebruikersnaam = '$naar';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $tell = false;
        $Check1 = $row['Gebruikersnaam'];
        $Check2 = $row['Postnaam'];
        $Check3 = $row['Text_'];
      }
    }
    if(strlen($text) > 0){
      if($Check3 == $text){
        $bool = false;
      }
      if($tell){
        $bool = true;
      }
      if($bool){
        $text2 = str_replace("'", "''",$text ); //replaced de ' naar '' zo dat het goed de database in kan.
        $sql = "INSERT INTO `krabels` (`Gebruikersnaam`,`Postnaam`,`Text_`) VALUES ('$current','$naar','$text2');";
        if ($conn->query($sql) === true) {
        }
        else {
          $_SESSION['test'] =  "mislukt". $sql . "<br>" . $conn->error;
        }
        header('Location: '.$_SERVER['PHP_SELF']);
        die;
      }
    }
    $_SESSION['test'] = "Tell : ".$tell." Bool : ".$bool." De Text Vergelijking ".$Check3." ".$text;
  }
 ?>
