<?php
  require_once('../private/initialize.php');
  $page_title = 'Sightings';
?>

<?php
/*
 * birds.php -- STARTER SCAFFOLD
 *
 * Read the whole file before you write anything. Note that the page logic
 * (loading and preparing data) happens up here, ABOVE the header include,
 * and the markup happens below it. Keeping those separate is why you can
 * print a clean error message instead of a half-rendered page.
 *
 * Your model is public/bicycles.php from chapter 7 video 07.
 */




/**
 * I chose Go Further Options 4 and 6.
 */
/*
 * Option 4 Explanation:
 * 
 * __toString() is special in that it does not need to be called explicitly. Here, I am simply
 * echoing the bird object, and __toString() is automatically being called. This wll happen
 * whenever a bird object is expected to be in the form of a string, without needing to code
 * the function call, unlike a regular function named summary() for example.
 */
/*
 * Option 6 Explanation:
 * 
 * reset() is clearing the results of the previous parse so that there is no repeated or
 * mismatched data in the new results. Removing reset() from the ParseCSV class causes the
 * page to fail due to the table header of the second csv file being interpreted as table
 * data. The Bird object creator then attempts to use the "wingspan_cm" string as a number.
 */







/*
 * TODO 1 -- The delimiter
 *
 * Open private/wnc-birds.csv. The fields are not separated by commas.
 *
 * ParseCSV ships with a comma as its default and you must not edit that
 * file. Instead, set the delimiter from out here, before you parse, using
 * the static property. One line.
 *
 * WHEN YOU SKIP THIS STEP: the page still loads and the table still has one
 * row per bird, but every cell is empty. That is the symptom to remember.
 * The whole line lands in a single field, so the key your constructor looks
 * for never exists and every property falls back to its default.
 *
 * why comment required: why can you set this from outside the class at all,
 * and why is that better than editing parsecsv.class.php?
 */
/*
 * This can be set outside of the class so that the delimiter can be changed at runtime.
 * This is better because it lets one class can be used to parse multiple CSVs with different delimiters.
 */
ParseCSV::$delimiter = '|';


/*
 * TODO 2 -- Parse the file
 *
 * Create a ParseCSV object for PRIVATE_PATH . '/wnc-birds.csv' and call
 * parse(). Build the path from the constant, not a relative path like
 * '../private/wnc-birds.csv'.
 */
$parser = new ParseCSV(PRIVATE_PATH . '/wnc-birds.csv');
$bird_parse_array = $parser->parse();


/*
 * TODO 3 -- Handle a missing or unreadable file
 *
 * parse() returns false when there was no readable file. If you hand false
 * to a foreach, PHP warns and you get a blank page with a warning on it.
 *
 * Set a flag here (something like $data_error) and use it further down to
 * print a readable message instead of the table. The page must still render
 * its header, nav, and footer. Test it by renaming the CSV, loading the
 * page, and then renaming it back.
 */
$data_error = false;
if (!$parser->last_results()) {
  $data_error = 'File to parse could not be found or is not readable.';
}


/* TODO 5 -- if you set an error flag in TODO 3, print the message here
         and skip the table. */
if($data_error) {
  echo "<p>$data_error</>";
  exit();
}

$row_count_1 = $parser->row_count();

$parser->file(PRIVATE_PATH . '/wnc-birds-2.csv');
$bird_parse_array = [...$bird_parse_array, ...$parser->parse()];

$data_error = false;
if (!$parser->last_results()) {
  $data_error = 'Second file to parse could not be found or is not readable.';
}

if($data_error) {
  echo "<p>$data_error</>";
  exit();
}

$row_count_2 = $parser->row_count();


/*
 * TODO 4 -- Build the objects
 *
 * Loop over the parsed rows and create one Bird per row, collecting them in
 * an array. In bicycles.php this happens inside the table markup; do it up
 * here instead so the markup below stays readable.
 */
$bird_object_array = [];
foreach($bird_parse_array as $args) {
   $bird_object_array[] = new Bird($args);
}




/*
 * OPTIONAL -- "go further" options 1 and 2 (sort and filter)
 *
 * If you are doing those, this is where the $_GET handling goes. Validate
 * anything that arrives in the query string against a list of values you
 * control BEFORE you use it. Explain in a comment why you cannot trust $_GET
 * directly.
 */

?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<?php
/*
 * TODO 6 -- The record count
 *
 * Print a line reporting how many records were in the file, using the
 * row_count() method. If you added the static counter to Bird, print that
 * too. Notice whether the two numbers agree.
 */
$bird_count = Bird::$count;
echo "<p>$row_count_1 records are in the first file. $row_count_2 records are in the second file. $bird_count birds are registered.</p>";
?>


<!-- /*
 * TODO 7 -- The table
 *
 * Build it with <thead> and <tbody>, a <caption>, and scope="col" on each
 * header cell. Use border="1" so it is readable without CSS. The page has to
 * validate at validator.w3.org, so no stray tags.
 *
 * A column for each thing worth showing. The measurements should appear in
 * both units, the way bicycles.php shows kg and lbs:
 *
 *   Bird (common name, and the scientific name in <em>)
 *   Habitat, Food, Nest, Behavior
 *   Wingspan (cm / in)
 *   Weight (g / oz)
 *   Size class
 *   Conservation
 *   Backyard tips
 *
 * TODO 8 -- The rows
 *
 * foreach over your array of Bird objects and emit one <tr> per bird.
 *
 * EVERY value goes through h(). No exceptions. The backyard_tips column
 * contains apostrophes and dashes typed by a human, which is exactly the
 * kind of content that breaks a page when it is not escaped.
 *
 * Call your methods, not the raw properties, for anything measured or coded:
 * $bird->wingspan_cm() rather than reaching for the property.
 */ -->
<table border="1">
  <caption>Birds of western North Carolina.</caption>
  <thead>
    <tr>
      <th scope="col">Bird</th>
      <th scope="col">Habitat</th>
      <th scope="col">Food</th>
      <th scope="col">Nest</th>
      <th scope="col">Behavior</th>
      <th scope="col">Wingspan</th>
      <th scope="col">Weight</th>
      <th scope="col">Size</th>
      <th scope="col">Conservation</th>
      <th scope="col">Backyard tips</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($bird_object_array as $bird) { ?>
      <tr>
        <td><?php echo $bird->display_name(); ?></td>
        <td><?php echo h($bird->habitat); ?></td>
        <td><?php echo h($bird->food); ?></td>
        <td><?php echo h($bird->nest_placement); ?></td>
        <td><?php echo h($bird->behavior); ?></td>
        <td><?php echo h($bird->wingspan_cm()) . ' cm / ' . h($bird->wingspan_in()) . ' in'; ?></td>
        <td><?php echo h($bird->weight_g()) . ' g / ' . h($bird->weight_oz()) . ' oz'; ?></td>
        <td><?php echo h($bird->size_class()); ?></td>
        <td><?php echo h($bird->conservation()); ?></td>
        <td><?php echo h($bird->backyard_tips); ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php echo $bird_object_array[0]; ?>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
