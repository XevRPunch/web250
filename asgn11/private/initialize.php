<?php

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$project_root = dirname(__DIR__);
$private_path = __DIR__;

$autoload = $project_root . '/vendor/autoload.php';
if (!file_exists($autoload)) {
  exit('Composer dependencies are missing. Run: composer install');
}
require_once $autoload;

$dotenv = Dotenv\Dotenv::createImmutable($project_root);
$dotenv->load();

require_once $private_path . '/functions.php';
require_once $private_path . '/classes/Database.php';
require_once $private_path . '/classes/Bird.php';
require_once $private_path . '/classes/Member.php';

$pdo = Database::connect();
Bird::set_database($pdo);
Member::set_database($pdo);
