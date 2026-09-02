<?php

class Weapon {
  public string $name;
  public string $description;
  public string $type;

  public int $strengthRequirement = 0;
  public int $dexterityRequirement = 0;
  public int $intelligenceRequirement = 0;
  public int $faithRequirement = 0;

  private string $strengthScaling = "-";
  private string $dexterityScaling = "-";
  private string $intelligenceScaling = "-";
  private string $faithScaling = "-";

  public int $attackPhysical;
  public int $attackMagic = 0;
  public int $attackFire = 0;
  public int $attackLightning = 0;
  public int $attackDark = 0;

  public function setScaling($stat, $scaling) {
    if (in_array($scaling, ["S","A","B","C","D","E"])) {
      if ($stat == "strength") {
        $this->strengthScaling = $scaling;
      } elseif ($stat == "dexterity") {
        $this->dexterityScaling = $scaling;
      } elseif ($stat == "intelligence") {
        $this->intelligenceScaling = $scaling;
      } elseif ($stat == "faith") {
        $this->faithScaling = $scaling;
      }
    }
  }

  public function describeWeapon() {
    echo("The $this->name is a $this->type in Dark Souls III. <br>");
    echo($this->description . "<br><br>");

    echo("You must have at least the following stats to use the $this->name: <br>");
    echo("<table>
    <tr><td>Strength</td><td>$this->strengthRequirement</td></tr>
    <tr><td>Dexterity</td><td>$this->dexterityRequirement</td></tr>
    <tr><td>Intelligence</td><td>$this->intelligenceRequirement</td></tr>
    <tr><td>Faith</td><td>$this->faithRequirement</td></tr>
    </table><br>");

    echo("A fully-upgraded $this->name has the following stat scaling: <br>");
    echo("<table>
    <tr><td>Strength</td><td>$this->strengthScaling</td></tr>
    <tr><td>Dexterity</td><td>$this->dexterityScaling</td></tr>
    <tr><td>Intelligence</td><td>$this->intelligenceScaling</td></tr>
    <tr><td>Faith</td><td>$this->faithScaling</td></tr>
    </table><br>");

    echo("A fully-upgraded $this->name has the following attack affinities: <br>");
    echo("<table>
    <tr><td>Physical</td><td>$this->attackPhysical</td></tr>
    <tr><td>Magic</td><td>$this->attackMagic</td></tr>
    <tr><td>Fire</td><td>$this->attackFire</td></tr>
    <tr><td>Lightning</td><td>$this->attackLightning</td></tr>
    <tr><td>Dark</td><td>$this->attackDark</td></tr>
    </table><br>");
  }
}

class CastingWeapon extends Weapon {
  public int $spellBuff;

  #[Override]
  public function describeWeapon()
  {
    parent::describeWeapon();
    echo("The $this->name has a spell buff of $this->spellBuff.<br>");
  }
}

class ProjectileWeapon extends Weapon {
  public int $range;

  #[Override]
  public function describeWeapon()
  {
    parent::describeWeapon();
    echo("The $this->name has a range of $this->range.<br>");
  }
}



$moonlightGreatsword = new Weapon;
$moonlightGreatsword->name = "Moonlight Greatsword";
$moonlightGreatsword->description = "Legendary dragon weapon associated with Seath the paledrake.<br>
Charge strong attack to its limit to unleash moonlight wave.<br>
Oceiros, the Consumed King, was infatuated with the search for moonlight, but in the end, it never revealed itself to him.";
$moonlightGreatsword->type = "Greatsword";
$moonlightGreatsword->strengthRequirement = 16;
$moonlightGreatsword->dexterityRequirement = 11;
$moonlightGreatsword->intelligenceRequirement = 26;
$moonlightGreatsword->setScaling("strength", "E");
$moonlightGreatsword->setScaling("intelligence", "C");
$moonlightGreatsword->attackPhysical = 144;
$moonlightGreatsword->attackMagic = 200;

$moonlightGreatsword->describeWeapon();

echo("<br><hr><br><br>");

$sagesCrystalStaff = new CastingWeapon;
$sagesCrystalStaff->name = "Sage's Crystal Staff";
$sagesCrystalStaff->description = "Crystal catalyst presented as a gift from the Crystal Sages to their favorite pupil, Kriemhild.<br>
Crystal spheres devour the will of the user, and this staff increases the potency of sorceries at the cost of increased FP consumption by Skills.";
$sagesCrystalStaff->type = "Staff";
$sagesCrystalStaff->strengthRequirement = 7;
$sagesCrystalStaff->intelligenceRequirement = 24;
$sagesCrystalStaff->setScaling("strength", "E");
$sagesCrystalStaff->setScaling("intelligence", "B");
$sagesCrystalStaff->attackPhysical = 154;
$sagesCrystalStaff->spellBuff = 130;

$sagesCrystalStaff->describeWeapon();

echo("<br><br><hr><br><br>");

$avelyn = new ProjectileWeapon;
$avelyn->name = "Avelyn";
$avelyn->description = "An extremely rare rapid-firing crossbow.<br>
Fires three successive bolts by means of an elaborate mechanism. Inflict heavy damage by making all three shots count.<br>
Despite its use as a weapon, this crossbow is also a priceless work of art, and it bears resemblance to a musical instrument.";
$avelyn->type = "Crossbow";
$avelyn->strengthRequirement = 16;
$avelyn->dexterityRequirement = 14;
$avelyn->attackPhysical = 128;
$avelyn->range = 35;

$avelyn->describeWeapon();


?>
