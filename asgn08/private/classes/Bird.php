<?php

declare(strict_types=1);

/**
 * GRADED ASSIGNMENT STARTER. Implement the TODOs yourself.
 * This is a read-only slice of Active Record; saving records comes later.
 */
final class Bird
{
    private static ?PDO $database = null;

    public int $id = 0;
    public string $common_name = '';
    public string $scientific_name = '';
    public string $family_name = '';
    public string $primary_habitat = '';
    public string $seasonal_status = '';
    public string $description = '';

    public static function set_database(PDO $pdo): void
    {
        self::$database = $pdo;
    }

    /** @return Bird[] */
    public static function find_all(): array
    {
      $all_birds = self::$database->query('
        SELECT id, common_name, scientific_name, family_name, primary_habitat, seasonal_status, description
        FROM birds
        ORDER BY common_name'
      );
      $all_birds = $all_birds->fetchAll(PDO::FETCH_ASSOC);
      
      $object_birds = [];
      if ($all_birds) {
        foreach ($all_birds as $bird) {
          $object_birds[] = self::from_row($bird);
        }
      }

      return $object_birds;
    }

    public static function find_by_id(int $id): ?self
    {
      $sql = 'SELECT id, common_name, scientific_name, family_name, primary_habitat, seasonal_status, description
              FROM birds
              WHERE id = :id';
      $statement = self::$database->prepare($sql);
      $statement->execute(['id' => $id]);
      $bird_from_id = $statement->fetch(PDO::FETCH_ASSOC);

      if ($bird_from_id) {
        $bird_from_id = self::from_row($bird_from_id);
      } else {
        $bird_from_id = null;
      }

      return $bird_from_id;
    }

    // Refactoring task: both query methods should reuse this single mapper.
    private static function from_row(array $row): self
    {
      $bird = new self();
      $bird->id = (int) $row['id'];
      $bird->common_name = (string) $row['common_name'];
      $bird->scientific_name = (string) $row['scientific_name'];
      $bird->family_name = (string) $row['family_name'];
      $bird->primary_habitat = (string) $row['primary_habitat'];
      $bird->seasonal_status = (string) $row['seasonal_status'];
      $bird->description = (string) $row['description'];
      return $bird;
    }

    public static function count_all(): int
    {
      $count = (int) self::$database->query('SELECT COUNT(*) FROM birds')->fetchColumn();
      return $count;
    }
}
