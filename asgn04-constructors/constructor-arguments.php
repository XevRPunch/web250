<?php

class Bird {
  public ?string $commonName;
  public ?string $latinName;

  public function __construct(array $args=[])
  {
    $this->commonName = $args['commonName'] ?? null;
    $this->latinName = $args['latinName'] ?? null;
  }

  public function describe()
  {
    echo "Common name: $this->commonName <br>";
    echo "Latin name: $this->latinName <br> <hr>";
  }
}

$flycatcher = new Bird([
  'commonName' => "Acadian Flycatcher",
  'latinName' => "Turdus migratorius"
]);
$towhee = new Bird([
  'commonName' => "Eastern Towhee",
  'latinName' => "Pipilo erythrophthalmus"
]);

$flycatcher->describe();
$towhee->describe();

?>
