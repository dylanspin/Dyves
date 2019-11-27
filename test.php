
<form class="" method="post">
  <input type="submit" name="Test1" value="Test1">
  <input type="submit" name="Test2" value="Test2">
  <input type="submit" name="Test3" value="Test3">
  <input type="submit" name="Test4" value="Test4">
  <input type="submit" name="Test5" value="Test5">
  <input type="submit" name="Test6" value="Test6">
  <input type="submit" name="Test7" value="Test7">
</form>
<?php
  if(isset($_POST['Test1'])){
    include 'index.php';
    header('Location: '.$_SERVER['PHP_SELF']);
  }
  elseif(isset($_POST['Test2'])){
    include 'meldingen.php';
    header('Location: '.$_SERVER['PHP_SELF']);
  }
  elseif(isset($_POST['Test3'])){
    include 'instellingen.php';
    header('Location: '.$_SERVER['PHP_SELF']);
  }
  elseif(isset($_POST['Test4'])){
    include 'profiel.php';
    header('Location: '.$_SERVER['PHP_SELF']);
  }
  elseif(isset($_POST['Test5'])){
    include 'vrienden.php';
    header('Location: '.$_SERVER['PHP_SELF']);
  }
  elseif(isset($_POST['Test6'])){
    include 'bezoek.php';
    header('Location: '.$_SERVER['PHP_SELF']);
  }
  elseif(isset($_POST['Test7'])){
    include 'cv.php';
    header('Location: '.$_SERVER['PHP_SELF']);
  }
  elseif(isset($_POST['Test7'])){
    include 'zoeken.php';
    header('Location: '.$_SERVER['PHP_SELF']);
  }
  // $testString = "Dit is weer een test op levi's";
  //
  // $string2 = str_replace("'","''","$testString");
  // echo $string2;
  //  echo "Dit is een Test : ".$_SESSION['test']."<br>";

  session_start();

  // echo $_SESSION['test'];
  // include 'php/connect.php';

  // $sql = "SELECT Fotos FROM `notusers` WHERE Gebruikersnaam = 'Levispin';";
  // $result = $conn->query($sql);
  // if ($result->num_rows > 0) {
  //   while($row = $result->fetch_assoc()) {
  //     $fotoDB = $row['Fotos'];
  //   }
  // }
  // $ok = unserialize($fotoDB);
  // echo $ok;
  // if(!strlen($ok[0]) > 0){
  //   $ok = ['LevispinRick.jpg'];
  // }
  // else{
  //   $test = $_SESSION['test'];
  //   array_push($ok,$test);
  // }
  // $compressed = serialize($ok);
  // print_r($ok);
  //
  // for($i=0; $i<=count($ok); $i++){
  //   echo "<img src='pic/fotos/$ok[$i]' class='vriendenImage'>";
  //   echo $ok[$i]."<br>";
  // }
  //
  // $sql = "UPDATE `notusers` SET `Fotos` = '$compressed' WHERE Gebruikersnaam = 'Levispin';";
  // if ($conn->query($sql) === true) {
  //   echo "Updated<br>";
  // }
  // else {
  //   echo "mislukt". $sql . "<br>" . $conn->error;
  // }
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <style>
        #myImg {
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        .modal {
          display: none;
          position: fixed;
          z-index: 1;
          padding-top: 100px;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0,0.9);
        }

        .modal-content {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
        }

        #caption {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
          text-align: center;
          color: #ccc;
          padding: 10px 0;
          height: 150px;
        }

        .modal-content, #caption {
          -webkit-animation-name: zoom;
          -webkit-animation-duration: 0.6s;
          animation-name: zoom;
          animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
          from {-webkit-transform:scale(0)}
          to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
          from {transform:scale(0)}
          to {transform:scale(1)}
        }

        .close2 {
          position: absolute;
          top: 15px;
          right: 35px;
          color: #f1f1f1;
          font-size: 40px;
          font-weight: bold;
          transition: 0.3s;
        }

        .close2:hover,
        .close2:focus {
          color: #bbb;
          text-decoration: none;
          cursor: pointer;
        }

        @media only screen and (max-width: 700px){
          .modal-content {
            width: 100%;
          }
        }
  </style>

  <img id="1" src="pic/fotos/Dylanspinp4.jpg" style="width:100%;max-width:300px" onclick="modal(this)">
  <img id="2" src="pic/fotos/Dylanspinrick.jpg" style="width:100%;max-width:300px" onclick="modal(this)">

  <!-- The Modal -->
  <div id="myModal" class="modal">
    <span class="close2" id="close2">&times;</span>
    <img class="modal-content" id="img01">
  </div>

  <script>
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

  </script>

    </body>
  </html>
