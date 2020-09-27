<?php
// This would be your framework default bootstrap file

// During dev, this file would be hit when accessing your local host, like:
// http://vite-php-setup.test

// Some dev/prod mechanism would exist in your project
// Handling manualy here, change to test both cases
define('IS_DEVELOPMENT', false);


require_once __DIR__ . '/helpers.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite App</title>

    <?= viteClient() ?>
    <?= viteCss('style') ?>
    <?= viteJs('index') ?>
</head>

<body>
    <?= '<p class="message">PHP output here, potentially large HTML chunks</p>' ?>
    <hr>

    <div class="vue-app">
        <hello-world msg="header"></hello-world>
    </div>

    <hr>
    <?= '<p class="message">PHP output here, potentially large HTML chunks</p>' ?>
    <hr>

    <div class="vue-app">
        <hello-world msg="footer"></hello-world>
    </div>

    <hr>
    <?= '<p class="message">PHP output here, potentially large HTML chunks</p>' ?>
</body>

</html>
