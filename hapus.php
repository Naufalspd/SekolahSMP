<?php

require_once "../config.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    mysqli_query(
        $koneksi,
        "DELETE FROM guru WHERE id = $id"
    );
}

header("Location: index.php");
exit;