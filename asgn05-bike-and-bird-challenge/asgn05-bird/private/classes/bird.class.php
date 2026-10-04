<?php

/*
 * Bird class -- STARTER SCAFFOLD
 *
 * Your job is to fill this in. Every TODO below corresponds to a line item on
 * the assignment rubric. Work top to bottom: properties, constants,
 * constructor, then methods. Load birds.php in a browser after each step so
 * you find your mistakes one at a time instead of all at once.
 *
 * Your model is private/classes/bicycle.class.php from the chapter 7 videos.
 * Nearly everything here has a direct counterpart there. Where it does not,
 * the comment says so.
 *
 * REMINDER: above each item marked "why comment required" you must write a
 * block comment explaining how the code is used and WHY it exists -- what
 * problem it solves and what would break if you did it a simpler way. A
 * comment that only restates the code earns no credit.
 */

class Bird {

  /*
   * TODO 1 -- Properties
   *
   * Open private/wnc-birds.csv and look at the header row. Every column needs
   * a matching property, and the property name must match the column name
   * exactly, because the constructor looks the values up by key.
   *
   * Do NOT make them all public. Decide for each one:
   *
   *   public    -- plain descriptive text. Nothing to enforce, no formatting
   *                decision to make. Example: common_name.
   *
   *   protected -- anything stored in a specific UNIT or as a coded ID, so
   *                that reading and writing must go through a method. Three
   *                of the columns qualify. Look at how bicycle.class.php
   *                treats $weight_kg and $condition_id and follow that.
   *
   * why comment required: on the first protected property, explain why it is
   * protected when common_name is public.
   */
  public string $common_name;
  public string $scientific_name;
  public string $habitat;
  public string $food;
  public string $nest_placement;
  public string $behavior;
  /*
   * $wingspan_cm needs to be protected because it stores length, which can be measured with different units.
   * Setters and getters can allow it to be interacted with as either centimeters or inches safely.
   */
  protected float $wingspan_cm;
  protected float $weight_g;
  protected int $conservation_id;
  public string $backyard_tips;


  /*
   * TODO 2 -- A static counter
   *
   * Add a public static property $count, starting at 0, and increment it in
   * the constructor. This has no counterpart in the bicycle class.
   *
   * why comment required: explain how this differs from the row_count()
   * method on ParseCSV. They often report the same number. Say when they
   * would not.
   */
  /*
   * ParseCSV can be used to parse multiple files or the same file repeatedly.
   * When starting a new parse, the $row_count is reset. This means it shows how
   * many items it has parsed, whereas $counter shows the total amount of birds
   * registered ever. If multiple parses were to register birds separately, the
   * number of rows parsed would not equal the number of birds registered.
   */
  public static int $count = 0;


  /*
   * TODO 3 -- Public constants
   *
   * Add at least two public constant arrays listing the allowed values for
   * two of the text columns -- HABITATS and FOOD_TYPES are the obvious pair.
   * Read the values out of the CSV; do not invent your own.
   *
   * These are the equivalent of CATEGORIES and GENDERS in bicycle.class.php.
   * Nothing in this assignment validates against them, but a filter menu or
   * an HTML form would read them, which is the reason they are public.
   */
    public const HABITATS = [
      "Cliff",
      "Fields",
      "Forests",
      "High elevation",
      "Open woodlands",
      "Scrub",
      "Wetland"
    ];
    public const FOOD = [
      "Birds",
      "Fish",
      "Insects",
      "Nectar",
      "Nuts",
      "Omnivore",
      "Seeds",
      "Small mammals"
    ];


  /*
   * TODO 4 -- A protected constant for the conservation scale
   *
   * Copy the shape of CONDITION_OPTIONS from bicycle.class.php. Name it
   * CONSERVATION_OPTIONS and use this scale, which matches the
   * conservation_id column in the CSV:
   *
   *   1 = Low concern
   *   2 = Moderate concern
   *   3 = Extreme concern
   *   4 = Extinct
   *
   * why comment required: two things to address. Why is this protected when
   * HABITATS is public? And why does the CSV store the number 3 instead of
   * the words "Extreme concern"?
   */
  /*
   * The CSV stores numbers rather than strings so that the string values can be changed without changing each one manually.
   * Them being numbers also provides benefits such as sorting them numerically, so it is useful for data that represents a linear scale.
   * 
   * HABITATS is public because its purpose is to be accessed by HTML.
   * CONSERVATION_OPTIONS is protected so it is not changed during runtime, which would break things.
   */
  protected const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];


  /*
   * TODO 5 -- The constructor
   *
   * public function __construct($args=[])
   *
   * One array parameter, not ten separate ones. Assign every property from
   * $args using the null coalescing operator (??) so that a missing column
   * produces a default instead of an "Undefined array key" warning.
   *
   * Use a default of 1 for conservation_id and 0 for the two measurements.
   *
   * Route the two measurement assignments through your own setters rather
   * than writing to the protected properties directly. If you ever add
   * validation to a setter, the constructor then gets it for free.
   *
   * Don't forget to increment your counter from TODO 2.
   *
   * why comment required: why one $args array instead of a parameter for each
   * column? What happens if someone reorders the columns in the CSV?
   */
  /*
   * An args array is preferable because there is no need to memorize or follow a sequence of arguments.
   * If someone reorders the columns in the CSV, it is no issue. If this happened with seperate args it
   * would break the constructor from the point of the moved arg onward.
   */
  public function __construct($args=[]) {
    $this->common_name = $args['common_name'] ?? '';
    $this->scientific_name = $args['scientific_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->nest_placement = $args['nest_placement'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
    $this->set_wingspan_cm($args['wingspan_cm'] ?? 0);
    $this->set_weight_g($args['weight_g'] ?? 0);
    $this->conservation_id = $args['conservation_id'] ?? 1;
    $this->backyard_tips = $args['backyard_tips'] ?? '';
    self::$count++;
  }


  /*
   * TODO 6 -- Getters and setters for wingspan
   *
   * Four methods, following weight_kg() / set_weight_kg() / weight_lbs() /
   * set_weight_lbs() in bicycle.class.php:
   *
   *   wingspan_cm()          returns the value formatted, with a unit label
   *   set_wingspan_cm($v)    stores it as a float
   *   wingspan_in()          converts and returns formatted inches
   *   set_wingspan_in($v)    converts inches to cm and stores that
   *
   * 1 cm = 0.393701 in. Use number_format() for the display formatting.
   *
   * why comment required: on set_wingspan_in(), explain why a setter named
   * for inches writes to a property measured in centimeters.
   */
  public function wingspan_cm() {
    return number_format($this->wingspan_cm, 2) . ' cm';
  }
  public function set_wingspan_cm(float $new_wingspan_cm) {
    $this->wingspan_cm = floatval($new_wingspan_cm);
  }

  public function wingspan_in() {
    $wingspan_in = floatval($this->wingspan_cm) * 0.393701;
    return number_format($wingspan_in, 2) . ' in';
  }
  /*
   * The property itself needs to conform to one singular unit, so the inches
   * setter converts to centimeters for storage.
   * 
   * The other option would be to have separate variables for each unit, which
   * would be bloated and lame and risks them being desynced.
   */
  public function set_wingspan_in(float $new_wingspan_in) {
    $this->wingspan_cm = floatval($new_wingspan_in) / 0.393701;
  }



  /*
   * TODO 7 -- Getters and setters for weight
   *
   * Same four-method pattern for weight_g / weight_oz.
   * 1 g = 0.0352740 oz.
   */
  public function weight_g() {
    return number_format($this->weight_g, 2) . ' kg';
  }
  public function set_weight_g(float $new_weight_g) {
    $this->weight_g = floatval($new_weight_g);
  }

  public function weight_oz() {
    $weight_oz = floatval($this->weight_g) * 0.0352740;
    return number_format($weight_oz, 2) . ' lbs';
  }
  public function set_weight_oz(float $new_weight_oz) {
    $this->weight_g = floatval($new_weight_oz) / 0.0352740;
  }


  /*
   * TODO 8 -- conservation()
   *
   * Mimic the condition() method in bicycle.class.php: take the id this
   * object is holding, look up the label in your protected constant, and
   * return it.
   *
   * Two requirements the bicycle version does not have. Use self:: to reach
   * the constant, not $this->. And an id that is not in the list must return
   * the string "Unknown" rather than producing a PHP error -- test this by
   * temporarily setting a conservation_id of 99 in the CSV.
   *
   * why comment required: why self:: and not $this->?
   */
  /*
   * self:: refers to the class itself rather than an individual instance,
   * which is what $this refers to. It is used when getting constants.
   * There is no point in having the conservation options be object-level,
   * since they are universal for all birds.
   */
  public function conservation() {
    if($this->conservation_id > 0 and $this->conservation_id < 5) {
      return self::CONSERVATION_OPTIONS[$this->conservation_id];
    } else {
      return "Unknown";
    }
  }


  /*
   * TODO 9 -- size_class()
   *
   * There is no counterpart for this in the videos; you are writing new
   * logic. Return 'Small', 'Medium', or 'Large' based on wingspan.
   *
   * You choose the cutoffs. Look at the actual range in the CSV (the
   * hummingbird is 11 cm, the raven is 130 cm) and pick thresholds that put a
   * useful number of birds in each group. Document the numbers you chose in
   * your comment and say why they suit this data.
   */
  /**
   * I chose these cutoffs because they make 6 mediums, 5 larges, and 5 smalls.
   * This seems pretty reasonable to me since it's a mostly even spread with the
   * one extra being in the medium (normal/average) group.
   */
  public function size_class() {
    if ($this->wingspan_cm > 55) {
      return "Large";
    } elseif ($this->wingspan_cm > 25) {
      return "Medium";
    } else {
      return "Small";
    }
  }


  /*
   * TODO 10 -- display_name()
   *
   * Return the common name together with the scientific name.
   *
   * There is a real decision here and it is graded on your reasoning, not on
   * which way you go. Scientific names are conventionally italicized. So
   * either:
   *
   *   (a) this method returns plain text and birds.php adds the <em> tags, or
   *   (b) this method returns a string containing <em> tags.
   *
   * If you pick (b), what happens when birds.php wraps the result in h()?
   * Try it and look at the page. Then decide which layer should own the
   * markup.
   *
   * why comment required: state which approach you chose and why.
   */
  /*
   * I chose to add the <em> tags here.
   * I find it much more elegant than any solution I could think of to add them in birds.php,
   * which all entail wrapping both values in one and then unwrapping them into separate values
   * in birds.php, which seems like arbitrary work.
   * 
   * I see no issue with adding them here since both names are also stored separately with no
   * html and this function already exists purely for display purposes, so it's not like any
   * damage is being done to the data.
   * 
   * Nothing seems wrong when using h() around the values in this function itself and not in
   * birds.php. HTML tags are escaped.
   */
  public function display_name() {
    return h($this->common_name) . "<br><em>" . h($this->scientific_name) . "</em>";
  }


  public function __toString() {
    if ($this->food == "Omnivore") {
      $food_msg = " and is omnivorous. ";
    } else {
      $food_msg = " and eats " . strtolower(h($this->food)) . ". ";
    }
    $msg = h($this->common_name) . ", scientifically called <em>" . h($this->scientific_name) . "</em>, is a " . strtolower(h($this->size_class())) . "-size bird which lives at " . strtolower(h($this->habitat)) . $food_msg . $this->backyard_tips;
    return $msg;
  }

}

?>
