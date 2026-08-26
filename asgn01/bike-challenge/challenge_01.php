<?php

class Bike {
  public string $brand;
  public string $model;
  public int $year;
  public string $description;
  public float $weight_kg;

  public function name() {
    return "{$this->brand} {$this->model} {$this->year}<br>";
  }

  public function weight_lbs() {
    return round($this->weight_kg * 2.205, 2);
  }

  public function set_weight_lbs($lbs): void {
    $this->weight_kg = $lbs / 2.205;
  }
}

$awesomeSauce = new Bike();
$awesomeSauce->brand = "Awesome";
$awesomeSauce->model = "Sauce";
$awesomeSauce->year = 2045;
$awesomeSauce->description = "The awesome bike from the future. Extremely lightweight.";
$awesomeSauce->weight_kg = -14.7;


echo($awesomeSauce->name());
echo($awesomeSauce->description . "<br>");
echo("Weight in pounds: " . $awesomeSauce->weight_lbs() . "<br>");

echo("<br>");
$awesomeSauce->set_weight_lbs(500);
echo("New weight in pounds, after set_weight_lbs() is used: " . $awesomeSauce->weight_lbs() . "<br>");
echo("New weight kg: " . $awesomeSauce->weight_kg);

?>
