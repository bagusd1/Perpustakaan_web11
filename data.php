<?php
require_once "koneksi.php";

$sql = "SELECT id, no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat FROM anggota ORDER BY id ASC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota Perpustakaan Terdaftar</title>
</head>
<body>
    <h1>Data Anggota Perpustakaan Terdaftar</h1>
    <a class="tombol" href="form_anggota.php">+ Tambah Data Anggota</a>

    <table border=1>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Anggota</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Jenis Anggota</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($hasil && mysqli_num_rows($hasil) > 0) { ?>
                <?php $no = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($row["no_anggota"]); ?></td>
                        <td><?php echo htmlspecialchars($row["nama_lengkap"]); ?></td>
                        <td><?php echo htmlspecialchars($row["email"]); ?></td>
                        <td><?php echo htmlspecialchars($row["no_hp"]); ?></td>
                        <td><?php echo htmlspecialchars($row["jenis_anggota"]); ?></td>
                        <td><?php echo htmlspecialchars($row["alamat"]); ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="7" style="text-align:center;">Belum ada data anggota.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php
mysqli_close($koneksi);
?>