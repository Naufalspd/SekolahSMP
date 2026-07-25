<?php

require_once "config.php";


// Jika sudah login
if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}


$error = "";


// Jika tombol login ditekan
if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string(
        $koneksi,
        $_POST['username']
    );

    $password = md5($_POST['password']);


    // Cari user
    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM users
         WHERE username='$username'
         AND password='$password'"
    );


    // Cek hasil
    if (mysqli_num_rows($query) > 0) {

        $data = mysqli_fetch_assoc($query);


        // Simpan session
        $_SESSION['login'] = true;

        $_SESSION['id_user'] = $data['id'];

        $_SESSION['nama'] = $data['nama'];

        $_SESSION['username'] = $data['username'];

        $_SESSION['level'] = $data['level'];


        // Masuk dashboard
        header("Location: dashboard.php");

        exit;

    } else {

        $error = "Username atau password salah!";

    }

}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Akademik</title>


    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <link
        rel="stylesheet"
        href="asset/css/style.css">

</head>


<body class="login-page">


<div class="container">

    <div class="row
                justify-content-center
                align-items-center
                min-vh-100">


        <div class="col-lg-4
                    col-md-6
                    col-sm-10
                    col-12">


            <div class="card
                        shadow-lg
                        login-card">


                <div class="card-body p-4">


                    <!-- ICON -->

                    <div class="text-center mb-4">

                        <div class="login-icon">

                            <i class="bi bi-mortarboard-fill"></i>

                        </div>


                        <h3 class="fw-bold mt-3">

                            Sistem Akademik

                        </h3>


                        <p class="text-muted">

                            Silakan login untuk melanjutkan

                        </p>

                    </div>


                    <!-- ERROR -->

                    <?php if ($error != ""): ?>

                        <div class="alert alert-danger">

                            <i class="bi bi-exclamation-circle"></i>

                            <?= $error; ?>

                        </div>

                    <?php endif; ?>


                    <!-- FORM -->

                    <form method="POST">


                        <!-- USERNAME -->

                        <div class="mb-3">

                            <label class="form-label">

                                Username

                            </label>


                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="bi bi-person"></i>

                                </span>


                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    placeholder="Masukkan username"
                                    required>

                            </div>

                        </div>


                        <!-- PASSWORD -->

                        <div class="mb-4">

                            <label class="form-label">

                                Password

                            </label>


                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="bi bi-lock"></i>

                                </span>


                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required>

                            </div>

                        </div>


                        <!-- BUTTON -->

                        <button
                            type="submit"
                            name="login"
                            class="btn btn-primary w-100">

                            <i class="bi bi-box-arrow-in-right"></i>

                            Login

                        </button>


                    </form>


                </div>

            </div>


            <p class="text-center
                      text-muted
                      mt-3">

                © 2026 Sistem Akademik SMP & SMK YKTB

            </p>


        </div>

    </div>

</div>


</body>

</html>