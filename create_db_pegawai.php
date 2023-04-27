<?php
$servername = "localhost";
$username = "root";
$password = "";

//Creat connection
$conn = mysqli_connect($servername,$username,$password);
//Check connection
if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

//Create database
$sql = "CREATE DATABASE db_pegawai";
if (mysqli_query($conn, $sql)){
    echo "Database created succesfully";
} else {
    echo "Error creating database: ".mysqli_error($conn);
}

mysqli_close($conn);
?>