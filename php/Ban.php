<?php
require_once __DIR__ . '/config.php';

$cfg  = dyves_config();
$deny = $cfg['banned_ips'] ?? [];
$ip   = $_SERVER['REMOTE_ADDR'] ?? '';

if (!empty($deny) && in_array($ip, $deny, true)) {
    header('Location: https://google.com');
    exit;
}
