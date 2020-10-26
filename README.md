This is a example code, simulating how to run Vite on traditional PHP sites.

A bare-minimum setup to serve as example to adapt to other scenarios (WordPress, Laravel, etc).

### Goal

- Handle the cleanest way possible;

### Status

Works gracefully!

### Notes about our example code

- This "public" folder is the web server's public root, "public/index.php" is the front controller or bootstrap file;
- The "vite" folder is outside of public root intentionaly, where it would actually be within a PHP app;
- For the sake of this example, we are not setting up a SPA, instead we have multiple Vue components sprinkled throughout your page, simulating the mix of regular HTML with interactive elements (using in-DOM HTML as the template);

### Known issue (during Dev only)

A limitation is Vite's port during development, PHP helpers must match the one that was created during "npm run dev" (default 3000). For example, if the port 3000 is in use, Vite will try the next one (3001 and so on), so our helper PHP doesn't know about that.

Currently haven't thought of a way to overcome this. It's rare anyway, and some solutions would polute our vite.config anyway.
