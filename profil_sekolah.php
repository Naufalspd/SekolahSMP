<?php

require_once "config.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$title = "Profil Sekolah - Sistem Akademik";

require_once "template/header.php";
require_once "template/navbar.php";

?>

<style>

.hero-profil {
    background: linear-gradient(135deg, #0d6efd, #0b5ed7);
    color: white;
    border-radius: 20px;
    padding: 50px 40px;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(13, 110, 253, 0.25);
}

.logo-sekolah {
    width: 110px;
    height: 110px;
    background: white;
    color: #0d6efd;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    font-size: 55px;
}

.card-profil {
    border: none;
    border-radius: 18px;
    transition: 0.3s;
    height: 100%;
}

.card-profil:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.icon-box {
    width: 55px;
    height: 55px;
    background: #e7f1ff;
    color: #0d6efd;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    margin-bottom: 15px;
}

</style>


<div class="container-fluid px-4 py-4">

    <!-- HERO -->
    <div class="hero-profil text-center">

        <div class="logo-sekolah mb-3">
            <i class="bi bi-mortarboard-fill"></i>
        </div>

        <h1 class="fw-bold">
            SMP YKTB Kota Bogor
        </h1>

        <p class="mb-0">
            Sistem Informasi Akademik Sekolah
        </p>

    </div>


    <!-- INFORMASI SEKOLAH -->
    <div class="row g-4 mb-4">

        <div class="col-lg-6">

            <div class="card card-profil shadow-sm">

                <div class="card-body p-4">

                    <div class="icon-box">
                        <i class="bi bi-building-fill"></i>
                    </div>

                    <h4 class="fw-bold">
                        Profil Sekolah
                    </h4>

                    <p class="text-muted">
                        SMP YKTB Kota Bogor merupakan lembaga pendidikan
                        yang berkomitmen untuk memberikan pendidikan yang
                        berkualitas serta membentuk peserta didik yang
                        berkarakter, disiplin, kreatif, dan berprestasi.
                    </p>

                    <p class="text-muted">
                        Sekolah terus berupaya mengembangkan potensi peserta
                        didik melalui kegiatan akademik maupun non-akademik
                        sehingga siswa dapat berkembang sesuai dengan bakat
                        dan minatnya.
                    </p>

                </div>

            </div>

        </div>


        <div class="col-lg-6">

            <div class="card card-profil shadow-sm">

                <div class="card-body p-4">

                    <div class="icon-box">
                        <i class="bi bi-info-circle-fill"></i>
                    </div>

                    <h4 class="fw-bold">
                        Informasi Sekolah
                    </h4>

                    <table class="table table-borderless">

                        <tr>
                            <th width="40%">Nama</th>
                            <td>SMP YKTB Kota Bogor</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>Swasta</td>
                        </tr>

                        <tr>
                            <th>Jenjang</th>
                            <td>Sekolah Menengah Pertama</td>
                        </tr>

                        <tr>
                            <th>Alamat</th>
                            <td>Kota Bogor</td>
                        </tr>

                        <tr>
                            <th>Telepon</th>
                            <td>-</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>


    <!-- VISI MISI -->
    <div class="row g-4">

        <div class="col-md-6">

            <div class="card card-profil shadow-sm">

                <div class="card-body p-4">

                    <div class="icon-box">
                        <i class="bi bi-eye-fill"></i>
                    </div>

                    <h4 class="fw-bold">
                        Visi
                    </h4>

                    <p class="text-muted">
                        Mewujudkan peserta didik yang berkarakter,
                        berprestasi, mandiri, kreatif, dan mampu
                        menghadapi perkembangan teknologi serta
                        tantangan masa depan.
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-6">

            <div class="card card-profil shadow-sm">

                <div class="card-body p-4">

                    <div class="icon-box">
                        <i class="bi bi-bullseye"></i>
                    </div>

                    <h4 class="fw-bold">
                        Misi
                    </h4>

                    <ul class="text-muted">

                        <li class="mb-2">
                            Meningkatkan kualitas pembelajaran.
                        </li>

                        <li class="mb-2">
                            Membentuk karakter siswa yang disiplin.
                        </li>

                        <li class="mb-2">
                            Mengembangkan bakat dan minat peserta didik.
                        </li>

                        <li class="mb-2">
                            Meningkatkan prestasi akademik dan non-akademik.
                        </li>

                        <li>
                            Mengembangkan kemampuan teknologi siswa.
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require_once "template/footer.php"; ?>