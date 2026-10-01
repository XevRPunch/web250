<?php

class Bicycle {
  public string $brand;
  public string $model;
  public int $year;
  public string $category;
  public string $color;
  public string $description;
  public string $gender;
  public float $price;
  /*
   * If weight could be interacted with directly, there would be a risk of accidentally doing so with the wrong unit.
   * There are methods to interact with this property as either kg or lbs to prevent this.
   * 
   * This is not necessary on something like $brand because the brand name is objective.
   */
  protected float $weightKg;
  protected int $conditionId;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];
  public const GENDERS = ["Mens", "Womens", "Unisex"];

  /* 
   * CONDITIONS is protected rather than public because it should not be altered by code.
   * The reason the CSV stores condition_id is so that the words associated with each value can be changed at any time.
   * It may also be useful, for example, to be able to sort bikes by condition or something like that, which would be much
   * easier to implement if their condition is stored as a number.
   */
  protected const CONDITIONS = [
    1 => 'Beat Up',
    2 => 'Decent',
    3 => 'Good',
    4 => 'Great',
    5 => 'Like New'
  ];

  /*
   * An args array is preferable because there is no need to memorize or follow a sequence of arguments.
   * You can put them in any order and freely skip optional arguments that you don't have/want to include.
   * 
   * It can also just be much more visually pleasing and clear when declaring a new object what the arguments mean.
   */
  public function __construct($args=[]) {
    $this->brand = $args['brand'] ?? '';
    $this->model = $args['model'] ?? '';
    $this->year = $args['year'] ?? '';
    $this->category = $args['category'] ?? '';
    $this->color = $args['color'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->gender = $args['gender'] ?? '';
    $this->price = $args['price'] ?? 0;
    $this->weightKg = $args['weight_kg'] ?? 0.0;
    $this->conditionId = $args['condition_id'] ?? 3;
  }

  public function weightKg() {
    return number_format($this->weightKg, 2) . ' kg';
  }

  public function setWeightKg(float $newWeightKg) {
    $this->weightKg = floatval($newWeightKg);
  }

  /*
   * A setter receiving pounds stores the underlying property in kilograms so that the weight is standard across every object.
   * If it did not work this way, there would be no way to tell if a bike's weight was intended to mean kg or lbs.
   */
  public function weightLbs() {
    $weightLbs = floatval($this->weightKg) * 2.2046226218;
    return number_format($weightLbs, 2) . ' lbs';
  }

  public function setWeightLbs(float $newWeightLbs) {
    $this->weightKg = floatval($newWeightLbs) / 2.2046226218;
  }

  /* 
   * A method exists to get the condition because we want to get the string form rather than the ID.
   * 
   * If we were to change the names of the conditions, it would be much more effort to replace them in every bike
   * object rather than just in the CONDITIONS const, so it's better not to directly store the condition string.
   */
  public function condition() {
    if($this->conditionId > 0 and $this->conditionId < 6) {
      return self::CONDITIONS[$this->conditionId];
    } else {
      return "Unknown";
    }
  }
}



?>
