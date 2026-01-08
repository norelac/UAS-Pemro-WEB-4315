<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
  exit;
}
include "../../backend/config/database.php";
$q = mysqli_query($conn, "SELECT * FROM skill");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Skill - Admin</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --danger: #ef4444;
      --danger-dark: #b91c1c;
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
      max-width: 900px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .header h2 {
      margin: 0;
      font-size: 22px;
    }

    .btn-add {
      text-decoration: none;
      padding: 10px 18px;
      font-size: 14px;
      font-weight: 500;
      border-radius: 10px;
      background: var(--primary);
      color: #fff;
      transition: background 0.2s;
    }

    .btn-add:hover {
      background: var(--primary-dark);
    }

    .skill-list {
      background: var(--card);
      border-radius: var(--radius);
      padding: 25px;
      box-shadow: var(--shadow);
    }

    .skill-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 16px;
      border-radius: 10px;
      transition: background 0.2s;
    }

    .skill-item:not(:last-child) {
      margin-bottom: 10px;
    }

    .skill-item:hover {
      background: #f1f5f9;
    }

    .skill-info {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .skill-color {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      border: 1px solid var(--border);
    }

    .skill-name {
      font-size: 15px;
      font-weight: 500;
    }

    
    .skill-actions a {
      text-decoration: none;
      font-size: 13px;
      padding: 6px 12px;
      border-radius: 8px;
      margin-left: 6px;
      transition: background 0.2s;
    }

    .btn-edit {
      background: #fde68a;
      color: #92400e;
    }

    .btn-edit:hover {
      background: #fcd34d;
    }

    .btn-delete {
      background: #fee2e2;
      color: #991b1b;
    }

    .btn-delete:hover {
      background: #fecaca;
    }

    .empty-state {
      text-align: center;
      padding: 40px;
      color: var(--muted);
      font-size: 14px;
    }

    .empty-state span {
      font-size: 42px;
      display: block;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>

  <div class="navbar">
    <span>Kelola Skill</span>
    <a href="../dashboard.php">Dashboard</a>
  </div>

  <div class="container">
    <div class="header">
      <h2>Daftar Skill</h2>
      <a href="tambahskill.php" class="btn-add">+ Tambah Skill</a>
    </div>

    <div class="skill-list">
      <?php if (mysqli_num_rows($q) > 0): ?>
        <?php while ($s = mysqli_fetch_assoc($q)) { ?>
          <div class="skill-item">
            <div class="skill-info">
              <div class="skill-color" style="background: <?= htmlspecialchars($s['warna'] ?? '#2563eb'); ?>;"></div>
              <span class="skill-name"><?= htmlspecialchars($s['nama_skill']); ?></span>
            </div>
            <div class="skill-actions">
              <a href="edit.php?id=<?= $s['id']; ?>" class="btn-edit">Edit</a>
              <a href="hapus_skil.php?id=<?= $s['id']; ?>" class="btn-delete"
                 onclick="return confirm('Yakin ingin menghapus skill ini?')">Hapus</a>
            </div>
          </div>
        <?php } ?>
      <?php else: ?>
        <div class="empty-state">
          <span>📭</span>
          <p>Belum ada skill yang ditambahkan.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>

</body>
</html>
