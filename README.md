Trying to run Vite on traditional PHP sites.

### STATUS
Works on dev server, but still have to handle production build and assets path.

### KNOWN ISSUE
An important limitation is the Vite's port, it must match the one that was created during "npm run dev", default 3000

### NOTE
The first level "public" folder is the server's public root. Vite is outside of public root intentionaly, where it would be within a PHP app.
