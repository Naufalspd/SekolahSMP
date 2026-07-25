<?php

require_once "config.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$title = "Dashboard - Sistem Akademik";


// =========================
// HITUNG DATA
// =========================

function jumlahData($koneksi, $tabel)
{
    $query = mysqli_query(
        $koneksi,
        "SELECT COUNT(*) AS total FROM $tabel"
    );

    $data = mysqli_fetch_assoc($query);

    return $data['total'];
}


$total_siswa = jumlahData($koneksi, "siswa");
$total_guru  = jumlahData($koneksi, "guru");
$total_mapel = jumlahData($koneksi, "mapel");
$total_ujian = jumlahData($koneksi, "ujian");


require_once "template/header.php";
require_once "template/navbar.php";

?>


<style>

/* =========================
   DARK MODE DASHBOARD
========================= */

body {
    background: #0f172a;
    color: #e2e8f0;
}


/* HERO DASHBOARD */

.hero-dashboard {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    background: #0b1328;
    border: 1px solid #263653;
    color: white;
}


/* BAGIAN TEKS */

.hero-text {
    padding: 45px 45px 35px;
    position: relative;
    z-index: 2;
}


.hero-label {
    color: #cbd5e1;
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 15px;
}


.hero-label i {
    margin-right: 6px;
}


.hero-text h1 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 10px;
}


.hero-text p {
    color: #cbd5e1;
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 0;
}


/* GAMBAR LEBAR */

.hero-image {
    width: 100%;
    height: 250px;
    overflow: hidden;
}


.hero-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}


/* EFEK GELAP PADA GAMBAR */

.hero-image::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: 250px;
    background: linear-gradient(
        to bottom,
        transparent,
        rgba(11, 19, 40, 0.4)
    );
    pointer-events: none;
}


/* RESPONSIVE HP */

@media (max-width: 768px) {

    .hero-text {
        padding: 30px 25px;
    }

    .hero-text h1 {
        font-size: 28px;
    }

    .hero-text p {
        font-size: 14px;
    }

    .hero-image {
        height: 180px;
    }

}


/* =========================
   STAT CARD
========================= */

.stat-card {

    background: #1e293b;

    border: 1px solid #334155;

    border-radius: 18px;

    transition: all 0.3s ease;

    overflow: hidden;

}


.stat-card:hover {

    transform: translateY(-6px);

    background: #243247;

    box-shadow:
        0 15px 35px
        rgba(0, 0, 0, 0.35) !important;

    border-color: #475569;

}


.stat-card h2 {

    color: #f8fafc !important;

}


.stat-card p {

    color: #94a3b8 !important;

}


.stat-card small {

    color: #64748b !important;

}


/* =========================
   ICON
========================= */

.stat-icon {

    width: 55px;

    height: 55px;

    border-radius: 15px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 24px;

}


/* BLUE */

.icon-blue {

    background: rgba(59, 130, 246, 0.15);

    color: #60a5fa;

}


/* GREEN */

.icon-green {

    background: rgba(34, 197, 94, 0.15);

    color: #4ade80;

}


/* YELLOW */

.icon-yellow {

    background: rgba(234, 179, 8, 0.15);

    color: #facc15;

}


/* RED */

.icon-red {

    background: rgba(239, 68, 68, 0.15);

    color: #f87171;

}


/* =========================
   CHART CARD
========================= */

.chart-card {

    background: #1e293b;

    border: 1px solid #334155;

    border-radius: 18px;

    color: #e2e8f0;

}


.chart-card h5 {

    color: #f8fafc;

}


.chart-card p {

    color: #94a3b8 !important;

}


/* =========================
   QUICK MENU
========================= */

.quick-menu {

    background: #1e293b;

    border: 1px solid #334155;

    border-radius: 18px;

    color: #e2e8f0;

}


.quick-menu h5 {

    color: #f8fafc;

}


.quick-menu p {

    color: #94a3b8 !important;

}


.quick-btn {

    border-radius: 12px;

    padding: 12px;

    font-weight: 500;

    transition: all 0.3s ease;

}


.quick-btn:hover {

    transform: translateY(-3px);

    box-shadow:
        0 8px 20px
        rgba(0, 0, 0, 0.3);

}


/* =========================
   CHART TEXT
========================= */

.chart-card canvas {

    color: #cbd5e1;

}


/* =========================
   RESPONSIVE
========================= */

@media(max-width: 768px) {

    .hero-dashboard {

        padding: 30px;

        min-height: 280px;

    }


    .hero-content h1 {

        font-size: 28px;

    }

}

</style>


<div class="container-fluid px-4 py-4">

<!-- HERO DASHBOARD -->

<div class="hero-dashboard mb-4">

    <!-- TEKS -->

    <div class="hero-text">

        <div class="hero-label">
            <i class="bi bi-building-fill"></i>
            SISTEM AKADEMIK SEKOLAH
        </div>

        <h1>
            Selamat Datang,
            <?= htmlspecialchars($_SESSION['nama']); ?>
        </h1>

        <p>
            Kelola data akademik sekolah dengan mudah,
            cepat, dan terintegrasi melalui satu dashboard.
        </p>

    </div>


    <!-- GAMBAR FULL WIDTH -->

    <div class="hero-image">

        <img
            src="asset/css/img/sekolah1.png"
            alt="Foto Sekolah">

    </div>

</div>



    <!-- =========================
         STATISTIK
    ========================== -->

    <div class="row g-4 mb-4">


        <!-- SISWA -->

        <div class="col-xl-3 col-md-6">

            <a
                href="siswa/index.php"
                class="text-decoration-none">


                <div class="card stat-card shadow-sm">

                    <div class="card-body p-4">


                        <div class="d-flex
                                    justify-content-between
                                    align-items-center">


                            <div>

                                <p class="text-muted mb-1">

                                    Total Siswa

                                </p>


                                <h2 class="fw-bold text-dark mb-0">

                                    <?= $total_siswa; ?>

                                </h2>


                                <small class="text-muted">

                                    Data siswa terdaftar

                                </small>

                            </div>


                            <div class="stat-icon icon-blue">

                                <i class="bi bi-mortarboard-fill"></i>

                            </div>


                        </div>

                    </div>

                </div>

            </a>

        </div>



        <!-- GURU -->

        <div class="col-xl-3 col-md-6">

            <a
                href="guru/index.php"
                class="text-decoration-none">


                <div class="card stat-card shadow-sm">

                    <div class="card-body p-4">


                        <div class="d-flex
                                    justify-content-between
                                    align-items-center">


                            <div>

                                <p class="text-muted mb-1">

                                    Total Guru

                                </p>


                                <h2 class="fw-bold text-dark mb-0">

                                    <?= $total_guru; ?>

                                </h2>


                                <small class="text-muted">

                                    Tenaga pendidik

                                </small>

                            </div>


                            <div class="stat-icon icon-green">

                                <i class="bi bi-person-workspace"></i>

                            </div>


                        </div>

                    </div>

                </div>

            </a>

        </div>



        <!-- MAPEL -->

        <div class="col-xl-3 col-md-6">

            <a
                href="mapel/index.php"
                class="text-decoration-none">


                <div class="card stat-card shadow-sm">

                    <div class="card-body p-4">


                        <div class="d-flex
                                    justify-content-between
                                    align-items-center">


                            <div>

                                <p class="text-muted mb-1">

                                    Mata Pelajaran

                                </p>


                                <h2 class="fw-bold text-dark mb-0">

                                    <?= $total_mapel; ?>

                                </h2>


                                <small class="text-muted">

                                    Mata pelajaran tersedia

                                </small>

                            </div>


                            <div class="stat-icon icon-yellow">

                                <i class="bi bi-book-fill"></i>

                            </div>


                        </div>

                    </div>

                </div>

            </a>

        </div>



        <!-- UJIAN -->

        <div class="col-xl-3 col-md-6">

            <a
                href="ujian/index.php"
                class="text-decoration-none">


                <div class="card stat-card shadow-sm">

                    <div class="card-body p-4">


                        <div class="d-flex
                                    justify-content-between
                                    align-items-center">


                            <div>

                                <p class="text-muted mb-1">

                                    Total Ujian

                                </p>


                                <h2 class="fw-bold text-dark mb-0">

                                    <?= $total_ujian; ?>

                                </h2>


                                <small class="text-muted">

                                    Ujian tersedia

                                </small>

                            </div>


                            <div class="stat-icon icon-red">

                                <i class="bi bi-pencil-square"></i>

                            </div>


                        </div>

                    </div>

                </div>

            </a>

        </div>


    </div>



    <!-- =========================
         GRAFIK
    ========================== -->

    <div class="row g-4 mb-4">


        <!-- GRAFIK BAR -->

        <div class="col-lg-8">

            <div class="card chart-card shadow-sm">

                <div class="card-body p-4">


                    <div class="d-flex
                                justify-content-between
                                align-items-center
                                mb-4">


                        <div>

                            <h5 class="fw-bold mb-1">

                                Statistik Akademik

                            </h5>


                            <p class="text-muted mb-0">

                                Ringkasan data sistem

                            </p>

                        </div>


                        <i class="bi bi-bar-chart-line-fill
                                  fs-3 text-primary">
                        </i>


                    </div>


                    <div
                        style="
                            height: 320px;
                            position: relative;
                        ">


                        <canvas
                            id="grafikAkademik">
                        </canvas>


                    </div>


                </div>

            </div>

        </div>



        <!-- GRAFIK DONAT -->

        <div class="col-lg-4">

            <div class="card chart-card shadow-sm">

                <div class="card-body p-4">


                    <h5 class="fw-bold mb-1">

                        Distribusi Data

                    </h5>


                    <p class="text-muted">

                        Komposisi data akademik

                    </p>


                    <div
                        style="
                            height: 280px;
                            position: relative;
                        ">


                        <canvas
                            id="grafikDonat">
                        </canvas>


                    </div>


                </div>

            </div>

        </div>


    </div>



    <!-- =========================
         MENU CEPAT
    ========================== -->

    <div class="card quick-menu shadow-sm">

        <div class="card-body p-4">


            <h5 class="fw-bold mb-1">

                Menu Cepat

            </h5>


            <p class="text-muted mb-4">

                Tambahkan data akademik baru

            </p>


            <div class="row g-3">


                <div class="col-lg-3 col-md-6">

                    <a
                        href="siswa/tambah.php"
                        class="btn btn-primary
                               quick-btn
                               w-100">

                        <i class="bi bi-person-plus me-2"></i>

                        Tambah Siswa

                    </a>

                </div>


                <div class="col-lg-3 col-md-6">

                    <a
                        href="guru/tambah.php"
                        class="btn btn-success
                               quick-btn
                               w-100">

                        <i class="bi bi-person-plus me-2"></i>

                        Tambah Guru

                    </a>

                </div>


                <div class="col-lg-3 col-md-6">

                    <a
                        href="mapel/tambah.php"
                        class="btn btn-warning
                               quick-btn
                               w-100">

                        <i class="bi bi-book me-2"></i>

                        Tambah Mapel

                    </a>

                </div>


                <div class="col-lg-3 col-md-6">

                    <a
                        href="ujian/tambah.php"
                        class="btn btn-danger
                               quick-btn
                               w-100">

                        <i class="bi bi-pencil-square me-2"></i>

                        Tambah Ujian

                    </a>

                </div>


            </div>

        </div>

    </div>


</div>



<!-- =========================
     CHART JS
========================= -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

const totalSiswa = <?= $total_siswa; ?>;
const totalGuru  = <?= $total_guru; ?>;
const totalMapel = <?= $total_mapel; ?>;
const totalUjian = <?= $total_ujian; ?>;


// =========================
// GRAFIK BATANG
// =========================

new Chart(

    document.getElementById('grafikAkademik'),

    {

        type: 'bar',

        data: {

            labels: [
                'Siswa',
                'Guru',
                'Mapel',
                'Ujian'
            ],

            datasets: [

                {

                    label: 'Jumlah Data',

                    data: [
                        totalSiswa,
                        totalGuru,
                        totalMapel,
                        totalUjian
                    ],

                    backgroundColor: [
                        '#3b82f6',
                        '#22c55e',
                        '#eab308',
                        '#ef4444'
                    ],

                    borderRadius: 8,

                    borderWidth: 0

                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    display: false

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    ticks: {

                        color: '#94a3b8',

                        precision: 0

                    },

                    grid: {

                        color: '#334155'

                    }

                },

                x: {

                    ticks: {

                        color: '#94a3b8'

                    },

                    grid: {

                        display: false

                    }

                }

            }

        }

    }

);


// =========================
// GRAFIK DONAT
// =========================

new Chart(

    document.getElementById('grafikDonat'),

    {

        type: 'doughnut',

        data: {

            labels: [
                'Siswa',
                'Guru',
                'Mapel',
                'Ujian'
            ],

            datasets: [

                {

                    data: [
                        totalSiswa,
                        totalGuru,
                        totalMapel,
                        totalUjian
                    ],

                    backgroundColor: [
                        '#3b82f6',
                        '#22c55e',
                        '#eab308',
                        '#ef4444'
                    ],

                    borderColor: '#1e293b',

                    borderWidth: 4

                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            cutout: '70%',

            plugins: {

                legend: {

                    position: 'bottom',

                    labels: {

                        color: '#cbd5e1',

                        padding: 20

                    }

                }

            }

        }

    }

);

</script>



<?php

require_once "template/footer.php";

?>