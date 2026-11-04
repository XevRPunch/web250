# WEB 250 - asgn10: Update and Delete a Bird

The base of the assignment is last week's completed asgn09.

Adds the **Update and Delete** portions of CRUD using:

- `public/bird_edit.php`
- `public/bird_delete.php`
- `Bird::update()` and `Bird::delete()` instance methods
- PDO prepared `INSERT`s
- named placeholders and `bindValue()`s

## GET and POST

Both bird_edit.php and bird_delete.php make no changes to the database upon being initially loaded.
One of the first things the PHP on those pages does is check if it is a GET or POST request.
If it is a POST, the page will follow through with its action. For bird_edit.php, this means updating the entry.
For bird_delete.php, this means deleting the entry.

## Importance of WHERE id= :id

Without the SQL in the Update and Delete functions making this distinction, it would have no way of knowing which entry to update or delete.
It would lead to the entire table being updated or deleted as one, which would be bad.

## To run locally

Make a copy of db_credentials.example.php called db_credentials.php and replace the credentials therein with those matching your local database.

## Links

Github: https://github.com/XevRPunch/web250/tree/main/asgn10
Hosted: https://xevpunch.nfshost.com/web250/asgn10/public/birds.php
