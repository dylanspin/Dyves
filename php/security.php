<?php
// Shared security helpers: safe deserialization, CSRF tokens, output
// escaping, prepared-statement wrappers, and page whitelisting.

require_once __DIR__ . '/config.php';

// ---------- output escaping ----------

function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// ---------- data (de)serialization ----------
// New writes use JSON. Reads try JSON first, then fall back to a safe
// unserialize that disallows object instantiation. Returns array() if nothing
// decodes — never throws.

function dyves_decode($raw): array {
    if ($raw === null || $raw === '' || $raw === false) {
        return [];
    }
    if (is_array($raw)) {
        return $raw;
    }
    $s = (string)$raw;
    $json = json_decode($s, true);
    if (is_array($json)) {
        return $json;
    }
    $u = @unserialize($s, ['allowed_classes' => false]);
    return is_array($u) ? $u : [];
}

function dyves_encode(array $value): string {
    return json_encode(array_values($value), JSON_UNESCAPED_UNICODE);
}

// ---------- CSRF ----------

function csrf_token(): string {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        return '';
    }
    if (empty($_SESSION['_csrf'])) {
        $_SESSION['_csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['_csrf'];
}

function csrf_field(): void {
    echo '<input type="hidden" name="_csrf" value="' . e(csrf_token()) . '">';
}

function csrf_check(): bool {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return true;
    }
    $sent = isset($_POST['_csrf']) ? (string)$_POST['_csrf'] : '';
    $expected = isset($_SESSION['_csrf']) ? (string)$_SESSION['_csrf'] : '';
    if ($expected === '' || !hash_equals($expected, $sent)) {
        http_response_code(400);
        exit('Invalid request token.');
    }
    return true;
}

// ---------- DB helpers ----------
// Thin prepared-statement wrappers. $types is a mysqli bind_param type string
// (e.g. "ss", "i", "ssi"). Returns mysqli_result for SELECT, bool for others.

function db_query(mysqli $conn, string $sql, string $types = '', ...$params) {
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        return false;
    }
    if ($types !== '') {
        $stmt->bind_param($types, ...$params);
    }
    if (!$stmt->execute()) {
        $stmt->close();
        return false;
    }
    $meta = $stmt->result_metadata();
    if ($meta === false) {
        $stmt->close();
        return true;
    }
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

function db_one(mysqli $conn, string $sql, string $types = '', ...$params): ?array {
    $r = db_query($conn, $sql, $types, ...$params);
    if (!$r) {
        return null;
    }
    $row = $r->fetch_assoc();
    return $row ?: null;
}

function db_all(mysqli $conn, string $sql, string $types = '', ...$params): array {
    $r = db_query($conn, $sql, $types, ...$params);
    if (!$r) {
        return [];
    }
    $rows = [];
    while ($row = $r->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

// ---------- page whitelist (LFI prevention) ----------

function dyves_allowed_pages(): array {
    return [
        'hoofdmenu', 'meldingen', 'instellingen', 'profiel', 'fotos',
        'vrienden', 'backend', 'poll', 'artikel', 'bezoek',
        'Currentarticle', 'Nieuws', 'zoeken', 'aanmelden', 'Agenda',
        'cv', 'games', 'wachtwoord',
    ];
}

function dyves_safe_page(?string $page): string {
    $allowed = dyves_allowed_pages();
    if ($page !== null && in_array($page, $allowed, true)) {
        return $page;
    }
    return 'hoofdmenu';
}

// ---------- file upload ----------
// Accepts a $_FILES key and a target directory (relative to repo root, with
// trailing slash). Returns the stored filename on success, null on failure.
// Filename is generated server-side; the client name is discarded.

function dyves_upload_image(string $field, string $target_dir, int $max_bytes = 2_000_000): ?string {
    if (!isset($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $info = $_FILES[$field];
    if ($info['size'] <= 0 || $info['size'] > $max_bytes) {
        return null;
    }
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime  = $finfo->file($info['tmp_name']);
    $allowed = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/gif'  => 'gif',
        'image/webp' => 'webp',
    ];
    if (!isset($allowed[$mime])) {
        return null;
    }
    $ext = $allowed[$mime];
    $name = bin2hex(random_bytes(16)) . '.' . $ext;
    $dest = rtrim($target_dir, '/') . '/' . $name;
    if (!is_dir($target_dir)) {
        if (!@mkdir($target_dir, 0775, true) && !is_dir($target_dir)) {
            return null;
        }
    }
    if (!move_uploaded_file($info['tmp_name'], $dest)) {
        return null;
    }
    return $name;
}

// Constrains a stored filename to a single basename within a directory and
// only deletes if the resolved path stays inside that directory. Returns true
// if a file was deleted, false otherwise. Never trusts caller-supplied paths.

function dyves_safe_unlink(string $dir, ?string $filename): bool {
    if ($filename === null || $filename === '') {
        return false;
    }
    $base = basename($filename);
    if ($base !== $filename) {
        return false;
    }
    $dirReal = realpath($dir);
    if ($dirReal === false) {
        return false;
    }
    $target = $dirReal . DIRECTORY_SEPARATOR . $base;
    if (!is_file($target)) {
        return false;
    }
    $targetReal = realpath($target);
    if ($targetReal === false || strpos($targetReal, $dirReal . DIRECTORY_SEPARATOR) !== 0) {
        return false;
    }
    return @unlink($targetReal);
}
