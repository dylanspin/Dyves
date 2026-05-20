<?php
require_once __DIR__ . '/security.php';

// Compatibility wrapper around dyves_upload_image(). Generates a safe
// server-controlled filename, validates MIME type, and stores the file.
// Returns the stored filename on success or null on failure.
function UploadIMG(string $loc, string $bestand): ?string {
    return dyves_upload_image($bestand, $loc);
}
