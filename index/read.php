<?php
include 'koneksi.php';

$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Penerimaan Mahasiswa Baru</h1>
    </header>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nama"] . "</td>
                        <td>" . $row["tanggal_lahir"] . "</td>
                        <td>" . $row["jenis_kelamin"] . "</td>
                        <td>" . $row["alamat"] . "</td>
                        <td>" . $row["jurusan"] . "</td>
                        <td>
                            <a href='update.php?id=" . $row["id"] . "'>Edit</a> | 
                            <a href='delete.php?id=" . $row["id"] . "'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No results found</td></tr>";
        }
        ?>
    </table>
    <a href="index.php"><input type="button" value="Tambah Data Mahasiswa"></a>
</body>
</html>

<?php
$conn->close();
?>
