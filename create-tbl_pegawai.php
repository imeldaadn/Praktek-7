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
$sql = "CREATE TABLE tbl_pegawai (
    id_karyawan INT(11)UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    no_induk INT(10) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    tgl_lahir DATE NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    jk VARCHAR(1) NOT NULL,
    id_jabatan INT(2) NOT NULL)";

if (mysqli_query($conn, $sql)) {
    echo "New record created succescfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>