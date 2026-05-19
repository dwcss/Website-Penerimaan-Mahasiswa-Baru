<?php

session_start();

require_once __DIR__ . '/../../config/database.php';

$db = new Database();
$conn = $db->connect();

if(isset($_POST['upload'])){

    $bukti = $_FILES['bukti']['name'];

    move_uploaded_file(
        $_FILES['bukti']['tmp_name'],
        __DIR__ . '/../../public/assets/uploads/pembayaran/' . $bukti
    );

    $query = $conn->prepare(
        "INSERT INTO pembayaran(
            user_id,
            bukti_pembayaran,
            status
        ) VALUES(?,?,?)"
    );

    $query->execute([
        $_SESSION['user_id'],
        $bukti,
        'Menunggu Verifikasi'
    ]);

    header(
        'Location: ../../index.php?page=hasil'
    );
}
?>