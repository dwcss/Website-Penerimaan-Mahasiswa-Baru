<?php

require_once '../../config/database.php';

$db = new Database();
$conn = $db->connect();

if(isset($_POST['verifikasi'])){

    $id = $_POST['id'];
    $status = $_POST['status'];
    $catatan = $_POST['catatan'];

    $query = $conn->prepare(
        "UPDATE pendaftaran
        SET status_berkas=?,
        catatan=?
        WHERE id=?"
    );

    $query->execute([
        $status,
        $catatan,
        $id
    ]);

    header(
        'Location: ../../index.php?page=data_pendaftar'
    );
}
?>