<?php
// Set zona waktu agar jam sesuai WIB
date_default_timezone_set('Asia/Jakarta');

// Koneksi database
require_once __DIR__ . "/connect.php";

// Mengambil data dari form
$nim_lama = mysqli_real_escape_string($conn, $_POST['nim_lama']);
$nim      = mysqli_real_escape_string($conn, $_POST['nim']);
$nama     = mysqli_real_escape_string($conn, $_POST['nama']);
$nilai    = $_POST['nilai'];

// Validasi nilai
if (!is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
    echo "Nilai tidak valid! Masukkan nilai 0 - 100";
    exit;
}

// Menentukan nilai huruf dan predikat
if ($nilai >= 80.51) {
    $nilai_huruf = "A";
    $predikat    = "Sangat Memuaskan";
} elseif ($nilai >= 65.51) {
    $nilai_huruf = "B";
    $predikat    = "Memuaskan";
} elseif ($nilai >= 50.51) {
    $nilai_huruf = "C";
    $predikat    = "Cukup";
} elseif ($nilai >= 34.51) {
    $nilai_huruf = "D";
    $predikat    = "Kurang";
} else {
    $nilai_huruf = "E";
    $predikat    = "Tidak Lulus";
}

// Cek apakah user mengupload foto baru saat edit
$query_foto = "";
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $folder_upload = __DIR__ . "/uploads/";

    if (!is_dir($folder_upload)) {
        mkdir($folder_upload, 0777, true);
    }

    $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    if (in_array($ext, $allowed) && $_FILES['foto']['size'] <= 2097152) {
        $nama_file_foto = $nim . "_" . time() . "." . $ext;
        $tujuan = $folder_upload . $nama_file_foto;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $tujuan)) {
            $query_foto = "foto = '$nama_file_foto', ";
        }
    } else {
        echo "Format foto harus JPG, PNG, atau WEBP dan ukuran maksimal 2MB!";
        exit;
    }
}

$waktu_sekarang = date("Y-m-d H:i:s");

// Query update data
$sql = "UPDATE nilai_mahasiswa SET 
        nim = '$nim', 
        nama_mhsw = '$nama', 
        $query_foto
        nilai_akhir = '$nilai', 
        nilai_huruf = '$nilai_huruf', 
        predikat = '$predikat', 
        modify_date = '$waktu_sekarang' 
        WHERE nim = '$nim_lama'";

if (mysqli_query($conn, $sql)) {
    header("Location: users.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>