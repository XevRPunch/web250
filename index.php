<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Xev Punch WEB-250</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/web250.css">
  </head>

  <body>
    <h1>Xev Punch's WEB-250 Site</h1>
    <p>Website for the assignments of WEB-250: Database Driven Websites at AB-Tech.</p>
    <?php echo "<p>A random two-digit number: " . rand(10,99) . "</p>" ?>
    <a href="#latest" id="latest-button">Latest Assignment</a>
    <p>(Apologies if I forget to update the latest assignment link...)</p>
    <ol>
      <a href="asgn01/bike-challenge/challenge-01.php"><li>Asgn-01</li></a>

      <li>Asgn-02
        <ul>
          <a href="asgn-02-inheritance/challenge-02-inheritance.php"><li>Inheritance</li></a>
          <a href="asgn-02-inheritance/challenge-03-oac.php"><li>Object Access Control</li></a>
        </ul>
      </li>

      <a href="asgn03-static/"><li>Asgn-03: Static</li></a>

      <li>Asgn-04
        <ul>
          <a href="asgn04-constructors/constructor.php"><li>Constructor</li></a>
          <a href="asgn04-constructors/constructor-arguments.php"><li>Constructor Arguments</li></a>
          <a href="asgn04-constructors/autoload.php"><li>Autoload</li></a>
        </ul>
      </li>

      <li id="latest">Asgn-05
        <ul>
          <a href="asgn05-bike-and-bird-challenge/asgn05-bike/public/"><li>Bike Challenge</li></a>
          <a href="asgn05-bike-and-bird-challenge/asgn05-bird/public/"><li>Bird Challenge</li></a>
        </ul>
      </li>
    </ol>
  </body>

</html>
