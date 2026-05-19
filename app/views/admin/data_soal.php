<?php

require_once __DIR__ . '/../../../config/database.php';


if($_SESSION['role'] != 'admin'){

    header("Location: index.php");
    exit;

}

$db = new Database();
$conn = $db->connect();

$soal = $conn->query(
    "SELECT * FROM soal ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Data Soal</title>

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

        /* SIDEBAR */

        .sidebar{
            width:270px;
            height:100vh;
            position:fixed;
            background:linear-gradient(180deg,#0d6efd,#003c8f);
            color:white;
            overflow:auto;
            box-shadow:5px 0 20px rgba(0,0,0,0.1);
        }

        .logo{
            padding:30px 20px;
            text-align:center;
            border-bottom:1px solid rgba(255,255,255,0.1);
        }

        .logo h2{
            font-weight:bold;
            margin-top:10px;
        }

        .sidebar-menu{
            margin-top:20px;
        }

        .sidebar-menu a{
            display:block;
            color:white;
            padding:16px 25px;
            text-decoration:none;
            transition:0.3s;
            font-size:16px;
        }

        .sidebar-menu a:hover{
            background:rgba(255,255,255,0.15);
            padding-left:35px;
        }

        .sidebar-menu i{
            width:30px;
        }

        /* CONTENT */

        .content{
            margin-left:270px;
            padding:30px;
        }

        /* TOPBAR */

        .topbar{
            background:white;
            border-radius:20px;
            padding:20px 30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.05);
            margin-bottom:30px;
        }

        .topbar h3{
            margin:0;
            font-weight:bold;
        }

        /* CARD */

        .card-custom{
            border:none;
            border-radius:25px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
        }

        .card-header{
            padding:20px;
            font-size:20px;
            font-weight:bold;
        }

        /* TABLE */

        .table{
            border-radius:15px;
            overflow:hidden;
        }

        .table th{
            background:#0d6efd !important;
            color:white;
            border:none;
        }

        .table td{
            vertical-align:middle;
        }

        .badge{
            padding:10px 15px;
            font-size:13px;
            border-radius:10px;
        }

        /* BUTTON */

        .btn{
            border-radius:12px;
        }

        /* FOOTER */

        .footer{
            margin-top:40px;
        }

        .footer-card{
            background:white;
            border-radius:20px;
            padding:25px;
            box-shadow:0 10px 20px rgba(0,0,0,0.05);
            text-align:center;
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

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">

        <i class="fa-solid fa-graduation-cap fa-3x"></i>

        <h2>
            PMB Kampus
        </h2>

        <small>
            Admin Panel
        </small>

    </div>

    <div class="sidebar-menu">

        <a href="index.php?page=dashboard_admin">

            <i class="fa fa-home"></i>
            Dashboard

        </a>

        <a href="index.php?page=data_pendaftar">

            <i class="fa fa-users"></i>
            Data Pendaftar

        </a>

        <a href="index.php?page=data_soal">

            <i class="fa fa-book"></i>
            CRUD Soal

        </a>

        <a href="index.php?page=verifikasi_pembayaran">

            <i class="fa fa-money-bill"></i>
            Pembayaran

        </a>

        <a href="index.php?page=logout">

            <i class="fa fa-sign-out-alt"></i>
            Logout

        </a>

    </div>

</div>

<!-- CONTENT -->

<div class="content">

    <!-- TOPBAR -->

    <div class="topbar">

        <div>

            <h3>
                Data Soal Ujian
            </h3>

            <small class="text-muted">

                Sistem Penerimaan Mahasiswa Baru

            </small>

        </div>

        <div>

            Halo,
            <strong>

                <?= $_SESSION['nama']; ?>

            </strong>

        </div>

    </div>

    <!-- CARD -->

    <div class="card card-custom">

        <div class="card-header bg-primary text-white">

            <i class="fa fa-book"></i>
            Data Soal PMB

        </div>

        <div class="card-body p-4">

            <a href="index.php?page=tambah_soal"
            class="btn btn-success mb-4">

                <i class="fa fa-plus"></i>
                Tambah Soal

            </a>

            <div class="table-responsive">

                <table class="table table-hover table-bordered">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $no = 1;
                        foreach($soal as $s):
                        ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td>

                                <?= $s['pertanyaan']; ?>

                            </td>

                            <td>

                                <span class="badge bg-success">

                                    <?= $s['jawaban_benar']; ?>

                                </span>

                            </td>

                            <td>

                                <a href="#"
                                class="btn btn-warning btn-sm">

                                    <i class="fa fa-edit"></i>
                                    Edit

                                </a>

                                <a href="app/controllers/HapusSoal.php?id=<?= $s['id']; ?>"
                                class="btn btn-danger btn-sm">

                                    <i class="fa fa-trash"></i>
                                    Hapus

                                </a>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

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

                Sistem Penerimaan Mahasiswa Baru

            </p>

            <small class="text-secondary">

                © <?= date('Y'); ?> All Rights Reserved

            </small>

        </div>

    </div>

</div>

</body>
</html>