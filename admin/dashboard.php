<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin Portfolio</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --danger: #ef4444;
      --danger-dark: #b91c1c;
      --bg: #f8fafc;
      --card-bg: #ffffff;
      --text: #0f172a;
      --muted: #64748b;
      --radius: 12px;
      --shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: var(--bg);
      color: var(--text);
    }

    .navbar {
      background: var(--card-bg);
      padding: 18px 30px;
      font-size: 18px;
      font-weight: 600;
      box-shadow: var(--shadow);
    }

    
    .container {
      padding: 40px 30px;
      max-width: 1100px;
      margin: auto;
    }

    h2 {
      margin-bottom: 8px;
    }

    p {
      margin-top: 0;
      color: var(--muted);
    }

 
    .card-wrapper {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 24px;
      margin-top: 30px;
    }

    .card {
      background: var(--card-bg);
      border-radius: var(--radius);
      padding: 28px;
      box-shadow: var(--shadow);
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    .card h3 {
      margin: 0 0 10px;
      font-size: 18px;
    }

    .card p {
      font-size: 14px;
      line-height: 1.6;
    }

  
    .btn {
      display: inline-block;
      margin-top: 16px;
      padding: 10px 18px;
      font-size: 14px;
      font-weight: 500;
      border-radius: 8px;
      text-decoration: none;
      background: var(--primary);
      color: #fff;
      transition: background 0.2s ease;
    }

    .btn:hover {
      background: var(--primary-dark);
    }

    .btn-danger {
      background: var(--danger);
    }

    .btn-danger:hover {
      background: var(--danger-dark);
    }

    
    @media (max-width: 600px) {
      .container {
        padding: 25px 20px;
      }
    }
  </style>
</head>

<body>

  <div class="navbar">
    Dashboard Admin Portfolio
  </div>

  <div class="container">
    <h2>Selamat Datang 👋</h2>
    <p>Kelola konten website portfolio Anda melalui menu di bawah.</p>

    <div class="card-wrapper">

      <div class="card">
        <h3>📁 Kelola Project</h3>
        <p>Tambah, edit, dan hapus project portfolio yang ditampilkan.</p>
        <a href="project/project.php" class="btn">Masuk</a>
      </div>

      <div class="card">
        <h3>🛠️ Kelola Skill</h3>
        <p>Atur daftar skill agar selalu relevan dan up-to-date.</p>
        <a href="skill/skill.php" class="btn">Masuk</a>
      </div>

      <div class="card">
        <h3>📩 Pesan Masuk</h3>
        <p>Lihat pesan dari pengunjung website.</p>
        <a href="contact/contact.php" class="btn">Masuk</a>
      </div>


      <div class="card">
        <h3>🚪 Logout</h3>
        <p>Keluar dari halaman admin dengan aman.</p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>

    </div>
  </div>

</body>

</html>