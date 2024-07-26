<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mahasiswa (nama, tanggal_lahir, jenis_kelamin, alamat, jurusan) VALUES ('$nama', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$jurusan')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Penerimaan Mahasiswa Baru</h1>
    </header>
    <form method="post" action="">
        Nama: <input type="text" name="nama" required><br>
        Tanggal Lahir: <input type="date" name="tanggal_lahir" required><br>
        Jenis Kelamin: 
        <select name="jenis_kelamin" required>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br>
        Alamat: <textarea name="alamat" required></textarea><br>
        Jurusan: 
        <select name="jurusan" required>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Manajemen">Manajemen</option>
            <option value="Kebidanan (D3)">Kebidanan (D3)</option>
            <option value="Hukum">Hukum</option>
            <option value="Gizi">Gizi</option>
            <option value="Soshum/IPS">Soshum/IPS</option>
            <option value="Seni dan desain">Seni dan desain</option>
            <option value="Matematika">Matematika</option>
            <option value="Fisika">Fisika</option>
            <option value="Biologi">Biologi</option>
            <option value="Kimia">Kimia</option>
            <option value="Astronomi">Astronomi</option>
            <option value="Kedokteran gigi">Kedokteran gigi</option>
            <option value="Teknik Nuklir">Teknik Nuklir</option>
        </select><br>
        <input type="submit" value="Submit">
        <a href="read.php"><input type="button" value="Lihat Data Mahasiswa"></a>
    </form>
</body>
</html>
