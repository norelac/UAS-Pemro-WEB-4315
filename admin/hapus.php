<?php
session_start();
include "../../backend/config/database.php";

if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
  exit;
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM skill WHERE id='$id'");

header("Location: index.php");
exit;
