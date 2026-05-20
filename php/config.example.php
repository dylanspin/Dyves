<?php
// Copy this file to php/config.local.php and fill in the real values.
// config.local.php is gitignored; never commit credentials.

return [
    'db' => [
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => '',
        'name'     => 'dyves',
        'charset'  => 'utf8mb4',
    ],
    // UNIQ ids that have admin privileges.
    'admins' => [
        // 'PUT-ADMIN-UNIQ-HERE',
    ],
    // IPs to deny access; previously hardcoded in php/Ban.php.
    'banned_ips' => [
        // '192.168.2.111',
    ],
    // Used by php/mail.php (password recovery flow).
    'mail' => [
        'to'   => '',
        'from' => '',
    ],
];
