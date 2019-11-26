
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
  session_start();
  echo "Dit is een Test : ".$_SESSION['test'];

  // if(0){
  //   echo "null";
  // }
  // if(1){
  //   echo "een";
  // }
  ?>
