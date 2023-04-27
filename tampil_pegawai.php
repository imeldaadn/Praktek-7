<!DOCTYPE html>
<html>
    <body>
        <h3> DATA PEGAWAI </h3>
        <a href = tambah_pegawai.php $no>Tambah Data Pegawai</a>
        <br>
        <br>
        <table border=1 style = "border-collapse:collapse">
            <tr bgcolor="#eee">
                <th width="50">No.</th>
                <th width="100">No. Induk</th>
                <th width="120">Nama Pegawai</th>
                <th width="150">Tanggal Lahir</th>
                <th width="200">Alamat</th>
                <th width="50">Jenis Kelamin</th>
                <th width="120">Jabatan</th>
                <th width="100">Gaji Pokok</th>
                <th width="100">Aksi</th>
            </tr>   
            
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

            $no = 1;
            $sql = "SELECT * FROM tbl_pegawai, tbl_jabatan 
            WHERE tbl_pegawai.id_jabatan = tbl_jabatan.id_jabatan";
            $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)){
                    echo 
                    "<tr>
                        <td align = 'center'>$no</td>
                        <td align = 'center'>$row[no_induk]</td>
                        <td align = 'center'>$row[nama]</td>
                        <td align = 'center'>$row[tgl_lahir]</td>
                        <td align = 'center'>$row[alamat]</td>
                        <td align = 'center'>$row[jk]</td>
                        <td align = 'center'>$row[nama_jabatan]</td>
                        <td align = 'center'>$row[gaji_pokok]</td>
                        <td align = 'center'>
                            <a href = 'update_pegawai.php? update=$row[id_karyawan]'>Edit</a> |
                            <a href = '?delete=$row[id_karyawan]' onclick = 'return checkdelete()'>Hapus</a> 
                        </td>
                    </tr>";
                    $no++;
                }
            ?>
        </table>
        <script>
            function checkdelete(){
                return confirm ('Apakah Anda yakin ingin menghapus data ini?')
            }
        </script> 
        <?php
            if (isset($_GET['delete'])) {
                mysqli_query($conn,"DELETE FROM tbl_pegawai WHERE id_karyawan = $_GET[delete]");
                echo "<script> alert('Data Telah Terhapus!'); document.location = 'tampil_pegawai.php'</script>";
            }
            mysqli_close($conn);
        ?>
    </body>
</html>
