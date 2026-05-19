<?php

require_once __DIR__ . '/../../../config/database.php';

include __DIR__ . '/../layouts/header_mahasiswa.php';

$db = new Database();
$conn = $db->connect();

$user_id = $_SESSION['user_id'];

/*
|--------------------------------------------------------------------------
| CEK PEMBAYARAN
|--------------------------------------------------------------------------
*/

$cek = $conn->prepare(
    "SELECT * FROM pembayaran
    WHERE user_id=?"
);

$cek->execute([$user_id]);

$data = $cek->fetch(PDO::FETCH_ASSOC);

/*
|--------------------------------------------------------------------------
| UPLOAD PEMBAYARAN
|--------------------------------------------------------------------------
*/

if(isset($_POST['upload'])){

    $file = $_FILES['bukti']['name'];
    $tmp  = $_FILES['bukti']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "public/assets/uploads/pembayaran/" . $file
    );

    $insert = $conn->prepare(
        "INSERT INTO pembayaran(
        user_id,
        bukti_pembayaran,
        status
        ) VALUES(
        ?,?,
        'Menunggu Verifikasi'
        )"
    );

    $insert->execute([
        $user_id,
        $file
    ]);

    echo "
    <script>
        alert('Bukti pembayaran berhasil diupload');
        window.location='index.php?page=pembayaran';
    </script>
    ";

}

?>

<div class="card shadow border-0 rounded-4">

    <div class="card-header bg-warning">

        <h4>
            Pembayaran Daftar Ulang
        </h4>

    </div>

    <div class="card-body">

        <?php if($data): ?>

            <?php if($data['status'] == 'Lunas'): ?>

                <div class="alert alert-success">

                    <h5>
                        ✅ Pembayaran Sudah Lunas
                    </h5>

                    <hr>

                    <p>
                        NIM:
                        <b><?= $data['nim']; ?></b>
                    </p>

                </div>

                <a href="index.php?page=ospek"
                class="btn btn-primary">

                    Masuk Halaman OSPEK

                </a>

            <?php else: ?>

                <div class="alert alert-warning">

                    Bukti pembayaran sudah diupload.<br>
                    Status:
                    <b>
                        <?= $data['status']; ?>
                    </b>

                </div>

            <?php endif; ?>

        <?php else: ?>

            <form
            method="POST"
            enctype="multipart/form-data">

                <div class="mb-3">

                    <label class="form-label">

                        Upload Bukti Pembayaran

                    </label>

                    <input type="file"
                    name="bukti"
                    class="form-control"
                    required>

                </div>

                <button
                name="upload"
                class="btn btn-success">

                    Upload

                </button>

            </form>

        <?php endif; ?>

    </div>

</div>

<?php include __DIR__ . '/../layouts/footer_mahasiswa.php'; ?>