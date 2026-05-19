<?php

session_start();

require_once __DIR__ . '/../../config/database.php';

$db = new Database();
$conn = $db->connect();

$email = $_POST['email'];
$password = $_POST['password'];

$query = $conn->prepare(
    "SELECT * FROM users WHERE email=?"
);

$query->execute([$email]);

$user = $query->fetch(PDO::FETCH_ASSOC);

if($user){

    if(password_verify($password, $user['password'])){

        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] == 'admin'){

            header(
                'Location: ../../index.php?page=dashboard_admin'
            );

        } else {

            header(
                'Location: ../../index.php?page=dashboard_mahasiswa'
            );

        }

    } else {

        die("Password salah");

    }

} else {

    die("Email tidak ditemukan");

}
?>