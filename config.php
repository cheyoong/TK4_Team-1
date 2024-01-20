<?php
// config.php
$PROTOCOL       = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$HTTP_HOST      = $PROTOCOL.$_SERVER['HTTP_HOST']."/template_spanner";

// MySQL connection
$db_host        = "localhost"; // Change this to your MySQL server host
$db_user        = "root"; // Change this to your MySQL username
$db_pass        = ""; // Change this to your MySQL password
$db_name        = "team1_itdim"; // Change this to your MySQL database name

// mysqli connect
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// enable right logo
$logokanan       = 1;

// debug
$debug_mode      = 1; // 1 = enable debug

// time
date_default_timezone_set('Asia/Jakarta');

// common message
$glo_err_meg     = "<div class='alert alert-danger'>Error ...Session habis atau tidak sinkron Silakan Login ulang <a class='btn btn-success' href=../index.php>LOGIN</a></div>";

// copyright
$copyright       = "2022 Primalogic, All Rights Reserved.";
?>
