<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_bukutamu";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Insert multiple to table
$sql = "INSERT INTO buku_tamu (ID_BT, NAMA, EMAIL, ISI)
        VALUES ('1','Jerry Jake', 'jerryjk@gmail.com', 'Bertemu dengan Bapak Herman (KADEP)');"; 
$sql .= "INSERT INTO buku_tamu (ID_BT, NAMA, EMAIL, ISI)
        VALUES ('2','Karmin', 'karmin01@gmail.com', 'Wawancara/Interview');"; 
$sql .= "INSERT INTO buku_tamu (ID_BT, NAMA, EMAIL, ISI)
        VALUES ('3','Muhammad Elang Irawan', 'irwnelang@gmail.com', '');";
$sql .= "INSERT INTO buku_tamu (ID_BT, NAMA, EMAIL, ISI)
        VALUES ('4','Jay Park', 'jyp@gmail.com', 'Kunjungan lapangan');"; 
$sql .= "INSERT INTO buku_tamu (ID_BT, NAMA, EMAIL, ISI)
        VALUES ('5','Jennie jane', 'jnnie@gmail.com', 'Koordinasi MoU dengan Ibu Lisa');";

if (mysqli_multi_query($conn, $sql)) {
    echo "New record created succescfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>