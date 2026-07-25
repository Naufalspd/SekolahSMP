<?php

require_once "../config.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$id = (int) $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM guru WHERE id = $id"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data guru tidak ditemukan.";
    exit;
}


if (isset($_POST['update'])) {

    $nip = mysqli_real_escape_string(
        $koneksi,
        $_POST['nip']
    );

    $nama = mysqli_real_escape_string(
        $koneksi,
        $_POST['nama']
    );

    $jk = mysqli_real_escape_string(
        $koneksi,
        $_POST['jk']
    );

    $mapel = mysqli_real_escape_string(
        $koneksi,
        $_POST['mapel']
    );

    $no_hp = mysqli_real_escape_string(
        $koneksi,
        $_POST['no_hp']
    );

    $alamat = mysqli_real_escape_string(
        $koneksi,
        $_POST['alamat']
    );


    mysqli_query(
        $koneksi,
        "UPDATE guru SET

        nip = '$nip',
        nama = '$nama',
        jk = '$jk',
        mapel = '$mapel',
        no_hp = '$no_hp',
        alamat = '$alamat'

        WHERE id = $id"
    );


    header("Location: index.php");
    exit;

}

require_once "../template/header.php";
require_once "../template/navbar.php";

?>

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-body">

            <h3 class="fw-bold mb-4">
                <i class="bi bi-pencil-square"></i>
                Edit Guru
            </h3>

            <form method="POST">

                <label>NIP</label>

                <input
                    type="text"
                    name="nip"
                    class="form-control mb-3"
                    value="<?= htmlspecialchars($data['nip']); ?>"
                    required>


                <label>Nama Guru</label>

                <input
                    type="text"
                    name="nama"
                    class="form-control mb-3"
                    value="<?= htmlspecialchars($data['nama']); ?>"
                    required>


                <label>Jenis Kelamin</label>

                <select
                    name="jk"
                    class="form-select mb-3"
                    required>

                    <option value="Laki-laki"
                        <?= $data['jk'] == 'Laki-laki'
                            ? 'selected'
                            : ''; ?>>

                        Laki-laki

                    </option>

                    <option value="Perempuan"
                        <?= $data['jk'] == 'Perempuan'
                            ? 'selected'
                            : ''; ?>>

                        Perempuan

                    </option>

                </select>


                <label>Mata Pelajaran</label>

                <input
                    type="text"
                    name="mapel"
                    class="form-control mb-3"
                    value="<?= htmlspecialchars($data['mapel']); ?>"
                    required>


                <label>No HP</label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control mb-3"
                    value="<?= htmlspecialchars($data['no_hp']); ?>"
                    required>


                <label>Alamat</label>

                <textarea
                    name="alamat"
                    class="form-control mb-4"
                    required><?= htmlspecialchars($data['alamat']); ?></textarea>


                <button
                    type="submit"
                    name="update"
                    class="btn btn-warning">

                    <i class="bi bi-save"></i>
                    Update

                </button>

                <a
                    href="index.php"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

<?php

require_once "../template/footer.php";

?>