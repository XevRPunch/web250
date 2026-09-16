<?php

class Bird {
  public string $commonName;
  public string $latinName;

  public function __construct(string $commonName, string $latinName)
  {
    $this->commonName = $commonName;
    $this->latinName = $latinName;
  }

  public function describe()
  {
    echo "Common name: $this->commonName <br>";
    echo "Latin name: $this->latinName <br> <hr>";
  }
}

$robin = new Bird("Robin", "Turdus migratorius");
$towhee = new Bird("Eastern Towhee", "Pipilo erythrophthalmus");

$robin->describe();
$towhee->describe();

?>
