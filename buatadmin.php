<?php

require_once 'config/database.php';

$db = new Database();
$conn = $db->connect();

$password = password_hash(
    "admin123",
    PASSWORD_DEFAULT
);

$query = $conn->prepare(
    "INSERT INTO users(
        nama,
        email,
        password,
        role
    ) VALUES(?,?,?,?)"
);

$query->execute([
    'Administrator',
    'admin@kampus.com',
    $password,
    'admin'
]);

echo "Admin berhasil dibuat";
?>