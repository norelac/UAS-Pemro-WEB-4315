<?php
session_start();
include "../backend/config/database.php";

if (isset($_POST['login'])) {
  $u = $_POST['username'];
  $p = $_POST['password'];

  $q = mysqli_query($conn, "SELECT * FROM admin WHERE username='$u'");
  $data = mysqli_fetch_assoc($q);

  if ($data && password_verify($p, $data['password'])) {
    $_SESSION['admin'] = $data['id'];
    header("Location: dashboard.php");
    exit;
  } else {
    $error = "Username atau password salah";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>

  
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --bg: #f8fafc;
      --card: #ffffff;
      --text: #0f172a;
      --muted: #64748b;
      --danger-bg: #fee2e2;
      --danger-text: #b91c1c;
      --radius: 14px;
      --shadow: 0 20px 40px rgba(0,0,0,0.08);
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      height: 100vh;
      background: var(--bg);
      font-family: 'Inter', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text);
    }

    .login-box {
      width: 100%;
      max-width: 380px;
      background: var(--card);
      padding: 35px;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
    }

    .login-box h3 {
      margin: 0 0 25px;
      text-align: center;
      font-size: 22px;
      font-weight: 600;
    }

    .login-box input {
      width: 100%;
      padding: 12px 14px;
      margin-bottom: 15px;
      border-radius: 10px;
      border: 1px solid #e5e7eb;
      font-size: 14px;
      transition: border 0.2s;
    }

    .login-box input:focus {
      outline: none;
      border-color: var(--primary);
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      background: var(--primary);
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 15px;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.2s;
    }

    .login-box button:hover {
      background: var(--primary-dark);
    }

    .error {
      background: var(--danger-bg);
      color: var(--danger-text);
      padding: 10px;
      border-radius: 10px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h3>Login Admin</h3>

    <?php if(isset($error)) : ?>
      <div class="error"><?= $error; ?></div>
    <?php endif; ?>

    <form method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button name="login">Login</button>
    </form>
  </div>

</body>
</html>
