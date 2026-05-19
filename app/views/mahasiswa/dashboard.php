<?php

require_once __DIR__ . '/../../../config/database.php';



if($_SESSION['role'] != 'mahasiswa'){

    header("Location: index.php");
    exit;

}

$db = new Database();
$conn = $db->connect();

$user = $_SESSION['user_id'];

$query = $conn->prepare(
    "SELECT users.*, pendaftaran.*
    FROM users
    JOIN pendaftaran
    ON users.id = pendaftaran.user_id
    WHERE users.id=?"
);

$query->execute([$user]);

$data = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Dashboard Mahasiswa</title>

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#eef2f7;
            font-family:'Segoe UI';
        }

        /* NAVBAR */

        .navbar-custom{
            background:linear-gradient(135deg,#0d6efd,#003c8f);
            padding:18px 40px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        .navbar-brand{
            font-size:24px;
            font-weight:bold;
            color:white !important;
        }

        /* CARD */

        .dashboard-card{
            border:none;
            border-radius:30px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        .card-header-custom{
            background:linear-gradient(135deg,#198754,#0f5132);
            color:white;
            padding:30px;
        }

        .welcome-box{
            background:#f8f9fa;
            border-radius:20px;
            padding:20px;
            margin-bottom:20px;
        }

        /* BUTTON */

        .menu-btn{
            border-radius:18px;
            padding:18px;
            font-weight:bold;
            transition:0.3s;
        }

        .menu-btn:hover{
            transform:translateY(-5px);
        }

        /* STATUS */

        .status-badge{
            padding:12px 18px;
            border-radius:15px;
            font-size:14px;
        }

        /* FOOTER */

        .footer{
            margin-top:50px;
            padding:30px;
        }

        .footer-card{
            background:white;
            border-radius:25px;
            padding:30px;
            text-align:center;
            box-shadow:0 10px 20px rgba(0,0,0,0.05);
        }

        .footer-card h5{
            color:#0d6efd;
            font-weight:bold;
        }

        .footer-card p{
            color:#666;
            margin-bottom:5px;
        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

    <div class="container-fluid">

        <span class="navbar-brand">

            <i class="fa-solid fa-user-graduate"></i>
            Dashboard Mahasiswa

        </span>

        <a href="index.php?page=logout"
        class="btn btn-danger rounded-pill px-4">

            <i class="fa fa-sign-out-alt"></i>
            Logout

        </a>

    </div>

</nav>

<!-- CONTENT -->

<div class="container py-5">

    <div class="card dashboard-card">

        <!-- HEADER -->

        <div class="card-header-custom">

            <h2>

                Selamat Datang,
                <?= $_SESSION['nama']; ?>

            </h2>

            <p class="mb-0">

                Sistem Penerimaan Mahasiswa Baru

            </p>

        </div>

        <!-- BODY -->

        <div class="card-body p-5">

            <!-- STATUS -->

            <div class="welcome-box">

                <h5 class="mb-3">

                    Status Berkas Pendaftaran

                </h5>

                <span class="badge bg-primary status-badge">

                    <?= $data['status_berkas']; ?>

                </span>

            </div>

            <!-- MENU -->

            <div class="row mt-4">

                <div class="col-md-3 mb-4">

                    <a href="index.php?page=ujian"
                    class="btn btn-primary w-100 menu-btn">

                        <i class="fa fa-book fa-2x mb-2"></i>
                        <br>

                        Mulai Ujian

                    </a>

                </div>

                <div class="col-md-3 mb-4">

                    <a href="index.php?page=hasil"
                    class="btn btn-success w-100 menu-btn">

                        <i class="fa fa-chart-line fa-2x mb-2"></i>
                        <br>

                        Lihat Hasil

                    </a>

                </div>

                <div class="col-md-3 mb-4">

                    <a href="index.php?page=pembayaran"
                    class="btn btn-warning w-100 menu-btn text-dark">

                        <i class="fa fa-money-bill fa-2x mb-2"></i>
                        <br>

                        Pembayaran

                    </a>

                </div>

                <div class="col-md-3 mb-4">

                    <a href="index.php?page=ospek"
                    class="btn btn-dark w-100 menu-btn">

                        <i class="fa fa-users fa-2x mb-2"></i>
                        <br>

                        OSPEK

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->

    <div class="footer">

        <div class="footer-card">

            <h5>

                PMB Kampus Modern

            </h5>

            <p>

                Sistem Informasi Penerimaan Mahasiswa Baru

            </p>

            <small class="text-secondary">

                © <?= date('Y'); ?> All Rights Reserved

            </small>

        </div>

    </div>

</div>

</body>
</html>