<!DOCTYPE html>
<html lang="en">

<head>
    <script type="module">
        import "/vite/hmr"
        window.__DEV__ = true
        window.process = {
            env: {
                "NODE_ENV": "development",
                "BASE_URL": "/"
            }
        }
    </script>

    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite App</title>
</head>

<body>
    <?= 'PHP output' ?>

    <div id="app">
        <p>fdsafdsa</p>
    </div>
    <script type="module" src="/src/main.js"></script>
</body>

</html>
