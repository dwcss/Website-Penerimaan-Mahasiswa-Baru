<?php

require_once __DIR__ . '/../../../config/database.php';

$db = new Database();
$conn = $db->connect();

$soal = $conn->query("SELECT * FROM soal");

?>

<!DOCTYPE html>
<html>
<head>

    <title>Ujian PMB</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            Ujian Online PMB

        </div>

        <div class="card-body">

            <div class="alert alert-warning">

                Waktu Ujian:
                <span id="timer">10:00</span>

            </div>

            <form
            action="app/controllers/UjianController.php"
            method="POST">

                <?php
                $no = 1;
                foreach($soal as $s):
                ?>

                <div class="mb-4">

                    <h5>
                        <?= $no++; ?>.
                        <?= $s['pertanyaan']; ?>
                    </h5>

                    <input type="radio"
                    name="jawaban[<?= $s['id']; ?>]"
                    value="A"> <?= $s['opsi_a']; ?>

                    <br>

                    <input type="radio"
                    name="jawaban[<?= $s['id']; ?>]"
                    value="B"> <?= $s['opsi_b']; ?>

                    <br>

                    <input type="radio"
                    name="jawaban[<?= $s['id']; ?>]"
                    value="C"> <?= $s['opsi_c']; ?>

                    <br>

                    <input type="radio"
                    name="jawaban[<?= $s['id']; ?>]"
                    value="D"> <?= $s['opsi_d']; ?>

                </div>

                <?php endforeach; ?>

                <button class="btn btn-success">

                    Submit Ujian

                </button>

            </form>

        </div>

    </div>

</div>

<script>

let time = 600;

let timer = document.getElementById('timer');

setInterval(() => {

    let minutes = Math.floor(time / 60);
    let seconds = time % 60;

    timer.innerHTML =
        minutes + ":" + seconds;

    time--;

},1000);

</script>

</body>
</html>