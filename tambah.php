<?php

require_once "../config.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST['simpan'])) {

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

    $query = mysqli_query(
        $koneksi,
        "INSERT INTO guru
        (nip, nama, jk, mapel, no_hp, alamat)
        VALUES
        ('$nip', '$nama', '$jk', '$mapel', '$no_hp', '$alamat')"
    );

    if ($query) {

        header("Location: index.php");
        exit;

    } else {

        echo "Gagal: " . mysqli_error($koneksi);

    }

}

require_once "../template/header.php";
require_once "../template/navbar.php";

?>

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-body">

            <h3 class="fw-bold mb-4">
                <i class="bi bi-person-plus"></i>
                Tambah Guru
            </h3>

            <form method="POST">

                <label>NIP</label>

                <input
                    type="text"
                    name="nip"
                    class="form-control mb-3"
                    required>


                <label>Nama Guru</label>

                <input
                    type="text"
                    name="nama"
                    class="form-control mb-3"
                    required>


                <label>Jenis Kelamin</label>

                <select
                    name="jk"
                    class="form-select mb-3"
                    required>

                    <option value="">
                        Pilih Jenis Kelamin
                    </option>

                    <option value="Laki-laki">
                        Laki-laki
                    </option>

                    <option value="Perempuan">
                        Perempuan
                    </option>

                </select>


                <label>Mata Pelajaran</label>

                <input
                    type="text"
                    name="mapel"
                    class="form-control mb-3"
                    required>


                <label>No HP</label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control mb-3"
                    required>


                <label>Alamat</label>

                <textarea
                    name="alamat"
                    class="form-control mb-4"
                    required></textarea>


                <button
                    type="submit"
                    name="simpan"
                    class="btn btn-success">

                    <i class="bi bi-save"></i>
                    Simpan

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