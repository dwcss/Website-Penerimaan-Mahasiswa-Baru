<?php

require_once __DIR__ . '/../../config/database.php';

$db = new Database();
$conn = $db->connect();

if(isset($_POST['tambah'])){

    $query = $conn->prepare(
        "INSERT INTO soal(
            pertanyaan,
            opsi_a,
            opsi_b,
            opsi_c,
            opsi_d,
            jawaban_benar
        ) VALUES(?,?,?,?,?,?)"
    );

    $query->execute([
        $_POST['pertanyaan'],
        $_POST['a'],
        $_POST['b'],
        $_POST['c'],
        $_POST['d'],
        $_POST['jawaban']
    ]);

    header(
        'Location: ../../index.php?page=data_soal'
    );
}
?>