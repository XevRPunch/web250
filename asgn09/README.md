# WEB 250 - asgn09: Create a Record

This starter is based on the completed reference version of asgn08. It already contains the read-only Active Record methods and pages so everyone can begin asgn09 from roughly the same structure.

Adds the **Create** portion of CRUD using:

- `public/bird_new.php`
- a `Bird::create()` instance method
- a PDO prepared `INSERT`
- named placeholders and `bindValue()`

## Database

Uses the existing `wnc_birds` database and `birds` table from the previous assignments.

Bird.php is the model and birds.php is the directory view.
The application is moving toward MVC but is not entirely there.

The PDO prepared INSERT creates the SQL statement without any actual values so that it can later have what was typed into the form inserted as values safely.

## To run locally

Make a copy of db_credentials.example.php called db_credentials.php and replace the credentials therein with those matching your local database.
