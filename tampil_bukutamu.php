<!DOCTYPE html>
<html>
    <body>
        <h3> Buku Tamu </h3>
        <table border=1 style = "border-collapse:collapse">
            <tr bgcolor="#eee">
                <th width="100">ID Tamu</th>
                <th width="190">Nama</th>
                <th width="200">Email</th>
                <th width="300">Isi</th>
            </tr>   
            
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

            $sql = "SELECT * FROM buku_tamu";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                //output data of each row
                while ($row = mysqli_fetch_array($result)){
                    echo 
                    "<tr>
                        <td align = 'center'>$row[ID_BT]</td>
                        <td align = 'center'>$row[NAMA]</td>
                        <td align = 'center'>$row[EMAIL]</td>
                        <td align = 'center'>$row[ISI]</td>
                    </tr>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            ?>
        </table>
    </body>
</html>
