<?php
    include 'connect.php';
    include 'block.php';

    function reload(){
        echo "<script>
                  if (window.history.replaceState) {
                    window.history.replaceState( null, null, window.location.href);
                    location.reload(true);
                  }
              </script>";
    }

    $PollTitle  = $_POST['PollTitle'];
    $PollVraag1 = $_POST['Vraag1'];
    $PollVraag2 = $_POST['Vraag2'];
    $PollVraag3 = $_POST['Vraag3'];
    $PollVraag4 = $_POST['Vraag4'];
    $PollStatus =  $_POST['AanPoll'];

    $vragen = [$PollVraag1,$PollVraag2,$PollVraag3,$PollVraag4];
    $compresvragen = serialize($vragen);

    if(isset($_POST['Post'])){
        $sql = "INSERT INTO `poll` (`Naam`,`Status`,`Vragen`) VALUES ('$PollTitle','$PollStatus','$compresvragen');";
        if ($conn->query($sql) === true) {
        }
        reload();
    }
?>
