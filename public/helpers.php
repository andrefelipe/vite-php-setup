<?php
// Helpers here serve as example. Change to suit your needs.


// Some dev/prod mechanism would exist in your project
// Handling manualy here, change to test both cases
define('IS_DEVELOPMENT', true);


// Vite Client that must be loaded during development
function viteClient(): string
{
    // not required on production
    if (!IS_DEVELOPMENT) {
        return '';
    }
    $host = "http://{$_SERVER['SERVER_NAME']}:3000";
    return '<script type="module">import "' . $host . '/vite/client"</script>';
}


// Helper to output style tag
function viteCss(string $name): string
{
    // not needed on dev, it's inject by Vite
    if (IS_DEVELOPMENT) {
        return '';
    }
    return '<link rel="stylesheet" href="' .
        viteAsset($name . '.css')
        . '">';
}

// Helper to output the script tag
function viteJs(string $name): string
{
    return '<script type="module" src="' .
        viteAsset($name . '.js')
        . '"></script>';
}

// Helper to locate files
function viteAsset(string $filename): string
{
    // Let Vite handle during dev
    if (IS_DEVELOPMENT) {
        return "http://{$_SERVER['SERVER_NAME']}:3000"
            . '/src/' . $filename;
    }

    // Locate hashed files in production
    $manifest = json_decode(file_get_contents(
        __DIR__ . '/dist/_assets/manifest.json'
    ), true);

    return '/dist/_assets/'
        . ($manifest[$filename] ?? $filename);
}
