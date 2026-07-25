<?php

require_once "config.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$title = "Ekstrakurikuler - Sistem Akademik";

require_once "template/header.php";
require_once "template/navbar.php";

?>

<style>

.hero-eskul {
    background: linear-gradient(135deg, #0d6efd, #084298);
    color: white;
    border-radius: 20px;
    padding: 45px 30px;
    margin-bottom: 35px;
}

.eskul-card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
}

.eskul-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.eskul-icon {
    height: 150px;
    background: linear-gradient(135deg, #0d6efd, #0b5ed7);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 65px;
}

.eskul-content {
    padding: 25px;
}

.badge-eskul {
    background: #e7f1ff;
    color: #0d6efd;
    padding: 7px 14px;
    border-radius: 20px;
}

</style>


<div class="container-fluid px-4 py-4">


    <!-- HERO -->
    <div class="hero-eskul text-center">

        <i class="bi bi-trophy-fill"
           style="font-size: 60px;"></i>

        <h1 class="fw-bold mt-3">
            Ekstrakurikuler
        </h1>

        <p class="mb-0">
            Kembangkan bakat, minat, kreativitas, dan prestasi
            siswa SMP YKTB Kota Bogor.
        </p>

    </div>


    <!-- DAFTAR ESKUL -->
    <div class="row g-4">


        <!-- FUTSAL -->
        <div class="col-xl-4 col-md-6">

            <div class="card eskul-card shadow-sm">

                <div class="eskul-icon">
                    <i class="bi bi-dribbble"></i>
                </div>

                <div class="eskul-content">

                    <span class="badge-eskul">
                        Olahraga
                    </span>

                    <h4 class="fw-bold mt-3">
                        Futsal
                    </h4>

                    <p class="text-muted">
                        Mengembangkan kemampuan siswa dalam olahraga
                        futsal serta membangun kerja sama tim,
                        sportivitas, disiplin, dan mental juara.
                    </p>

                    <div class="text-muted">

                        <i class="bi bi-calendar-event"></i>
                        Jadwal: Menyesuaikan

                    </div>

                </div>

            </div>

        </div>


        <!-- PASKIBRA -->
        <div class="col-xl-4 col-md-6">

            <div class="card eskul-card shadow-sm">

                <div class="eskul-icon">
                    <i class="bi bi-flag-fill"></i>
                </div>

                <div class="eskul-content">

                    <span class="badge-eskul">
                        Kepemimpinan
                    </span>

                    <h4 class="fw-bold mt-3">
                        Paskibra
                    </h4>

                    <p class="text-muted">
                        Membentuk siswa yang disiplin, bertanggung jawab,
                        memiliki jiwa kepemimpinan, nasionalisme,
                        dan karakter yang kuat.
                    </p>

                    <div class="text-muted">

                        <i class="bi bi-calendar-event"></i>
                        Jadwal: Menyesuaikan

                    </div>

                </div>

            </div>

        </div>


        <!-- PRAMUKA -->
        <div class="col-xl-4 col-md-6">

            <div class="card eskul-card shadow-sm">

                <div class="eskul-icon">
                    <i class="bi bi-compass-fill"></i>
                </div>

                <div class="eskul-content">

                    <span class="badge-eskul">
                        Kepanduan
                    </span>

                    <h4 class="fw-bold mt-3">
                        Pramuka
                    </h4>

                    <p class="text-muted">
                        Melatih kemandirian, kedisiplinan, keterampilan,
                        kepemimpinan, serta membangun kepedulian terhadap
                        lingkungan dan sesama.
                    </p>

                    <div class="text-muted">

                        <i class="bi bi-calendar-event"></i>
                        Jadwal: Menyesuaikan

                    </div>

                </div>

            </div>

        </div>


        <!-- PMR -->
        <div class="col-xl-4 col-md-6">

            <div class="card eskul-card shadow-sm">

                <div class="eskul-icon">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>

                <div class="eskul-content">

                    <span class="badge-eskul">
                        Kesehatan
                    </span>

                    <h4 class="fw-bold mt-3">
                        PMR
                    </h4>

                    <p class="text-muted">
                        Meningkatkan kepedulian siswa terhadap kesehatan,
                        kemanusiaan, pertolongan pertama, dan kegiatan sosial.
                    </p>

                    <div class="text-muted">

                        <i class="bi bi-calendar-event"></i>
                        Jadwal: Menyesuaikan

                    </div>

                </div>

            </div>

        </div>


        <!-- SENI -->
        <div class="col-xl-4 col-md-6">

            <div class="card eskul-card shadow-sm">

                <div class="eskul-icon">
                    <i class="bi bi-music-note-beamed"></i>
                </div>

                <div class="eskul-content">

                    <span class="badge-eskul">
                        Seni
                    </span>

                    <h4 class="fw-bold mt-3">
                        Seni & Musik
                    </h4>

                    <p class="text-muted">
                        Menyalurkan kreativitas dan bakat siswa
                        dalam bidang seni, musik, dan pertunjukan.
                    </p>

                    <div class="text-muted">

                        <i class="bi bi-calendar-event"></i>
                        Jadwal: Menyesuaikan

                    </div>

                </div>

            </div>

        </div>


        <!-- ROHIS -->
        <div class="col-xl-4 col-md-6">

            <div class="card eskul-card shadow-sm">

                <div class="eskul-icon">
                    <i class="bi bi-moon-stars-fill"></i>
                </div>

                <div class="eskul-content">

                    <span class="badge-eskul">
                        Keagamaan
                    </span>

                    <h4 class="fw-bold mt-3">
                        Rohis
                    </h4>

                    <p class="text-muted">
                        Membentuk karakter siswa yang berakhlak mulia
                        melalui kegiatan keagamaan dan pembinaan karakter.
                    </p>

                    <div class="text-muted">

                        <i class="bi bi-calendar-event"></i>
                        Jadwal: Menyesuaikan

                    </div>

                </div>

            </div>

        </div>


    </div>

</div>


<?php require_once "template/footer.php"; ?>