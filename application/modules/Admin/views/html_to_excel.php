<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Alumni.xls");
// header("Content-type: application/vnd-openxmlformats-officedocument.spreadsheetml.sheet");
// $file = "Data Alumni.xlsx";
// define file $mime type here
// $mime = 'application/vnd-openxmlformats-officedocument.spreadsheetml.sheet';
// ob_end_clean(); // this is solution
// header('Content-Description: File Transfer');
// header("Content-type: application/vnd-openxmlformats-officedocument.spreadsheetml.sheet");
// header("Content-Transfer-Encoding: Binary");
// header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
// header('Content-Transfer-Encoding: binary');
// header('Expires: 0');
// header('Cache-Control: must-revalidate');
// header('Pragma: public');
// readfile($file);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>


    <!-- Custom styles for this template-->

</head>

<body>

    <div id="container">
        <h1>
            <center>Data Alumni</center>
        </h1>

        <div id="body">
            <?php
            if ($dataopr != NULL) {
            ?>

                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>NoHP</th>
                            <th>JenisKelamin</th>
                            <th>Tahun Angkatan</th>
                            <th>Jurusan</th>
                            <th>Kegiatan</th>
                            <!-- <th>Action</th> -->


                        </tr>
                    </thead>

                    <tbody>

                        <?php



                        $count = 0;
                        $nm = '';
                        $list = '';
                        foreach ($dataopr  as $row) {
                            if ($nm != $row->nama) {
                                if ($count > 0) {
                        ?>


                                <?php
                                }
                                $count = $count + 1;
                                $list = '';
                                $nm = $row->nama;

                                ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $row->nis ?></td>
                                    <td><?php echo $row->nama ?></td>
                                    <td><?php echo $row->alamat ?></td>
                                    <td data-cell-type="text"><?php echo $row->no_hp ?></td>
                                    <td><?php echo $row->j_kelamin ?></td>
                                    <td><?php echo $row->tahun_angkatan ?></td>
                                    <td><?php echo $row->nama_jurusan ?></td>
                                    <td><?php echo $row->nama_kegiatan ?></td>


                            <?php

                            }
                        }
                            ?>
                                </tr>

                    </tbody>
                </table>

            <?php
            }


            ?>
        </div>

    </div>



</body>

</html>