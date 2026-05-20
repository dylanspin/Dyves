<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/block.php';

if (!isset($conn) || !($conn instanceof mysqli)) {
    $db = dyves_config()['db'] ?? [];
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $conn = new mysqli(
            $db['host']     ?? 'localhost',
            $db['user']     ?? '',
            $db['password'] ?? '',
            $db['name']     ?? ''
        );
        $conn->set_charset($db['charset'] ?? 'utf8mb4');
    } catch (mysqli_sql_exception $e) {
        http_response_code(500);
        die('Database connection failed. Configure php/config.local.php (copy from php/config.example.php).');
    }
}
