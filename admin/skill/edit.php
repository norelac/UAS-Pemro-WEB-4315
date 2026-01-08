<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
  exit;
}
include "../../backend/config/database.php";


$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$skill = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM skill WHERE id = $id"));

if (!$skill) {
  header("Location: skill.php");
  exit;
}

if (isset($_POST['update'])) {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $warna = mysqli_real_escape_string($conn, $_POST['warna']);

  mysqli_query($conn, "UPDATE skill SET nama_skill = '$nama', warna = '$warna' WHERE id = $id");
  header("Location: skill.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Skill - Admin</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --bg: #f8fafc;
      --card: #ffffff;
      --text: #0f172a;
      --muted: #64748b;
      --border: #e5e7eb;
      --radius: 14px;
      --shadow: 0 20px 40px rgba(0,0,0,0.08);
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
    }

    
    .navbar {
      background: var(--card);
      padding: 18px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: var(--shadow);
    }

    .navbar span {
      font-size: 18px;
      font-weight: 600;
    }

    .navbar a {
      text-decoration: none;
      font-size: 14px;
      padding: 8px 14px;
      border-radius: 8px;
      background: var(--primary);
      color: #fff;
      transition: background 0.2s;
    }

    .navbar a:hover {
      background: var(--primary-dark);
    }


    .container {
      max-width: 600px;
      margin: 40px auto;
      padding: 0 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 22px;
    }

  
    .form-card {
      background: var(--card);
      border-radius: var(--radius);
      padding: 35px;
      box-shadow: var(--shadow);
    }

    .info {
      background: #eef2ff;
      color: #3730a3;
      padding: 12px 16px;
      border-radius: 10px;
      font-size: 14px;
      margin-bottom: 25px;
    }

    
    .form-group {
      margin-bottom: 22px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      font-size: 14px;
    }

    input[type="text"],
    input[type="color"] {
      width: 100%;
      padding: 12px 14px;
      border-radius: 10px;
      border: 1px solid var(--border);
      font-size: 14px;
      transition: border 0.2s;
    }

    input[type="text"]:focus,
    input[type="color"]:focus {
      outline: none;
      border-color: var(--primary);
    }

    input[type="color"] {
      height: 52px;
      cursor: pointer;
    }

    .color-preview {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-top: 10px;
      font-size: 13px;
      color: var(--muted);
    }

    .preview-box {
      width: 36px;
      height: 36px;
      border-radius: 8px;
      border: 1px solid var(--border);
    }

  
    .btn-group {
      display: flex;
      gap: 15px;
      margin-top: 30px;
    }

    .btn {
      flex: 1;
      padding: 12px;
      border-radius: 10px;
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      border: none;
      text-decoration: none;
      text-align: center;
      transition: background 0.2s;
    }

    .btn-update {
      background: var(--primary);
      color: #fff;
    }

    .btn-update:hover {
      background: var(--primary-dark);
    }

    .btn-cancel {
      background: #e5e7eb;
      color: #374151;
    }

    .btn-cancel:hover {
      background: #d1d5db;
    }
  </style>
</head>

<body>

  <div class="navbar">
    <span>Edit Skill</span>
    <a href="skill.php">Kembali</a>
  </div>

  <div class="container">
    <h2>Edit Skill</h2>

    <div class="form-card">
      <div class="info">
        Mengedit skill: <strong><?= htmlspecialchars($skill['nama_skill']); ?></strong>
      </div>

      <form method="post">
        <div class="form-group">
          <label>Nama Skill</label>
          <input type="text" name="nama" value="<?= htmlspecialchars($skill['nama_skill']); ?>" required>
        </div>

        <div class="form-group">
          <label>Warna Skill</label>
          <input type="color" name="warna" id="warna"
            value="<?= htmlspecialchars($skill['warna'] ?? '#2563eb'); ?>">
          <div class="color-preview">
            <div class="preview-box" id="colorPreview"
              style="background: <?= htmlspecialchars($skill['warna'] ?? '#2563eb'); ?>"></div>
            <span>Preview warna</span>
          </div>
        </div>

        <div class="btn-group">
          <a href="skill.php" class="btn btn-cancel">Batal</a>
          <button type="submit" name="update" class="btn btn-update">Update</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('warna').addEventListener('input', function () {
      document.getElementById('colorPreview').style.background = this.value;
    });
  </script>

</body>
</html>
