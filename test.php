
<!-- <form class="" method="post">
  <input type="submit" name="Test1" value="Test1">
  <input type="submit" name="Test2" value="Test2">
  <input type="submit" name="Test3" value="Test3">
  <input type="submit" name="Test4" value="Test4">
</form> -->
<?php
  // session_start();
  // if(isset($_POST['Test1'])){
  //   include 'index.php';
  //   header('Location: '.$_SERVER['PHP_SELF']);
  // }
  // elseif(isset($_POST['Test2'])){
  //   include 'meldingen.php';
  //   header('Location: '.$_SERVER['PHP_SELF']);
  // }
  // elseif(isset($_POST['Test3'])){
  //   include 'instellingen.php';
  //   header('Location: '.$_SERVER['PHP_SELF']);
  // }
  // elseif(isset($_POST['Test4'])){
  //   include 'profiel.php';
  //   header('Location: '.$_SERVER['PHP_SELF']);
  // }
  $testString = "Dit is weer een test op levi's";

  $string2 = str_replace("'","''","$testString");

  echo $_SESSION['test']."<br>";
  echo $string2;

  ?>
