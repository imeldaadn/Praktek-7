<!DOCTYPE html>
<html>
    <body>
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
        $sql = "SELECT * FROM tbl_pegawai, tbl_jabatan 
        WHERE tbl_pegawai.id_jabatan = tbl_jabatan.id_jabatan and id_karyawan= $_GET[update]";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        ?>  

        <h3> Ubah Pegawai </h3>
        <form method = "POST" action="">
            <table>
                <tr>
                    <td width = "100">No. Induk</td>
                    <td><input type = "text" name = "no_induk" value ="<?php echo $row['no_induk'];?>"></td>
                </tr>
                <tr>
                    <td width = "100">Nama Pegawai</td>
                    <td><input type = "text" name = "nama" value ="<?php echo $row['nama'];?>"></td>
                </tr>
                <tr>
                    <td width = "100">Tanggal Lahir</td>
                    <td><input type = "date" name = "tgl_lahir" value ="<?php echo $row['tgl_lahir'];?>"></td>
                </tr>
                <tr>
                    <td width = "100">Alamat</td>
                    <td><input type = "text" name = "alamat" value ="<?php echo $row['alamat'];?>"></td>
                </tr>
                <tr>
                    <td width = "100">Jenis Kelamin</td>
                    <td><input type = "radio" name = "jk" value ="P"
                    <?php
                        if ($row['jk'] == "P") {
                            echo "checked";
                        }
                    ?>
                    >Perempuan</td>
                    <td><input type = "radio" name = "jk" value ="L"
                    <?php
                        if ($row['jk'] == "L") {
                            echo "checked";
                        }
                    ?>
                    >Laki-laki</td>
                </tr>
                <tr>
                    <td width = "100">Jabatan</td>
                    <td><select name = "id_jabatan">
                        <?php
                            echo "<option value = $row[id_jabatan]> $row[nama_jabatan]</option>";
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
                    <td><input type = "submit" value = "Simpan" name = "ubah"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['ubah'])){
                mysqli_query($conn,"update tbl_pegawai set
                no_induk ='$_POST[no_induk]',
                nama ='$_POST[nama]',
                tgl_lahir ='$_POST[tgl_lahir]',
                alamat ='$_POST[alamat]',
                jk ='$_POST[jk]',
                id_jabatan ='$_POST[id_jabatan]' where id_karyawan = $_GET[update]
                ") or die (mysqli_error($conn));

                echo "<script> alert('Data berhasil diubah!');
                document.location = 'tampil_pegawai.php'
                </script>";
            }
        ?>
    </body>
</html>