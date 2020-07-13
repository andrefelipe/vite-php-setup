<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite App</title>

    <script type="module">
        import "http://localhost:3000/vite/hmr"
        window.process = { env: { NODE_ENV: "development" }}
    </script>
</head>

<body>
    <?= 'PHP output' ?>

    <div id="app"></div>
    <script type="module" src="http://localhost:3000/src/main.js"></script>
</body>

</html>
