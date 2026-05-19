<?php

session_start();

require_once '../../config/database.php';

$db = new Database();
$conn = $db->connect();

$jawaban = $_POST['jawaban'];

$benar = 0;

$total = count($jawaban);

foreach($jawaban as $id => $jwb){

    $query = $conn->prepare(
        "SELECT * FROM soal WHERE id=?"
    );

    $query->execute([$id]);

    $soal = $query->fetch(PDO::FETCH_ASSOC);

    if($jwb == $soal['jawaban_benar']){

        $benar++;

    }
}

$nilai = ($benar / $total) * 100;

$status =
    ($nilai >= 75)
    ? 'Lulus Ujian'
    : 'Tidak Lulus';

$insert = $conn->prepare(
    "INSERT INTO hasil_ujian(
        user_id,
        nilai,
        status
    ) VALUES(?,?,?)"
);

$insert->execute([
    $_SESSION['user_id'],
    $nilai,
    $status
]);

header(
    'Location: ../../index.php?page=hasil'
);
?>