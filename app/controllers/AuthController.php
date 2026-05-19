<?php

require_once __DIR__ . '/../../config/database.php';

$db = new Database();
$conn = $db->connect();

if(isset($_POST['register'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $query = $conn->prepare(
        "INSERT INTO users(
            nama,
            email,
            password
        ) VALUES(?,?,?)"
    );

    $query->execute([
        $nama,
        $email,
        $password
    ]);

    $user_id = $conn->lastInsertId();

    /*
    |--------------------------------------------------------------------------
    | UPLOAD FILE
    |--------------------------------------------------------------------------
    */

    $foto = $_FILES['foto']['name'];
    $ktp = $_FILES['ktp']['name'];
    $ijazah = $_FILES['ijazah']['name'];

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        __DIR__ . '/../../public/assets/uploads/foto/' . $foto
    );

    move_uploaded_file(
        $_FILES['ktp']['tmp_name'],
        __DIR__ . '/../../public/assets/uploads/ktp/' . $ktp
    );

    move_uploaded_file(
        $_FILES['ijazah']['tmp_name'],
        __DIR__ . '/../../public/assets/uploads/ijazah/' . $ijazah
    );

    /*
    |--------------------------------------------------------------------------
    | INSERT PENDAFTARAN
    |--------------------------------------------------------------------------
    */

    $insert = $conn->prepare(
        "INSERT INTO pendaftaran(
            user_id,
            no_hp,
            alamat,
            asal_sekolah,
            jurusan,
            foto,
            ktp,
            ijazah
        ) VALUES(?,?,?,?,?,?,?,?)"
    );

    $insert->execute([
        $user_id,
        $_POST['no_hp'],
        $_POST['alamat'],
        $_POST['asal_sekolah'],
        $_POST['jurusan'],
        $foto,
        $ktp,
        $ijazah
    ]);

    header(
        'Location: ../../index.php?page=login'
    );
}
?>