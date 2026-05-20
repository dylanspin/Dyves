<?php
require_once __DIR__ . '/bootstrap.php';

if (isset($_POST['Pollset'])) {
    if (!is_admin($_SESSION['nu'] ?? '')) {
        http_response_code(403);
        return;
    }
    csrf_check();
    $welk = (string)$_POST['Pollset'];
    if (db_query($conn, "UPDATE `settings` SET `Poll` = ? WHERE Id = '1'", 's', $welk)) {
        db_query($conn, "UPDATE `notusers` SET `Voted` = '0'");
    }
    if (function_exists('reloadPost')) {
        reloadPost();
    }
}

if (isset($_POST['Artikelset'])) {
    if (!is_admin($_SESSION['nu'] ?? '')) {
        http_response_code(403);
        return;
    }
    csrf_check();
    // Reserved for selecting which articles appear on the main page.
}
