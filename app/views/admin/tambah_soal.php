<?php

include __DIR__ . '/../layouts/header_admin.php';

?>

<div class="card shadow">

    <div class="card-header bg-success text-white">

        <h4>
            Tambah Soal
        </h4>

    </div>

    <div class="card-body">

        <form
        action="app/controllers/SoalController.php"
        method="POST">

            <label>Pertanyaan</label>

            <textarea
            name="pertanyaan"
            class="form-control mb-3"
            required></textarea>

            <label>Opsi A</label>

            <input type="text"
            name="a"
            class="form-control mb-3"
            required>

            <label>Opsi B</label>

            <input type="text"
            name="b"
            class="form-control mb-3"
            required>

            <label>Opsi C</label>

            <input type="text"
            name="c"
            class="form-control mb-3"
            required>

            <label>Opsi D</label>

            <input type="text"
            name="d"
            class="form-control mb-3"
            required>

            <label>Jawaban Benar</label>

            <select
            name="jawaban"
            class="form-control mb-3">

                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>

            </select>

            <button
            name="tambah"
            class="btn btn-success">

                Simpan Soal

            </button>

        </form>

    </div>

</div>

<?php include __DIR__ . '/../layouts/footer_admin.php'; ?>