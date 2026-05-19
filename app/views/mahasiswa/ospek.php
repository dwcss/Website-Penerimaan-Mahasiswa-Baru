<?php

require_once __DIR__ . '/../../../config/database.php';

include __DIR__ . '/../layouts/header_mahasiswa.php';

$db = new Database();
$conn = $db->connect();

$user_id = $_SESSION['user_id'];

$query = $conn->prepare(
    "SELECT * FROM pembayaran
    WHERE user_id=?
    AND status='Lunas'"
);

$query->execute([$user_id]);

$data = $query->fetch(PDO::FETCH_ASSOC);

?>

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <h3>
            Informasi OSPEK
        </h3>

    </div>

    <div class="card-body">

        <?php if($data): ?>

            <h5>
                NIM:
                <?= $data['nim']; ?>
            </h5>

            <hr>

            <p>
                <b>Jadwal:</b><br>
                10 Agustus 2026
            </p>

            <p>
                <b>Lokasi:</b><br>
                Aula Kampus Utama
            </p>

            <p>
                <b>Dresscode:</b><br>
                Kemeja putih, celana hitam
            </p>

            <div class="alert alert-success">

                Selamat!
                Anda resmi menjadi mahasiswa baru.

            </div>

        <?php else: ?>

            <div class="alert alert-danger">

                Anda belum menyelesaikan daftar ulang.

            </div>

        <?php endif; ?>

    </div>

</div>

<?php include __DIR__ . '/../layouts/footer_mahasiswa.php'; ?>