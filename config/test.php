<?php

require_once __DIR__ . '/database.php';

$db = new Database();
$conn = $db->connect();

if($conn){
    echo "Koneksi berhasil";
} else {
    echo "Koneksi gagal";
}
?>