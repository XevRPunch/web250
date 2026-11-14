# WEB 250 - asgn11: Members, Login, and Bird Permissions

The application creates a web interface for a Bird database.
Anybody visiting the site can read bird data, but only a Member can create, update, and delete entries.
A Member is somebody who has registered an account on the database and is logged in with that account.
Composer was used to install phpdotenv so .env variables can be used.

.env is not stored in GitHub because it contains private information about my database. .env.example can be used as a reference when setting this up on your own machine.
Passwords are stored hashed from the moment they are submitted when registering.
