<?php
// GRADED ASSIGNMENT: Build the single-bird detail page here.
// TODO: Validate ?id=..., call Bird::find_by_id(), display all seven fields,
// and handle both an invalid ID (400) and a missing bird (404).
// Use htmlspecialchars() or your existing h() helper for database text.

require_once('../private/initialize.php');
$database = Database::connect();
Bird::set_database($database);


$id = $_GET['id'] ?? 0;


if (is_numeric($id) and $id > 0) {
  $id = (int) $id;
  $bird = Bird::find_by_id($id);

  if ($bird != null) {
    // Create bird page successfully
    $bird = Bird::find_by_id($id);
    $page_content = '
    <h2>' . $bird->common_name . '</h2>
    <p>' . $bird->description . '</p>
    <p>Scientific Name: ' . $bird->scientific_name . '</p>
    <p>Family Name: ' . $bird->family_name . '</p>
    <p>Primary Habitat: ' . $bird->primary_habitat . '</p>
    <p>Seasonal Status: ' . $bird->seasonal_status . '</p>
    ';
  } else {
    // Handle Error 404
    $page_content = '
      <h2>Error 404</h2>
      <p>We could not find a bird for that ID.</p>
    ';
  }
} else {
  // Handle Error 400
  $page_content = '
    <h2>Error 400</h2>
    <p>The ID requested is invalid.</p>
  ';
}

?>
<!doctype html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Bird Details</title>
  </head>

  <body>
      <h1>Bird Details</h1>
      <?php echo $page_content ?>
      <a href="birds.php">Back to WNC Bird Directory</a>
  </body>

</html>
