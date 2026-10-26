<?php
// Set zona waktu agar jam sesuai WIB
date_default_timezone_set('Asia/Jakarta');

// Koneksi database
require_once __DIR__ . "/connect.php";

// Mengambil data dari form dengan keamanan tambahan
$nim   = mysqli_real_escape_string($conn, $_POST['nim']);
$nama  = mysqli_real_escape_string($conn, $_POST['nama']);
$nilai = $_POST['nilai'];

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

// Proses Upload Foto Profil (Jika ada file yang diupload)
$nama_file_foto = "";
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $folder_upload = __DIR__ . "/uploads/";

    // Buat folder uploads otomatis jika belum ada
    if (!is_dir($folder_upload)) {
        mkdir($folder_upload, 0777, true);
    }

    $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    // Validasi ekstensi dan ukuran maksimal 2MB (2097152 bytes)
    if (in_array($ext, $allowed) && $_FILES['foto']['size'] <= 2097152) {
        // Beri nama unik (NIM + timestamp) agar tidak bentrok
        $nama_file_foto = $nim . "_" . time() . "." . $ext;
        $tujuan = $folder_upload . $nama_file_foto;

        move_uploaded_file($_FILES['foto']['tmp_name'], $tujuan);
    } else {
        echo "Format foto harus JPG, PNG, atau WEBP dan ukuran maksimal 2MB!";
        exit;
    }
}

// Query insert data beserta kolom foto
$sql = "INSERT INTO nilai_mahasiswa (nim, nama_mhsw, foto, nilai_akhir, nilai_huruf, predikat)
        VALUES ('$nim', '$nama', '$nama_file_foto', '$nilai', '$nilai_huruf', '$predikat')";

if (mysqli_query($conn, $sql)) {
    header("Location: users.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>