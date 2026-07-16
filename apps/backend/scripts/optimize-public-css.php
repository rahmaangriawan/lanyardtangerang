<?php

declare(strict_types=1);

$path = dirname(__DIR__).DIRECTORY_SEPARATOR.'public/css/app.min.css';
$css = file_get_contents($path) ?: throw new RuntimeException("Cannot read {$path}");

foreach ([500, 600, 800] as $weight) {
    $css = preg_replace(
        '/@font-face\s*\{(?=[^{}]*font-family:\s*[\'\"]?Geist)(?=[^{}]*font-weight:\s*'.$weight.'\b)[^{}]*\}/i',
        '',
        $css,
    );
}

if (file_put_contents($path, $css) === false) {
    throw new RuntimeException("Cannot write {$path}");
}
