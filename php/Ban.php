<?php
    $deny = array("192.168.2.128", "192.168.2.111","192.168.2.123");//gebande ips later in de database.//192.168.2.123 michel mobiel

    if (in_array ($_SERVER['REMOTE_ADDR'], $deny)) {
         header("location: https://google.com");//redirect site
         exit();
    }
 ?>
