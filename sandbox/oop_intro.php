<?php

class Instrument {

  // class properties
  public string $name;
  public string $tuning;

  // class methods
  public function play(): void
  {
    echo("The {$this->name} is playing.<br>");
  }

  public function showTuning(): void
  {
    echo("The {$this->name} is tuned to {$this->tuning}.<br>");
  }
}

// Create an instance of the Instrument class
$fiddle = new Instrument();
$fiddle->name = "Fiddle";
$fiddle->tuning = "G-D-A-E";

$guitar = new Instrument();
$guitar->name = "Lowden Guitar";
$guitar->tuning = "D-A-D-G-A-D";

$fiddle->play();
$fiddle->showTuning();
$guitar->play();
$guitar->showTuning();

?>
