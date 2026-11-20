<?php
include 'koneksi.php';

$id = $_GET['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM mahasiswa WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nim  = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    $stmt_upd = mysqli_prepare($conn, "UPDATE mahasiswa SET nama=?, nim=?, jurusan=? WHERE id=?");
    mysqli_stmt_bind_param($stmt_upd, "sssi", $nama, $nim, $jurusan, $id);

    if (mysqli_stmt_execute($stmt_upd)) {
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
    <title>Edit Data</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h2>Edit Data Mahasiswa</h2>
    <form method="post">
        Nama : <br><input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required><br><br>
        Nim : <br><input type="text" name="nim" value="<?= htmlspecialchars($data['nim']) ?>" required><br><br>
        Jurusan : <br><input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']) ?>" required><br><br>
        <button type="submit" name="update">Update</button>
        <a href="index.php">Batal</a>
    </form>
</body>

</html>