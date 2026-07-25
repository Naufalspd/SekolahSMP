<?php

require_once "../config.php";

// Cek login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

// Nama file Excel
$nama_file = "Data_Siswa_" . date("Y-m-d") . ".xls";

// Perintah download Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$nama_file\"");
header("Pragma: no-cache");
header("Expires: 0");

// Ambil semua data siswa
$data = mysqli_query(
    $koneksi,
    "SELECT *
     FROM siswa
     ORDER BY id ASC"
);

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Data Siswa</title>

</head>

<body>

    <h2>DATA SISWA</h2>

    <table border="1">

        <thead>

            <tr>

                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Alamat</th>

            </tr>

        </thead>

        <tbody>

        <?php

        $no = 1;

        while ($row = mysqli_fetch_assoc($data)):

        ?>

            <tr>

                <td>
                    <?= $no++; ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['nis']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['nama']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['jk']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['kelas']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['alamat']); ?>
                </td>

            </tr>

        <?php endwhile; ?>

        </tbody>

    </table>

</body>

</html>