<?php
date_default_timezone_set('Asia/Jakarta');


$local = true;

if ($local) {
    $conn = mysqli_connect("localhost", "root", "", "portfolio");

    if (!$conn) {
        die("Database local error: " . mysqli_connect_error());
    }
} else {
    $servername = "sql202.infinityfree.com";
    $username   = "if0_40844680";
    $password   = "I1ma0Cq47A1Kwn";
    $db         = "if0_40844680_portfolio";

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
