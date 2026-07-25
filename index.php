<?php

require_once "../config.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$title = "Data Guru";

/* =========================
   PENCARIAN
========================= */

$cari = "";

if (isset($_GET['cari'])) {
    $cari = mysqli_real_escape_string(
        $koneksi,
        $_GET['cari']
    );
}

/* =========================
   QUERY DATA
========================= */

$where = "";

if ($cari != "") {

    $where = "WHERE
        nip LIKE '%$cari%'
        OR nama LIKE '%$cari%'
        OR mapel LIKE '%$cari%'
        OR no_hp LIKE '%$cari%'";
}

/* =========================
   PAGINATION
========================= */

$batas = 10;

$halaman = isset($_GET['halaman'])
    ? (int) $_GET['halaman']
    : 1;

if ($halaman < 1) {
    $halaman = 1;
}

$mulai = ($halaman - 1) * $batas;

/* Hitung jumlah data */

$query_total = mysqli_query(
    $koneksi,
    "SELECT id FROM guru $where"
);

$total_data = mysqli_num_rows($query_total);

$total_halaman = ceil(
    $total_data / $batas
);

/* Ambil data */

$data = mysqli_query(
    $koneksi,
    "SELECT *
     FROM guru
     $where
     ORDER BY id DESC
     LIMIT $mulai, $batas"
);

require_once "../template/header.php";
require_once "../template/navbar.php";

?>

<div class="container-fluid px-4 py-4">

    <!-- HEADER -->

    <div class="d-flex justify-content-between
                align-items-center
                flex-wrap
                gap-2
                mb-4">

        <div>

            <h2 class="fw-bold">
                <i class="bi bi-person-workspace"></i>
                Data Guru
            </h2>

            <p class="text-muted mb-0">
                Kelola data guru sekolah
            </p>

        </div>

        <a
            href="tambah.php"
            class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>
            Tambah Guru

        </a>

    </div>


    <!-- CARD -->

    <div class="card shadow-sm">

        <div class="card-body">

            <!-- SEARCH -->

            <form
                method="GET"
                class="row g-2 mb-4">

                <div class="col-md-8">

                    <input
                        type="text"
                        name="cari"
                        class="form-control"
                        placeholder="Cari NIP, nama, atau mata pelajaran..."
                        value="<?= htmlspecialchars($cari); ?>">

                </div>

                <div class="col-md-2">

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        <i class="bi bi-search"></i>
                        Cari

                    </button>

                </div>

                <div class="col-md-2">

                    <a
                        href="index.php"
                        class="btn btn-secondary w-100">

                        Reset

                    </a>

                </div>

            </form>


            <!-- INFO -->

            <p class="text-muted">

                Total data guru:

                <strong>
                    <?= $total_data; ?>
                </strong>

            </p>


            <!-- TABLE -->

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Mata Pelajaran</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th width="130">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    if (mysqli_num_rows($data) > 0):

                        $no = $mulai + 1;

                        while ($row = mysqli_fetch_assoc($data)):

                    ?>

                        <tr>

                            <td>
                                <?= $no++; ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['nip']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['nama']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['jk']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['mapel']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['no_hp']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['alamat']); ?>
                            </td>

                            <td>

                                <a
                                    href="edit.php?id=<?= $row['id']; ?>"
                                    class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <a
                                    href="hapus.php?id=<?= $row['id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data guru ini?');">

                                    <i class="bi bi-trash"></i>

                                </a>

                            </td>

                        </tr>

                    <?php

                        endwhile;

                    else:

                    ?>

                        <tr>

                            <td
                                colspan="8"
                                class="text-center py-4">

                                Data guru belum tersedia.

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>


            <!-- PAGINATION -->

            <?php if ($total_halaman > 1): ?>

            <nav class="mt-4">

                <ul class="pagination justify-content-center">

                    <?php for ($i = 1; $i <= $total_halaman; $i++): ?>

                        <li class="page-item
                            <?= ($i == $halaman)
                                ? 'active'
                                : ''; ?>">

                            <a
                                class="page-link"
                                href="?halaman=<?= $i; ?>&cari=<?= urlencode($cari); ?>">

                                <?= $i; ?>

                            </a>

                        </li>

                    <?php endfor; ?>

                </ul>

            </nav>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php

require_once "../template/footer.php";

?>