<?php

class Bird {
    var $habitat;
    var $food;
    var $nesting = "tree";
    var $conservation;
    var $song = "chirp";
    var $flying = "yes";
    public static $instanceCount = 0;
    public static $eggNum = 0;

    function canFly() {
        return ( $this->flying == "yes" ) ? "can fly" : "is stuck on the ground";
    }

    public static function create() {
      static::$instanceCount++;
    }
}

class YellowBelliedFlyCatcher extends Bird {
    var $name = "yellow-bellied flycatcher";
    var $diet = "mostly insects.";
    var $song = "flat chilk";
    public static $eggNum = "3-4, somtimes 5";
}

class Kiwi extends Bird {
    var $name = "kiwi";
    var $diet = "omnivorous";
    var $flying = "no";
}
