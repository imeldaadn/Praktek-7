<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Insert multiple to table
$sql = "INSERT INTO liga (kode, negara, champion)
        VALUES ('Jer', 'Jerman', '4');"; 
$sql .= "INSERT INTO liga (kode, negara, champion)
        VALUES ('Spa', 'Spanyol', '3');"; 
$sql .= "INSERT INTO liga (kode, negara, champion)
        VALUES ('Eng', 'English', '3');"; 

if (mysqli_multi_query($conn, $sql)) {
    echo "New record created succescfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>