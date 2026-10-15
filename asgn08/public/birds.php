<?php
// GRADED ASSIGNMENT: Build the bird directory page here.
// TODO: require private/initialize.php, get Bird::find_all(), output an
// accessible HTML table of bird names, scientific names, habitat, season,
// and links to bird.php?id=... . Escape all database-derived text.

require_once('../private/initialize.php');
$database = Database::connect();
Bird::set_database($database);

?>

<!doctype html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>WNC Bird Directory</title>
  </head>

  <body>
    <h1>WNC Bird Directory</h1>

    <table border="1">
      <caption>Birds of western North Carolina.</caption>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Common Name</th>
          <th scope="col">Scientific Name</th>
          <th scope="col">Family Name</th>
          <th scope="col">Primary Habitat</th>
          <th scope="col">Seasonal Status</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach(Bird::find_all() as $bird) { ?>
          <tr>
            <td><?php echo h($bird->id); ?></td>
            <td>
              <a href="bird.php?id=<?php echo h($bird->id) ?>"><?php echo h($bird->common_name); ?></a>
            </td>
            <td><?php echo h($bird->scientific_name); ?></td>
            <td><?php echo h($bird->family_name); ?></td>
            <td><?php echo h($bird->primary_habitat); ?></td>
            <td><?php echo h($bird->seasonal_status); ?></td>
            <td><?php echo h($bird->description); ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <p><a href="index.php">WNC Birds Database Check</a></p>

  </body>

</html>
