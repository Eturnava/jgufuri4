<?php
session_start();
require 'components.php';

$users_file = __DIR__ . '/users.json';
if (!file_exists($users_file)) file_put_contents($users_file, '{}');
$users = json_decode(file_get_contents($users_file), true);

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $action = $_POST['action'] ?? '';

    if ($username === '' || $password === '') {
        $message = "Username and password are required.";
    } elseif ($action === 'signup') {
        if (isset($users[$username])) {
            $message = "Username already exists.";
        } else {
            $users[$username] = password_hash($password, PASSWORD_DEFAULT);
            file_put_contents($users_file, json_encode($users));
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        }
    } elseif ($action === 'signin') {
        if (!isset($users[$username]) || !password_verify($password, $users[$username])) {
            $message = "Invalid username or password.";
        } else {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        }
    }
}

render_head("Sign In / Sign Up");
?>
<div class="container mt-5" style="max-width:400px;">
  <h2 class="mb-4">Sign In / Sign Up</h2>
  <?php if ($message): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
  <?php endif; ?>
  <form method="post" class="mb-3">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <button type="submit" name="action" value="signin" class="btn btn-primary">Sign In</button>
    <button type="submit" name="action" value="signup" class="btn btn-secondary">Sign Up</button>
  </form>
</div>
<?php render_footer(); ?>
