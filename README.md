This is a example code, simulating how to run Vite on traditional PHP sites.

A bare-minimum setup to serve as example to adapt to other scenarios (WordPress, Laravel, etc).

### Goal

- Handle the cleanest way possible;

### Status

- Works gracefully!

### Note about the development host

A characteristic of this setup is that you'll run your project from your own local server, for exemple http://vite-php-setup.test. Vite will be running at http://localhost:3000 where our script and styles will be loaded from, but accesing http://localhost:3000 directly will be empty.

Of course, HMR and styles will work just fine! And fast!

### Notes about our example code

- The "public" folder is the web server's public root, "public/index.php" is the front controller or bootstrap file;
- The "vite" folder is outside of public root intentionaly, where it would actually be within a PHP app;
- For the sake of this example, we are not setting up a SPA, instead we have multiple Vue components sprinkled throughout your page, simulating the mix of regular HTML with interactive elements (using in-DOM HTML as the template);

### Known issue (during Dev only)

A limitation is Vite's port during development, PHP helpers must match the one that was created during "npm run dev" (default 3000). For example, if the port 3000 is in use, Vite will try the next one (3001 and so on), so our helper PHP doesn't know about that.

So make sure Vite dev started at http://localhost:3000

Currently haven't thought of a way to overcome this. It's rare anyway, and some solutions would polute our vite.config anyway.
