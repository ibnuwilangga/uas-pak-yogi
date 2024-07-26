<?php
include 'koneksi.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];

    $sql = "UPDATE mahasiswa SET nama='$nama', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', jurusan='$jurusan' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: read.php");
    exit();
} else {
    $sql = "SELECT * FROM mahasiswa WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Penerimaan Mahasiswa Baru</h1>
    </header>
    <form method="post" action="">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required><br>
        Jenis Kelamin: 
        <select name="jenis_kelamin" required>
            <option value="Laki-Laki" <?php if($row['jenis_kelamin'] == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
            <option value="Perempuan" <?php if($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
        </select><br>
        Alamat: <textarea name="alamat" required><?php echo $row['alamat']; ?></textarea><br>
        Jurusan: 
        <select name="jurusan" required>
            <option value="Teknik Informatika" <?php if($row['jurusan'] == 'Teknik Informatika') echo 'selected'; ?>>Teknik Informatika</option>
            <option value="Rekayasa Perangkat Lunak" <?php if($row['jurusan'] == 'Rekayasa Perangkat Lunak') echo 'selected'; ?>>Rekayasa Perangkat Lunak</option>
            <option value="Sistem Informasi" <?php if($row['jurusan'] == 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
            <option value="Manajemen" <?php if($row['jurusan'] == 'Manajemen') echo 'selected'; ?>>Manajemen</option>
            <option value="Kebidanan (D3)" <?php if($row['jurusan'] == 'Kebidanan (D3)') echo 'selected'; ?>>Kebidanan (D3)</option>
            <option value="Hukum" <?php if($row['jurusan'] == 'Hukum') echo 'selected'; ?>>Hukum</option>
            <option value="Gizi" <?php if($row['jurusan'] == 'Gizi') echo 'selected'; ?>>Gizi</option>
            <option value="Soshum/IPS" <?php if($row['jurusan'] == 'Soshum/IPS') echo 'selected'; ?>>Soshum/IPS</option>
            <option value="Seni dan desain" <?php if($row['jurusan'] == 'Seni dan desain') echo 'selected'; ?>>Seni dan desain</option>
            <option value="Matematika" <?php if($row['jurusan'] == 'Matematika') echo 'selected'; ?>>Matematika</option>
            <option value="Fisika" <?php if($row['jurusan'] == 'Fisika') echo 'selected'; ?>>Fisika</option>
            <option value="Biologi" <?php if($row['jurusan'] == 'Biologi') echo 'selected'; ?>>Biologi</option>
            <option value="Kimia" <?php if($row['jurusan'] == 'Kimia') echo 'selected'; ?>>Kimia</option>
            <option value="Astronomi" <?php if($row['jurusan'] == 'Astronomi') echo 'selected'; ?>>Astronomi</option>
            <option value="Kedokteran gigi" <?php if($row['jurusan'] == 'Kedokteran gigi') echo 'selected'; ?>>Kedokteran gigi</option>
            <option value="Teknik Nuklir" <?php if($row['jurusan'] == 'Teknik Nuklir') echo 'selected'; ?>>Teknik Nuklir</option>
        </select><br>
        <input type="submit" value="Update">
        <a href="read.php"><input type="button" value="Lihat Data Mahasiswa"></a>
    </form>
</body>
</html>
