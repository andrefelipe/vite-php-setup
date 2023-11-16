This is an example code, simulating how to run [Vite](https://github.com/vitejs/vite) on traditional PHP sites.

A bare-minimum setup to serve as example to adapt to other scenarios ([WordPress](https://github.com/wp-bond/boilerplate/tree/master/app/themes/boilerplate), Laravel, etc).

For everything else beyond the PHP side please refer to the [Vite documentation](https://vitejs.dev), which is great. 

### Goal

- Handle the cleanest way possible;

### Status

- Works gracefully!

### Note about the development host

A characteristic of this setup is that you'll run your project from your own local server, for exemple http://vite-php-setup.test. Vite will be running at http://localhost:{your_port_number} where our script and styles will be served from, but accesing http://localhost:{your_port_number} directly will be empty, which is fine.

Of course, HMR and styles will work just fine! And fast!

- Mininum Node.js version 18+

### Notes about our example code

- The "public" folder is the web server's public root, "public/index.php" is the front controller or bootstrap file;
- The "vite" folder is outside of public root intentionaly, where it would actually be within a PHP app;
- For the sake of this example, we are not setting up a SPA, instead we have multiple Vue components sprinkled throughout your page, simulating the mix of regular HTML with interactive elements (using in-DOM HTML as the template);
- This examples uses Vue, for React refer to [this info](https://github.com/andrefelipe/vite-php-setup/issues/11);

### Known issue 1 (during Dev only)

A limitation is Vite's port during development, PHP helpers must match the one that was created during "npm run dev" (default 5173). For example, if the port 5173 is in use, Vite will try the next one (5174 and so on), so our helper PHP wouldn't know about that.

The solution is to stricly specify which port to use, and match the PHP side to the same port. Check [vite.config.js](https://github.com/andrefelipe/vite-php-setup/blob/master/vite/vite.config.js) for example.

### Known issue 2 (during Dev only)

Image urls within CSS works fine BUT you need to create a symlink on dev server to map to your assets folder. This is an expected limitation as noted on [Vite docs](https://vitejs.dev/guide/backend-integration.html)

The solution is here, adjust the paths and run in terminal:

```
ln -s {path_to_project_source}/src/assets {path_to_public_html}/assets
```
Note: this happens because our Vite code is outside the server public access, if it where, we could use [server.origin](https://vitejs.dev/config/server-options.html#server-origin) config.


### Tips for multiple entries

You may find the need to handle multiple entries, for example, one js/css for the backend and another js/css for frontend. For that, it depends directly on how you want to organize your code.

So you can have:

- A single Vite [multi-page setup](https://vitejs.dev/guide/build.html#multi-page-app).
- A shared Vite setup, but outputing different entries in separated build steps, [example here](https://github.com/wp-bond/boilerplate/blob/master/themes/boilerplate/package.json).


### Docker dev environment
To get this running on Docker quickly, [check out this fork](https://github.com/mrothauer/vite-php-setup). Thanks @mrothauer
