<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db5a";

// Create connection 
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo 'Connected Sucessfuly'; 


// sql to create table
// $sql = "CREATE TABLE nilai_mahasiswa (
// nim CHAR(10) PRIMARY KEY,
// nama_mhsw VARCHAR(30) not null,
// nilai_akhir float(6),
// nilai_huruf VARCHAR(10),  
// predikat VARCHAR(10)
// )";

// if (mysqli_query($conn, $sql)) {
//   echo "Table created successfully";
// } else {
//   echo "Pembuatan tabel gagal : " . mysqli_error($conn);
// }

// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('Joko', 'Widodo', 'Wiwokdetok@precident.com')";

// if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// Close connection 
// mysqli_close($conn);

?>