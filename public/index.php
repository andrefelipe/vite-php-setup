<?php

// This would be your framework default bootstrap file

// During dev, this file would be hit when accessing your local host, like:
// http://vite-php-setup.test



// Some dev/prod mechanism would exist
define('IS_DEVELOPMENT', true);
define('IS_PRODUCTION', !IS_DEVELOPMENT);


// Vite Client that must be loaded during development
function viteClient()
{
    if (IS_DEVELOPMENT) {
        $host = "http://{$_SERVER['SERVER_NAME']}:3000";

        return <<<HTML
        <script type="module">
            import "{$host}/vite/client"
            window.process = { env: { NODE_ENV: "development" }}
            </script>

        HTML;
    }
}


// The script file
function viteScript($name)
{
    if (IS_DEVELOPMENT) {
        $host = "http://{$_SERVER['SERVER_NAME']}:3000";
    } else {
        $host = '';
        $prefix = '/dist/_assets';
        // TODO must read the hashed files
        // but how?
        // rollup should export a JSON file to track them?
    }

    return <<<HTML
    <script type="module" src="{$host}/{$name}"></script>

    HTML;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite App</title>

    <?= viteClient() ?>
    <?= viteScript('src/main.js') ?>
</head>

<body>
    <?= '<p>PHP output here, potentially large HTML parts</p>' ?>
    <hr>

    <div class="vue-app">
        <hello-world msg="header"></hello-world>
    </div>

    <hr>
    <?= '<p>PHP output here, potentially large HTML parts</p>' ?>
    <hr>

    <div class="vue-app">
        <hello-world msg="footer"></hello-world>
    </div>

    <hr>
    <?= '<p>PHP output here, potentially large HTML parts</p>' ?>
</body>

</html>
