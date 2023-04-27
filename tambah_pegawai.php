<!DOCTYPE html>
<html>
    <body>
        <h3> Tambah Pegawai </h3>
        <form method = "POST" action="">
            <table>
                <tr>
                    <td width = "100">No. Induk</td>
                    <td><input type = "text" name = "no_induk"></td>
                </tr>
                <tr>
                    <td width = "100">Nama Pegawai</td>
                    <td><input type = "text" name = "nama"></td>
                </tr>
                <tr>
                    <td width = "100">Tanggal Lahir</td>
                    <td><input type = "date" name = "tgl_lahir"></td>
                </tr>
                <tr>
                    <td width = "100">Alamat</td>
                    <td><input type = "text" name = "alamat"></td>
                </tr>
                <tr>
                    <td width = "100">Jenis Kelamin</td>
                    <td><input type = "radio" name = "jk" value = "P">Perempuan</td>
                    <td><input type = "radio" name = "jk" value = "L">Laki-laki</td>
                </tr>
                <tr>
                    <td width = "100">Jabatan</td>
                    <td><select name = "id_jabatan">
                            <option>---</option>
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
                            $sql = "SELECT * FROM tbl_jabatan";
                            $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value = $row[id_jabatan]> $row[nama_jabatan]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width = "100"></td>
                    <td><input type = "submit" value = "Simpan" name = "tambah"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['tambah'])){
                mysqli_query($conn,"insert into tbl_pegawai set
                no_induk ='$_POST[no_induk]',
                nama ='$_POST[nama]',
                tgl_lahir ='$_POST[tgl_lahir]',
                alamat ='$_POST[alamat]',
                jk ='$_POST[jk]',
                id_jabatan ='$_POST[id_jabatan]'
                ") or die (mysqli_error($conn));

                echo "<script> alert('Data Telah Tersimpan!');
                document.location = 'tampil_pegawai.php'
                </script>";
            }
        ?>
    </body>
</html>