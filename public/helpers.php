<?php
// Helpers here serve as example. Change to suit your needs.
const VITE_HOST = 'http://localhost:5133';

// For a real-world example check here:
// https://github.com/wp-bond/bond/blob/master/src/Tooling/Vite.php
// https://github.com/wp-bond/boilerplate/tree/master/app/themes/boilerplate

// you might check @vitejs/plugin-legacy if you need to support older browsers
// https://github.com/vitejs/vite/tree/main/packages/plugin-legacy



// Prints all the html entries needed for Vite

function vite(string $entry): string
{
    return "\n" . jsTag($entry)
        . "\n" . jsPreloadImports($entry)
        . "\n" . cssTag($entry);
}


// Some dev/prod mechanism would exist in your project

function isDev(string $entry): bool
{
    // This method is very useful for the local server
    // if we try to access it, and by any means, didn't started Vite yet
    // it will fallback to load the production files from manifest
    // so you still navigate your site as you intended!

    static $exists = null;
    if ($exists !== null) {
        return $exists;
    }
    $handle = curl_init(VITE_HOST . '/' . $entry);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_NOBODY, true);

    curl_exec($handle);
    $error = curl_errno($handle);
    curl_close($handle);

    return $exists = !$error;
}


// Helpers to print tags

function jsTag(string $entry): string
{
    $url = isDev($entry)
        ? VITE_HOST . '/' . $entry
        : assetUrl($entry);

    if (!$url) {
        return '';
    }
    if (isDev($entry)) {
        return '<script type="module" src="' . VITE_HOST . '/@vite/client"></script>' . "\n"
            . '<script type="module" src="' . $url . '"></script>';
    }
    return '<script type="module" src="' . $url . '"></script>';
}

function jsPreloadImports(string $entry): string
{
    if (isDev($entry)) {
        return '';
    }

    $res = '';
    foreach (importsUrls($entry) as $url) {
        $res .= '<link rel="modulepreload" href="'
            . $url
            . '">';
    }
    return $res;
}

function cssTag(string $entry): string
{
    // not needed on dev, it's inject by Vite
    if (isDev($entry)) {
        return '';
    }

    $tags = '';
    foreach (cssUrls($entry) as $url) {
        $tags .= '<link rel="stylesheet" href="'
            . $url
            . '">';
    }
    return $tags;
}


// Helpers to locate files

function getManifest(): array
{
    $content = file_get_contents(__DIR__ . '/dist/.vite/manifest.json');
    return json_decode($content, true);
}

function assetUrl(string $entry): string
{
    $manifest = getManifest();

    return isset($manifest[$entry])
        ? '/dist/' . $manifest[$entry]['file']
        : '';
}

function importsUrls(string $entry): array
{
    $urls = [];
    $manifest = getManifest();

    if (!empty($manifest[$entry]['imports'])) {
        foreach ($manifest[$entry]['imports'] as $imports) {
            $urls[] = '/dist/' . $manifest[$imports]['file'];
        }
    }
    return $urls;
}

function cssUrls(string $entry): array
{
    $urls = [];
    $manifest = getManifest();

    if (!empty($manifest[$entry]['css'])) {
        foreach ($manifest[$entry]['css'] as $file) {
            $urls[] = '/dist/' . $file;
        }
    }
    return $urls;
}
