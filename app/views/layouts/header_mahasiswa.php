<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>PMB Kampus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>

        body{
            background: #f4f7fb;
            font-family: 'Segoe UI';
        }

        .navbar-custom{
            background: linear-gradient(90deg,#0d6efd,#003c8f);
            padding: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .navbar-brand{
            color: white !important;
            font-weight: bold;
            font-size: 24px;
        }

        .main-card{
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            animation: fadeIn 0.4s ease;
        }

        .card-header-modern{
            background: linear-gradient(90deg,#198754,#0f5132);
            color: white;
            padding: 18px;
            font-size: 22px;
            font-weight: bold;
        }

        .btn-modern{
            border-radius: 12px;
            padding: 10px 18px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-modern:hover{
            transform: translateY(-2px);
        }

        footer{
            margin-top: 80px;
            background: linear-gradient(90deg,#0d6efd,#003c8f);
            color: white;
            text-align: center;
            padding: 18px;
            font-size: 14px;
        }

        @keyframes fadeIn{
            from{
                opacity:0;
                transform: translateY(10px);
            }
            to{
                opacity:1;
                transform: translateY(0);
            }
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">

            🎓 PMB Kampus

        </a>

        <div class="d-flex">

            <span class="text-white me-3 mt-2">

                Halo,
                <?= $_SESSION['nama']; ?>

            </span>

            <a href="index.php?page=logout"
            class="btn btn-danger btn-sm">

                Logout

            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">