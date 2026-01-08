<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
  exit;
}
include "../../backend/config/database.php";


$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
  mysqli_query($conn, "DELETE FROM skill WHERE id = $id");
}

header("Location: skill.php");
exit;
?>