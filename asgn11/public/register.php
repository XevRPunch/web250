<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/private/initialize.php';

$error_message = '';

$first_name = '';
$last_name = '';
$email = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $first_name = trim($_POST['first_name'] ?? '');
  $last_name = trim($_POST['last_name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';
  $confirm_password = $_POST['confirm_password'] ?? '';

  // Validation

  if ($first_name === '' || $last_name === '' || $email === '' || $username === '' || $password === '' || $confirm_password === '') {
    $error_message = 'Fill all fields.';
  } elseif (Member::username_exists($username)) {
    $error_message = 'The username entered is already registered.';
  } elseif (Member::email_exists($email)) {
    $error_message = 'The email address entered is already registered.';
  } elseif (strlen($password) < 8) {
    $error_message = 'Password must be at least 8 characters.';
  } elseif ($password !== $confirm_password) {
    $error_message = 'Passwords do not match.';
  } else {

    // Create member after validation successful and go to login.php

    $passwordHash = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $member = new Member();
    $member->first_name = $first_name;
    $member->last_name = $last_name;
    $member->email = $email;
    $member->username = $username;
    $member->password_hash = $passwordHash;
    $member->role = 'member';

    // User logged in if member creation successful

    if ($member->create()) {
      session_regenerate_id(true);
      $_SESSION['member_id'] = $member->id;
      $_SESSION['username'] = $member->username;
      $_SESSION['role'] = $member->role;
      header('Location: birds.php');
      exit;
    }

    // If creation fails for some reason

    $error_message = 'The account could not be created.';
  }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register</title>
</head>
<body>
    <h1>Create an Account</h1>

    <p><a href="birds.php">Back to bird directory</a></p>

    <?php if ($error_message !== ''): ?>
        <p><?= h($error_message) ?></p>
    <?php endif; ?>

    <form method="post" action="register.php">
        <p>
            <label for="first_name">First Name</label><br>
            <input
                type="text"
                id="first_name"
                name="first_name"
                value="<?= h($first_name) ?>"
                required
            >
        </p>

        <p>
            <label for="last_name">Last Name</label><br>
            <input
                type="text"
                id="last_name"
                name="last_name"
                value="<?= h($last_name) ?>"
                required
            >
        </p>

        <p>
            <label for="email">Email</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= h($email) ?>"
                required
            >
        </p>

        <p>
            <label for="username">Username</label><br>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= h($username) ?>"
                required
            >
        </p>

        <p>
            <label for="password">Password</label><br>
            <input
                type="password"
                id="password"
                name="password"
                minlength="8"
                required
            >
        </p>

        <p>
            <label for="confirm_password">Confirm Password</label><br>
            <input
                type="password"
                id="confirm_password"
                name="confirm_password"
                minlength="8"
                required
            >
        </p>

        <p>
            <button type="submit">Register</button>
        </p>
    </form>
</body>
</html>
