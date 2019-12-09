<?php
  $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

  if($pageWasRefreshed) {
  }
  else {
    if (!isset($_SERVER['HTTP_REFERER'])){
      header("Location:index.php");
    }
  }


 ?>
