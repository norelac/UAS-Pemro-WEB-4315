<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
  exit;
}

include "../../backend/config/database.php";
$q = mysqli_query($conn, "SELECT * FROM contact ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesan Masuk</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f8;
      margin: 0;
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
    }

    .btn-dashboard {
      background: #2563eb;
      color: #fff;
      padding: 8px 16px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
    }

    .btn-dashboard:hover {
      background: #1e40af;
    }

    .container {
      max-width: 1100px;
      margin: 30px auto;
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 14px;
      border-bottom: 1px solid #e5e7eb;
      vertical-align: top;
      font-size: 14px;
    }

    th {
      background: #f1f5f9;
      text-align: left;
    }

    tr:hover {
      background: #f9fafb;
    }
  </style>
</head>

<body>


<div class="navbar">
  <h2> Pesan Masuk</h2>
  <a href="../dashboard.php" class="btn-dashboard">Dashboard</a>
</div>

<div class="container">

  <table>
    <tr>
      <th>Nama</th>
      <th>Email</th>
      <th>Pesan</th>
      <th>Tanggal</th>
    </tr>

    <?php while ($c = mysqli_fetch_assoc($q)) { ?>
      <tr>
        <td><?= htmlspecialchars($c['nama']); ?></td>
        <td><?= htmlspecialchars($c['email']); ?></td>
        <td><?= nl2br(htmlspecialchars($c['pesan'])); ?></td>
        <td><?= $c['created_at'] ?? '-'; ?></td>
      </tr>
    <?php } ?>

  </table>

</div>

</body>
</html>
