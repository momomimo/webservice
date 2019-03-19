<?php
$dbname = "db_desakita";
$hostname = "localhost";
$username = "root";
$password = "";

$koneksi = mysqli_connect($hostname, $username, $password, $dbname);
if (!$koneksi) {
    die("Connection Failed:" . mysqli_connect_error());
}
 