<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="<?= $main_url; ?>dashboard.php">
            <i class="bi bi-mortarboard-fill"></i>
            Sistem Akademik
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div
            class="collapse navbar-collapse"
            id="navbarMenu">

            <ul class="navbar-nav ms-auto">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="<?= $main_url; ?>dashboard.php">

                        <i class="bi bi-house"></i>
                        Dashboard

                    </a>
                </li>

                <!-- Profil Sekolah -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="<?= $main_url; ?>profil_sekolah.php">

                        <i class="bi bi-building"></i>
                        Profil Sekolah

                    </a>
                </li>

                <!-- Ekstrakurikuler -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="<?= $main_url; ?>eskul.php">

                        <i class="bi bi-trophy-fill"></i>
                        Eskul

                    </a>
                </li>

                <!-- Nama User -->
                <li class="nav-item">
                    <span class="nav-link text-white">

                        <i class="bi bi-person-circle"></i>

                        <?= $_SESSION['nama'] ?? 'Admin'; ?>

                    </span>
                </li>

                <!-- Logout -->
                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="<?= $main_url; ?>logout.php">

                        <i class="bi bi-box-arrow-right"></i>
                        Logout

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>