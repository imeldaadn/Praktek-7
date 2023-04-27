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
$sql = "INSERT INTO tbl_jabatan (id_jabatan, nama_jabatan, gaji_pokok)
        VALUES ('1','Staf HRD', '45000000');"; 
$sql .= "INSERT INTO tbl_jabatan (id_jabatan, nama_jabatan, gaji_pokok)
        VALUES ('2','Staf Finance', '50000000');"; 
$sql .= "INSERT INTO tbl_jabatan (id_jabatan, nama_jabatan, gaji_pokok)
        VALUES ('3','Kepala Bagian', '65000000');";
$sql .= "INSERT INTO tbl_jabatan (id_jabatan, nama_jabatan, gaji_pokok)
        VALUES ('4','Supervisor', '70000000');"; 
$sql .= "INSERT INTO tbl_jabatan (id_jabatan, nama_jabatan, gaji_pokok)
        VALUES ('5','Direktur', '120000000');";

if (mysqli_multi_query($conn, $sql)) {
    echo "New record created succescfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>