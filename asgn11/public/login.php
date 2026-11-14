<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/private/initialize.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';

  if ($username === '' || $password === '') {
    $error_message = 'Fill all fields.';
  } else {
    $member = Member::find_by_username($username);

    if ($member && password_verify($password, $member->password_hash)) {
      session_regenerate_id(true);
      $_SESSION['member_id'] = $member->id;
      $_SESSION['username'] = $member->username;
      $_SESSION['role'] = $member->role;
      header('Location: birds.php');
      exit;
    }

    $error_message = 'Incorrect username or password.';
  }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Log In</title>
</head>
<body>
    <h1>Log In</h1>

    <p><a href="birds.php">Back to bird directory</a></p>

    <?php if ($error_message !== ''): ?>
        <p><?= h($error_message) ?></p>
    <?php endif; ?>

    <form method="post" action="login.php">
        <p>
            <label for="username">Username</label><br>
            <input
                type="text"
                id="username"
                name="username"
                required
                autocomplete="username"
            >
        </p>

        <p>
            <label for="password">Password</label><br>
            <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
            >
        </p>

        <p>
            <button type="submit">Log In</button>
        </p>
    </form>
</body>
</html>
