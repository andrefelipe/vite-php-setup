<?php
// This would be your framework default bootstrap file

// During dev, this file would be hit when accessing your local host, like:
// http://vite-php-setup.test

require_once __DIR__ . '/helpers.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite App</title>

    <?= vite('main.js') ?>

</head>

<body>
    <?= '<p class="message">PHP output here, potentially large HTML chunks</p>' ?>

    <div class="vue-app">
        <hello-world msg="header"></hello-world>
    </div>

    <?= '<p class="message">PHP output here, potentially large HTML chunks</p>' ?>

    <div class="vue-app">
        <hello-world msg="component"></hello-world>
    </div>

    <?= '<p class="message">PHP output here, potentially large HTML chunks</p>' ?>
</body>

</html>
