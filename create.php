<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim  = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    $stmt = mysqli_prepare($conn, "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $nama, $nim, $jurusan);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form method="POST">
        Nama : <br><input type="text" name="nama" required><br><br>
        Nim : <br><input type="text" name="nim" required><br><br>
        Jurusan: <br><input type="text" name="jurusan" required><br><br>
        <button type="submit" name="simpan">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>

</html>