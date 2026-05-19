<?php

session_start();

require_once 'config/database.php';

$db = new Database();
$conn = $db->connect();

$page = isset($_GET['page'])
    ? $_GET['page']
    : 'login';

switch($page){

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

case 'login':
    require 'app/views/auth/login.php';
    break;

case 'register':
    require 'app/views/auth/register.php';
    break;

case 'logout':

    session_destroy();

    header('Location: index.php?page=login');
    exit;

    break;


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

case 'dashboard_admin':
    require 'app/views/admin/dashboard.php';
    break;

case 'data_pendaftar':
    require 'app/views/admin/data_pendaftar.php';
    break;

case 'detail_pendaftar':
    require 'app/views/admin/detail_pendaftar.php';
    break;

case 'data_soal':
    require 'app/views/admin/data_soal.php';
    break;

case 'tambah_soal':
    require 'app/views/admin/tambah_soal.php';
    break;

case 'verifikasi_pembayaran':
    require 'app/views/admin/verifikasi_pembayaran.php';
    break;


/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/

case 'dashboard_mahasiswa':
    require 'app/views/mahasiswa/dashboard.php';
    break;

case 'ujian':
    require 'app/views/mahasiswa/ujian.php';
    break;

case 'hasil':
    require 'app/views/mahasiswa/hasil.php';
    break;

case 'pembayaran':
    require 'app/views/mahasiswa/pembayaran.php';
    break;

case 'ospek':
    require 'app/views/mahasiswa/ospek.php';
    break;


/*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/

default:
    require 'app/views/auth/login.php';
    break;
}
?>