<?php


if($_SESSION['role'] != 'admin'){

    header("Location: index.php");
    exit;

}

require_once __DIR__ . '/../../../config/database.php';

$db = new Database();
$conn = $db->connect();

$totalPendaftar = $conn->query(
    "SELECT COUNT(*) as total FROM pendaftaran"
)->fetch(PDO::FETCH_ASSOC);

$totalLulus = $conn->query(
    "SELECT COUNT(*) as total
    FROM hasil_ujian
    WHERE status='Lulus Ujian'"
)->fetch(PDO::FETCH_ASSOC);

$totalPembayaran = $conn->query(
    "SELECT COUNT(*) as total
    FROM pembayaran
    WHERE status='Lunas'"
)->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Dashboard Admin PMB</title>

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
}

.topbar h3{
    margin:0;
    font-weight:bold;
}

/* STAT CARD */

.stat-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
    color:white;
    position:relative;
    transition:0.3s;
}

.stat-card:hover{
    transform:translateY(-8px);
}

.stat-card .card-body{
    padding:30px;
}

.bg1{
    background:linear-gradient(135deg,#4e73df,#224abe);
}

.bg2{
    background:linear-gradient(135deg,#1cc88a,#13855c);
}

.bg3{
    background:linear-gradient(135deg,#f6c23e,#dda20a);
}

.stat-icon{
    position:absolute;
    right:25px;
    top:25px;
    font-size:60px;
    opacity:0.2;
}

/* QUICK MENU */

.quick-card{
    background:white;
    border:none;
    border-radius:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.menu-btn{
    border-radius:20px;
    padding:25px;
    color:white;
    text-decoration:none;
    display:block;
    transition:0.3s;
    font-weight:bold;
}

.menu-btn:hover{
    transform:translateY(-5px);
    color:white;
}

.btn1{
    background:linear-gradient(135deg,#4e73df,#224abe);
}

.btn2{
    background:linear-gradient(135deg,#1cc88a,#13855c);
}

.btn3{
    background:linear-gradient(135deg,#f6c23e,#dda20a);
}

.btn4{
    background:linear-gradient(135deg,#e74a3b,#be2617);
}

/* FOOTER */

.footer{
    margin-top:50px;
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 10px 20px rgba(0,0,0,0.05);
    text-align:center;
}

.footer h5{
    margin-bottom:10px;
    color:#0d6efd;
    font-weight:bold;
}

.footer p{
    margin:0;
    color:#666;
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">

        <i class="fa-solid fa-graduation-cap fa-3x"></i>

        <h2>PMB Kampus</h2>

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
            Verifikasi Pembayaran

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
                Dashboard Admin
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

    <!-- STATS -->

    <div class="row mt-4">

        <div class="col-md-4 mb-4">

            <div class="card stat-card bg1">

                <div class="card-body">

                    <h6>Total Pendaftar</h6>

                    <h1>
                        <?= $totalPendaftar['total']; ?>
                    </h1>

                    <i class="fa fa-users stat-icon"></i>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card stat-card bg2">

                <div class="card-body">

                    <h6>Lulus Ujian</h6>

                    <h1>
                        <?= $totalLulus['total']; ?>
                    </h1>

                    <i class="fa fa-check stat-icon"></i>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card stat-card bg3">

                <div class="card-body">

                    <h6>Pembayaran Lunas</h6>

                    <h1>
                        <?= $totalPembayaran['total']; ?>
                    </h1>

                    <i class="fa fa-money-bill stat-icon"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- QUICK MENU -->

    <div class="card quick-card p-4">

        <h4 class="mb-4">
            Quick Menu
        </h4>

        <div class="row">

            <div class="col-md-3 mb-3">

                <a href="index.php?page=data_pendaftar"
                class="menu-btn btn1">

                    <i class="fa fa-users fa-2x mb-3"></i>

                    <br>

                    Data Pendaftar

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="index.php?page=data_soal"
                class="menu-btn btn2">

                    <i class="fa fa-book fa-2x mb-3"></i>

                    <br>

                    CRUD Soal

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="index.php?page=verifikasi_pembayaran"
                class="menu-btn btn3">

                    <i class="fa fa-money-bill fa-2x mb-3"></i>

                    <br>

                    Pembayaran

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="#"
                class="menu-btn btn4">

                    <i class="fa fa-file fa-2x mb-3"></i>

                    <br>

                    Export PDF

                </a>

            </div>

        </div>

    </div>

    <!-- FOOTER -->

    <div class="footer">

        <h5>
            PMB Kampus Modern
        </h5>

        <p>
            © <?= date('Y'); ?>
            Sistem Penerimaan Mahasiswa Baru
        </p>

    </div>

</div>

</body>
</html>