# Asgn07 Explain the Design

## Why does this many-to-many design use three tables instead of putting one bird_id in bird_images?
This way one bird can have multipled images and one image can have multiple birds.
This is useful so that you can see an image with multiple birds and find out what each one is, rather than only knowing what the "main one" in the image is.

## What happens to the links, image records, and physical JPEG files when a species record is deleted?
Links, image records, and physical JPEG files currently remain if their species record is deleted.

## What does the PDO DSN contain, and why is Database::$connection static?
The DSN contains the database driver, server, port, and database. The connection is static because otherwise there could be the risk of making multiple different connections at once, which would not be ideal.

## What is the difference between query() and fetchColumn() in the count example?
query() instructs the database what it wants to retrieve, and fetchColumn() returns this to the PHP so it can be used.
