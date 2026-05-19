<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Register PMB</title>

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:linear-gradient(135deg,#0d6efd,#003c8f);
            font-family:'Segoe UI';
            min-height:100vh;
        }

        /* HEADER */

        .top-header{
            background:rgba(255,255,255,0.1);
            backdrop-filter:blur(10px);
            padding:20px 50px;
            color:white;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .top-header h3{
            margin:0;
            font-weight:bold;
        }

        .top-header a{
            color:white;
            text-decoration:none;
            font-weight:bold;
        }

        /* CARD */

        .register-card{
            border:none;
            border-radius:30px;
            overflow:hidden;
            box-shadow:0 15px 40px rgba(0,0,0,0.2);
            background:white;
        }

        .card-header-custom{
            background:linear-gradient(135deg,#0d6efd,#0056d2);
            color:white;
            text-align:center;
            padding:35px;
        }

        .card-header-custom i{
            font-size:60px;
            margin-bottom:15px;
        }

        .card-body{
            padding:40px;
        }

        /* INPUT */

        .form-control,
        .form-select{
            border-radius:15px;
            padding:12px;
            border:1px solid #ddd;
        }

        .form-control:focus,
        .form-select:focus{
            box-shadow:none;
            border-color:#0d6efd;
        }

        /* BUTTON */

        .btn-register{
            background:linear-gradient(135deg,#0d6efd,#003c8f);
            border:none;
            border-radius:15px;
            padding:14px;
            color:white;
            font-weight:bold;
            transition:0.3s;
        }

        .btn-register:hover{
            transform:translateY(-3px);
            background:linear-gradient(135deg,#0056d2,#002f6c);
            color:white;
        }

        /* LABEL */

        label{
            font-weight:600;
            margin-bottom:8px;
        }

        /* FOOTER */

        .footer{
            margin-top:50px;
            background:rgba(255,255,255,0.1);
            backdrop-filter:blur(10px);
            color:white;
            text-align:center;
            padding:25px;
        }

        .footer h5{
            font-weight:bold;
        }

    </style>

</head>

<body>

<!-- HEADER -->

<div class="top-header">

    <div>

        <h3>

            <i class="fa-solid fa-graduation-cap"></i>
            PMB Kampus Modern

        </h3>

    </div>

    <div>

        <a href="index.php?page=login">

            <i class="fa fa-sign-in-alt"></i>
            Login

        </a>

    </div>

</div>

<!-- FORM -->

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card register-card">

                <!-- HEADER CARD -->

                <div class="card-header-custom">

                    <i class="fa-solid fa-user-graduate"></i>

                    <h2>
                        Register Mahasiswa
                    </h2>

                    <p>
                        Sistem Penerimaan Mahasiswa Baru
                    </p>

                </div>

                <!-- BODY -->

                <div class="card-body">

                    <form
                    action="app/controllers/AuthController.php"
                    method="POST"
                    enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label>
                                    Nama Lengkap
                                </label>

                                <input type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Masukkan nama lengkap"
                                required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>
                                    Email
                                </label>

                                <input type="email"
                                name="email"
                                class="form-control"
                                placeholder="Masukkan email"
                                required>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label>
                                    Nomor HP
                                </label>

                                <input type="text"
                                name="no_hp"
                                class="form-control"
                                placeholder="08xxxxxxxxxx"
                                required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>
                                    Asal Sekolah
                                </label>

                                <input type="text"
                                name="asal_sekolah"
                                class="form-control"
                                placeholder="Masukkan asal sekolah"
                                required>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label>
                                Alamat
                            </label>

                            <textarea
                            name="alamat"
                            class="form-control"
                            rows="3"
                            placeholder="Masukkan alamat lengkap"
                            required></textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label>
                                    Pilih Jurusan
                                </label>

                                <select
                                name="jurusan"
                                class="form-select">

                                    <option>
                                        Informatika
                                    </option>

                                    <option>
                                        Sistem Informasi
                                    </option>

                                    <option>
                                        Teknik Elektro
                                    </option>

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>
                                    Password
                                </label>

                                <input type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                required>

                            </div>

                        </div>

                        <hr class="my-4">

                        <h5 class="mb-3 text-primary">

                            Upload Dokumen

                        </h5>

                        <div class="mb-3">

                            <label>
                                Upload Foto
                            </label>

                            <input type="file"
                            name="foto"
                            class="form-control"
                            required>

                        </div>

                        <div class="mb-3">

                            <label>
                                Upload KTP
                            </label>

                            <input type="file"
                            name="ktp"
                            class="form-control"
                            required>

                        </div>

                        <div class="mb-4">

                            <label>
                                Upload Ijazah
                            </label>

                            <input type="file"
                            name="ijazah"
                            class="form-control"
                            required>

                        </div>

                        <button
                        name="register"
                        class="btn btn-register w-100">

                            <i class="fa fa-user-plus"></i>
                            Daftar Sekarang

                        </button>

                    </form>

                    <div class="text-center mt-4">

                        Sudah punya akun?

                        <a href="index.php?page=login"
                        class="fw-bold text-decoration-none">

                            Login Disini

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- FOOTER -->

<div class="footer">

    <h5>

        PMB Kampus Modern

    </h5>

    <p>

        Sistem Penerimaan Mahasiswa Baru Berbasis Web

    </p>

    <small>

        © <?= date('Y'); ?> All Rights Reserved

    </small>

</div>

</body>
</html>