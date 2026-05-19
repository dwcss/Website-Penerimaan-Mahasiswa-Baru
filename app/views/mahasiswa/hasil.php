<?php

require_once __DIR__ . '/../../../config/database.php';

include __DIR__ . '/../layouts/header_mahasiswa.php';

$db = new Database();
$conn = $db->connect();

$user_id = $_SESSION['user_id'];

/*
|--------------------------------------------------------------------------
| AMBIL HASIL UJIAN
|--------------------------------------------------------------------------
*/

$query = $conn->prepare(
    "SELECT * FROM hasil_ujian
    WHERE user_id=?"
);

$query->execute([$user_id]);

$hasil = $query->fetch(PDO::FETCH_ASSOC);

?>

<div class="card shadow border-0 rounded-4">

    <div class="card-header bg-primary text-white">

        <h4>
            Status Kelulusan
        </h4>

    </div>

    <div class="card-body">

        <?php if($hasil): ?>

            <div class="mb-3">

                <h5>
                    Nilai Ujian
                </h5>

                <h2 class="text-primary">

                    <?= $hasil['nilai']; ?>

                </h2>

            </div>

            <div class="mb-3">

                <h5>
                    Status
                </h5>

                <?php if($hasil['status'] == 'Lulus Ujian'): ?>

                    <span class="badge bg-success p-2">

                        <?= $hasil['status']; ?>

                    </span>

                <?php else: ?>

                    <span class="badge bg-danger p-2">

                        <?= $hasil['status']; ?>

                    </span>

                <?php endif; ?>

            </div>

            <?php if($hasil['status'] == 'Lulus Ujian'): ?>

                <a href="index.php?page=pembayaran"
                class="btn btn-success">

                    Daftar Ulang

                </a>

            <?php endif; ?>

        <?php else: ?>

            <div class="alert alert-warning">

                Anda belum mengikuti ujian
                atau hasil belum tersedia.

            </div>

        <?php endif; ?>

    </div>

</div>

<?php include __DIR__ . '/../layouts/footer_mahasiswa.php'; ?>