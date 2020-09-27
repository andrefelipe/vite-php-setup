<?php

// Vite Client that must be loaded during development
function viteClient()
{
    // not required on production
    if (!IS_DEVELOPMENT) {
        return;
    }

    $host = "http://{$_SERVER['SERVER_NAME']}:3000";

    return <<<HTML
        <script type="module">
            import "{$host}/vite/client"
            window.process = { env: { NODE_ENV: "development" }}
            </script>

        HTML;
}


// Helpers to output our assets

function viteCss($name)
{
    // not needed on dev, it's inject by Vite
    if (IS_DEVELOPMENT) {
        return;
    }

    $asset = viteAsset($name . '.css');
    return <<<HTML
        <link rel="stylesheet" href="{$asset}">

        HTML;
}

function viteJs($name)
{
    $asset = viteAsset($name . '.js');
    return <<<HTML
        <script type="module" src="{$asset}"></script>

        HTML;
}

function viteAsset($name)
{
    if (IS_DEVELOPMENT) {
        $host = "http://{$_SERVER['SERVER_NAME']}:3000";
        $file = '/src/' . $name;
    } else {
        $outPath = '/dist/_assets/';
        $manifest = json_decode(file_get_contents(__DIR__ .  $outPath . 'manifest.json'), true);
        $host = '';
        $file = $outPath . ($manifest[$name] ?? $name);
    }

    return $host . $file;
}
