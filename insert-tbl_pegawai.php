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

//Insert multiple to table
$sql = "INSERT INTO tbl_pegawai (id_karyawan, no_induk, nama, tgl_lahir, alamat, jk, id_jabatan)
        VALUES ('1','20230420', 'Garce Lee', '2002-04-21', 'Jl. Raden Patah', 'P', '1');"; 
$sql .= "INSERT INTO tbl_pegawai (id_karyawan, no_induk, nama, tgl_lahir, alamat, jk, id_jabatan)
        VALUES ('2','20230421', 'Danielle Marsh', '2001-04-11', 'Jl. Bumi Putra', 'P', '2');"; 
$sql .= "INSERT INTO tbl_pegawai (id_karyawan, no_induk, nama, tgl_lahir, alamat, jk, id_jabatan)
        VALUES ('3','20230422', 'Sagara', '2002-12-8', 'Jl. Rajawali','L','3');";
$sql .= "INSERT INTO tbl_pegawai (id_karyawan, no_induk, nama, tgl_lahir, alamat, jk, id_jabatan)
        VALUES ('4','20230423', 'Jake Paul', '2001-11-15', 'Jl. Bumi Indah','L','4');"; 
$sql .= "INSERT INTO tbl_pegawai (id_karyawan, no_induk, nama, tgl_lahir, alamat, jk, id_jabatan)
        VALUES ('5','20230424', 'Jay Park', '2000-4-20', 'Jl. Bukit Palma','L','5');";

if (mysqli_multi_query($conn, $sql)) {
    echo "New record created succescfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>