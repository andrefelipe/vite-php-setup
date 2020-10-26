This is a example code, simulating how to run Vite on traditional PHP sites.

A bare-minimum setup to serve as example to adapt to other scenarios (WordPress, Laravel, etc).

### Goal

- Handle the cleanest way possible;

In the moment we look forward for Vite to offer these:

- The loading of Vite's HMR client (right now we add the code with PHP, would be great if Vite served index.html from custom host, so it could inject the Vite client itself) https://github.com/vitejs/vite/issues/341
- The handling of the JS entry file (Vite's index.html still have to exist right now, to find the JS file);

### Status

Works on dev server, but still have to handle production build (SOON) https://github.com/vitejs/vite/issues/341.

TODO: Handle multiple entries, for example, one js/css for the backend and another js/css for frontend

### Notes about our example code

- This "public" folder is the web server's public root, "public/index.php" is the front controller or bootstrap file;
- The "vite" folder is outside of public root intentionaly, where it would actually be within a PHP app;
- For the sake of this example, we are not setting up a SPA, instead we have multiple Vue components sprinkled throughout your page, simulating the mix of regular HTML with interactive elements (using in-DOM HTML as the template);

### Known Issue (during Dev only)

A limitation is Vite's port during development, PHP helpers must match the one that was created during "npm run dev" (default 3000). For example, if the port 3000 is in use, Vite will try the next one (3001 and so on), so our helper PHP doesn't know about that.

Currently haven't thought of a way to overcome this. It's rare anyway, and some solutions would polute our vite.config anyway.
