This is a mock code, simulating how to run Vite on traditional PHP sites.

### Status
Works on dev server, but still have to handle production build.

### Notes
- This first level "public" folder is the server's public root, "public/index.php" is the front controller or bootstrap file;
- The "vite" folder is outside of public root intentionaly, where it would actually be within a PHP app;
- For the sake of this example, we are not setting up a SPA, instead we have multiple Vue components sprinkled throughout your page, simulating the mix of regular HTML with interactive elements (using in-DOM HTML as the template);

### Known Issue
An important limitation is the Vite's port, it must match the one that was created during "npm run dev", default 3000

### Goal
- Handle production the cleanest way possible;
- Handle multiple entries, for example, one js/css for the backend and another js/css for frontend;
