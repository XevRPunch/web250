<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/private/initialize.php';

session_destroy();

header('Location: birds.php');

exit;
