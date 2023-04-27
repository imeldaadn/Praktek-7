<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pegawai";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Create table
$sql = "CREATE TABLE tbl_jabatan (
    id_jabatan INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_jabatan VARCHAR(30) NOT NULL,
    gaji_pokok INT(15))";

if (mysqli_query($conn, $sql)) {
    echo "New record created succescfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>