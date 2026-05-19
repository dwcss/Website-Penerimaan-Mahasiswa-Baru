<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>PMB Kampus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            background:#0d6efd;
            color:white;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:15px;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:#0b5ed7;
        }

        .content{
            margin-left:250px;
            padding:20px;
        }

        .navbar-custom{
            background:#0d6efd;
        }

        .card-custom{
            border:none;
            border-radius:15px;
        }

        .footer{
            background:#0d6efd;
            color:white;
            text-align:center;
            padding:15px;
            margin-top:50px;
        }

    </style>

</head>
<body>

<div class="sidebar">

    <h3 class="text-center py-4">
        PMB Kampus
    </h3>

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
        Data Soal

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

<div class="content">

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom rounded shadow">

    <div class="container-fluid">

        <span class="navbar-brand">

            Sistem PMB Kampus

        </span>

        <div class="text-white">

            Halo,
            <?= $_SESSION['nama']; ?>

        </div>

    </div>

</nav>

<div class="container-fluid mt-4">