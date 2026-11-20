<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h2>Daftar Mahasiswa</h2>
        <a href="create.php">Tambah Data</a>
    </div>
    <br>
    <table border="1">
        <th>No</th>
        <th>Nama</th>
        <th>Nim</th>
        <th>Jurusan</th>
        <th>Aksi</th>
        <?php
        $no = 1;
        $result = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($result)):
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['nim']); ?></td>
                <td><?= htmlspecialchars($row['jurusan']) ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm ('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>