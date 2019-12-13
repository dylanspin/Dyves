<?php
    include 'block.php';

    $bool = true;
    $tell = true;
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    $text = $_POST['textarea'];
    $kleur = "black";

    if(isset($_POST['PostKrabel'])){
        if($_SESSION['Waar'] == "bezoek"){
            $naar  = $_SESSION["bezoek"];
            $sql = "SELECT Gebruikersnaam FROM `notusers` Where UNIQ = '$current';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $wieUP = $row['Gebruikersnaam'];
                }
            }
        }
        else{
          $wieUP = $gebruikersnaam_;
          $naar = $gebruikersnaam_;
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
                $sql = "INSERT INTO `krabels` (`Gebruikersnaam`,`Postnaam`,`Text_`) VALUES ('$wieUP','$naar','$text2');";
                if ($conn->query($sql) === true) {
                }
                echo "<script>
                        if ( window.history.replaceState ) {
                          window.history.replaceState( null, null, window.location.href );
                        }
                      </script>";
            }
        }
    }
 ?>
