<?php
  $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

  if($pageWasRefreshed) {
  }
  else {
    if (!isset($_SERVER['HTTP_REFERER'])){
      echo "Volgens mij hoor je hier niet te zijn he?";
      header("Location:index.php");
    }
  }


 ?>
