<?php

class Bike {
  public string $brand;
  public string $model;
  public int $year;
  public string $description;
  private float $weightKg;
  protected int $wheels = 2;

  public function name() {
    return "{$this->brand} {$this->model} {$this->year}<br>";
  }

  public function getWeightLbs() {
    return round($this->weightKg * 2.205, 2) . " lbs";
  }

  public function setWeightLbs($lbs): void {
    $this->weightKg = $lbs / 2.205;
  }

  public function getWeightKgs() {
    return "$this->weightKg kgs";
  }

  public function setWeightKgs($kgs): void {
    $this->weightKg = $kgs;
  }

  public function wheelDetails() {
    if ($this->wheels == 2) {
      return "It has two wheels";
    } else {
      return "It has one wheel";
    }
  }
}

class Unicycle extends Bike {
  protected int $wheels = 1;
}

$awesomeSauce = new Bike();
$awesomeSauce->brand = "Awesome";
$awesomeSauce->model = "Sauce";
$awesomeSauce->year = 2045;
$awesomeSauce->description = "The awesome bike from the future. Extremely lightweight.";
$awesomeSauce->setWeightKgs(-14.7);

echo($awesomeSauce->name());
echo($awesomeSauce->description . "<br>");
echo("Weight in pounds: " . $awesomeSauce->getWeightLbs() . "<br>");
echo($awesomeSauce->wheelDetails());

echo("<br>");
$awesomeSauce->setWeightLbs(500);
echo("New weight in pounds, after setWeightLbs() is used: " . $awesomeSauce->getWeightLbs() . "<br>");
echo("New weight kg: " . $awesomeSauce->getWeightKgs());


echo("<br><br><br><br>");


$evilEvil = new Unicycle();
$evilEvil->brand = "Evil";
$evilEvil->model = "Evil";
$evilEvil->year = 100;
$evilEvil->description = "A unicycle made of an ancient evil developed by the Evil company in the year 100";
$evilEvil->setWeightKgs(100);

echo($evilEvil->name());
echo($evilEvil->description . "<br>");
echo("Weight in pounds: " . $evilEvil->getWeightLbs() . "<br>");
echo($evilEvil->wheelDetails());

?>
