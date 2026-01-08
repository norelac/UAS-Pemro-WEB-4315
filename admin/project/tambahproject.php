<?php
include "../../backend/config/database.php";

if (isset($_POST['simpan'])) {
  mysqli_query($conn, "INSERT INTO project VALUES(
    null,
    '$_POST[judul]',
    '$_POST[deskripsi]',
    '$_POST[gambar]',
    '$_POST[link]',
    '$_POST[github]'
  )");
  header("Location: project.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Project</title>

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
      background: #ffffff;
      padding: 18px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .navbar h2 {
      margin: 0;
      font-size: 20px;
      font-weight: 600;
    }

    .btn-dashboard {
      background: var(--primary);
      color: #fff;
      padding: 8px 16px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
    }

    .btn-dashboard:hover {
      background: var(--primary-dark);
    }

  
    .container {
      max-width: 700px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .card {
      background: var(--card);
      border-radius: var(--radius);
      padding: 30px;
      box-shadow: var(--shadow);
    }

    h3 {
      margin-top: 0;
      text-align: center;
      font-size: 22px;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 6px;
      color: #334155;
    }

    input,
    textarea {
      width: 100%;
      padding: 12px 14px;
      font-size: 14px;
      border-radius: 10px;
      border: 1px solid var(--border);
      outline: none;
      transition: all 0.2s;
      font-family: inherit;
    }

    textarea {
      resize: vertical;
      min-height: 120px;
    }

    input:focus,
    textarea:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
    }

    .btn {
      margin-top: 10px;
      width: 100%;
      padding: 14px;
      background: var(--primary);
      color: #fff;
      border: none;
      border-radius: 12px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s, transform 0.1s;
    }

    .btn:hover {
      background: var(--primary-dark);
      transform: translateY(-1px);
    }

    .back {
      display: block;
      margin-top: 18px;
      text-align: center;
      text-decoration: none;
      font-size: 14px;
      color: var(--muted);
    }

    .back:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>


<div class="navbar">
  <h2>Tambah Project</h2>
  <a href="../dashboard.php" class="btn-dashboard">Dashboard</a>
</div>


<div class="container">
  <div class="card">
    <h3>Form Tambah Project</h3>

    <form method="post">
      <div class="form-group">
        <label>Judul Project</label>
        <input type="text" name="judul" placeholder="Contoh: Web Portfolio" required>
      </div>

      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" placeholder="Deskripsi singkat project" required></textarea>
      </div>

      <div class="form-group">
        <label>Nama File Gambar</label>
        <input type="text" name="gambar" placeholder="contoh: project1.png" required>
      </div>

      <div class="form-group">
        <label>Link Demo</label>
        <input type="text" name="link" placeholder="https://example.com">
      </div>

      <div class="form-group">
        <label>Link GitHub</label>
        <input type="text" name="github" placeholder="https://github.com/username/project">
      </div>

      <button class="btn" name="simpan">Simpan Project</button>
    </form>

    <a href="project.php" class="back">← Kembali ke Daftar Project</a>
  </div>
</div>

</body>
</html>
