<?php

class Bird {
  public string $commonName;
  public string $food = "bugs";
  public string $nestPlacement = "tree";
  public string $conservationLevel;
  public string $song;
  public string $canFly;

  public function song(string $soundsLike): void {
    $this->song = $soundsLike;
  }

  public function canFly(bool $flight): void {
    if ($flight) {
      $this->canFly = "This bird can fly";
    } else {
      $this->canFly = "This bird cannot fly";
    }
  }
}

$bird1 = new Bird();
$bird1->commonName = "Eastern Towhee";
$bird1->food = "seeds, fruits, insects, spiders";
$bird1->nestPlacement = "Ground";
$bird1->conservationLevel = "Low";
$bird1->song("drink-your-tea!");
$bird1->canFly(true);

$bird2 = new Bird();
$bird2->commonName = "Indigo Bunting";
$bird2->food = "small seeds, berries, buds, and insects";
$bird2->nestPlacement = "roadsides, railroads, fields";
$bird2->conservationLevel = "Low";
$bird2->song("whatwhat!!");
$bird2->canFly(true);


echo($bird1->commonName . "<br>");
echo("Food: " . $bird1->food . "<br>");
echo("Nest Placement: " . $bird1->nestPlacement . "<br>");
echo("Conservation Level: " . $bird1->conservationLevel . "<br>");
echo("Bird Song: " . $bird1->song . "<br>");
echo($bird1->canFly . "<br>");

echo("<br>");

echo($bird2->commonName . "<br>");
echo("Food: " . $bird2->food . "<br>");
echo("Nest Placement: " . $bird2->nestPlacement . "<br>");
echo("Conservation Level: " . $bird2->conservationLevel . "<br>");
echo("Bird Song: " . $bird2->song . "<br>");
echo($bird2->canFly . "<br>");

?>
