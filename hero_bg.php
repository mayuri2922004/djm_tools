<?php
function ensureHeroBannerExists(): string {
    $cachePath = __DIR__ . '/images/hero-blueprint-banner.jpg';
    $sourcePath = 'C:/Users/SkillDlink/.gemini/antigravity/brain/87abcdf5-7783-43ab-bbec-6b0d8e7ff3b0/.user_uploaded/media_1794918351859_e19a82f0.jpg';

    // If cache already exists and is properly cropped (height <= 450), return it
    if (file_exists($cachePath) && extension_loaded('gd')) {
        $info = @getimagesize($cachePath);
        if ($info && $info[1] <= 450) {
            return $cachePath;
        }
    }

    if (!file_exists($sourcePath)) {
        return $cachePath;
    }

    $raw = @file_get_contents($sourcePath);
    if (!$raw) {
        return $cachePath;
    }

    if (extension_loaded('gd')) {
        $img = @imagecreatefromstring($raw);
        if ($img) {
            $w = imagesx($img);
            $h = imagesy($img);

            // In the 1024x576 screenshot, the banner occupies:
            // top = 82, height = 384, bottom = 466.
            $cropY = (int)round($h * (82 / 576));
            $cropH = (int)round($h * (384 / 576));
            $cropW = $w;

            $cropped = imagecrop($img, [
                'x' => 0,
                'y' => $cropY,
                'width' => $cropW,
                'height' => $cropH
            ]);

            if ($cropped) {
                imagejpeg($cropped, $cachePath, 95);
                imagedestroy($cropped);
                imagedestroy($img);
                return $cachePath;
            }
            imagedestroy($img);
        }
    }

    if (!file_exists($cachePath)) {
        @file_put_contents($cachePath, $raw);
    }
    return $cachePath;
}

$cachePath = ensureHeroBannerExists();

if (basename($_SERVER['SCRIPT_FILENAME'] ?? '') === 'hero_bg.php') {
    if (file_exists($cachePath)) {
        header('Content-Type: image/jpeg');
        header('Cache-Control: public, max-age=86400');
        readfile($cachePath);
        exit;
    }
    http_response_code(404);
    echo "Image not found";
    exit;
}
