<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_sekolah1"
);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$main_url = "http://localhost/sekolah1/";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}