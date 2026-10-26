
<?php
// Koneksi database
require_once __DIR__ . "/connect.php";

// Mengambil NIM dari form
$nim = $_POST['nim'];

// Query hapus data
$sql = "DELETE FROM nilai_mahasiswa WHERE nim = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $nim);

if (mysqli_stmt_execute($stmt)) {
    header("Location: users.php");
    exit;
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
