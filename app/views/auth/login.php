<!DOCTYPE html>
<html>
<head>

    <title>Login PMB</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    Login PMB
                </div>

                <div class="card-body">

                    <form action="app/controllers/LoginProcess.php" method="POST">

                        <input type="email"
                        name="email"
                        class="form-control mb-3"
                        placeholder="Email">

                        <input type="password"
                        name="password"
                        class="form-control mb-3"
                        placeholder="Password">

                        <button class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                    <a href="index.php?page=register">
                        Belum punya akun?
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>