<?php

declare(strict_types=1);

final class Member
{
  private static ?PDO $database = null;

  public int $id = 0;
  public string $first_name = '';
  public string $last_name = '';
  public string $email = '';
  public string $username = '';
  public string $password_hash = '';
  public string $role = 'member';

  public static function set_database(PDO $pdo): void
  {
    self::$database = $pdo;
  }

  private static function db(): PDO
  {
    if (self::$database === null) {
      throw new RuntimeException(
        'Member database connection has not been set.'
      );
    }
    return self::$database;
  }

  // Getting members

  private static function from_row(array $row): self
  {
    $member = new self();
    $member->id = (int) $row['id'];
    $member->first_name = (string) $row['first_name'];
    $member->last_name = (string) $row['last_name'];
    $member->email = (string) $row['email'];
    $member->username = (string) $row['username'];
    $member->password_hash = (string) $row['password_hash'];
    $member->role = (string) $row['role'];

    return $member;
  }

  public static function find_by_username(string $username): ?Member
  {
      $statement = self::db()->prepare(
       'SELECT id, first_name, last_name, email, username, password_hash, role
        FROM members
        WHERE username = :username
        LIMIT 1'
      );

      $statement->execute([
          ':username' => $username
      ]);

      $row = $statement->fetch(PDO::FETCH_ASSOC);
      $row = self::from_row($row);

      return $row;
  }

  // Checking if there's a member for these credentials already

  public static function username_exists(string $username)
  {
    $statement = self::db()->prepare(
      'SELECT COUNT(*) FROM members WHERE username = :username'
    );

    $statement->execute([
      ':username' => $username
    ]);
    
    return $statement->fetchColumn() === 1;
  }

  public static function email_exists(string $email): bool
  {
    $statement = self::db()->prepare(
      'SELECT COUNT(*) FROM members WHERE email = :email'
    );

    $statement->execute([
      ':email' => $email
    ]);

    return $statement->fetchColumn() === 1;
  }

  // Login stuff

  public static function password_verify(string $submitted, Member $targetMember): bool
  {
    return password_verify($submitted, $targetMember->password_hash);
  }

  public static function is_logged_in(): bool
  {
    return isset($_SESSION['member_id']);
  }

  public static function require_login(): void
  {
    if (!self::is_logged_in()) {
      header('Location: login.php');
      exit;
    }
  }

  // New member

  public function create()
  {
    $statement = self::db()->prepare(
      'INSERT INTO members (first_name, last_name, email, username, password_hash, role)
        VALUES (:first_name, :last_name, :email, :username, :password_hash, :role)'
    );

    $statement->execute([
      ':first_name' => $this->first_name,
      ':last_name' => $this->last_name,
      ':email' => $this->email,
      ':username' => $this->username,
      ':password_hash' => $this->password_hash,
      ':role' => 'member'
    ]);

    return $statement;
  }
}
