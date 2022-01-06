<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location:login.php");
    exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

// jika tombol cari di klik
if( isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah data mahasiswa</a>
<br><br>
<form action="" method="post">
    <input type="text" name ="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>
</form>
<br>
<div id='container'>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $mahasiswa as $row) : ?> 
    <tr>
        <td><?php echo $i; ?></td>
        <td>
        <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin');">hapus</a>
        </td>
        <td><img src="Gambar/<?= $row["gambar"] ;?>" width="70"> </td>
        <td><?= $row["nrp"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["jurusan"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

</table>
</div>

<script src="js/script.js" ></script>
</body>
</html>