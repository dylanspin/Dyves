<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/block.php';

if (isset($_POST['uitloggen'])) {
    csrf_check();
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
    session_destroy();
    session_start();
    session_regenerate_id(true);
    $_SESSION['wachtwoordCheck'] = 'false';
    $_SESSION['Waar'] = 'hoofdmenu';
    if (function_exists('reloadPost')) {
        reloadPost();
    }
}
