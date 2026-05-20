<?php
// Loads configuration from php/config.local.php (gitignored). Falls back to
// the example template's structure with empty values so the app still boots.

function dyves_config(): array {
    static $cfg = null;
    if ($cfg !== null) {
        return $cfg;
    }
    $local = __DIR__ . '/config.local.php';
    if (is_file($local)) {
        $cfg = require $local;
    } else {
        $cfg = require __DIR__ . '/config.example.php';
    }
    return $cfg;
}

function dyves_admins(): array {
    $cfg = dyves_config();
    return isset($cfg['admins']) && is_array($cfg['admins']) ? $cfg['admins'] : [];
}

function is_admin(?string $uniq): bool {
    if ($uniq === null || $uniq === '') {
        return false;
    }
    return in_array($uniq, dyves_admins(), true);
}
