    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>

            <div style="float: right; margin-left:5px; margin-bottom:10px;">
                <a href="<?php echo base_url('pdf'); ?>" class="btn btn-primary btn-icon-split">
                <span class=" icon text-white-50">
                    <i class="fas fa-file-pdf"></i>
                    </span>
                    <span class="text">PDF</span>
                </a>
                <a href="<?php echo base_url('Admin/html_to_excel'); ?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-excel"></i>
                    </span>
                    <span class="text">Excel</span>
                </a>
            </div>
        </div>

        <div class="card-body">
        <div class="table-responsive">
                <?php
                if ($dataopr != NULL) {
                ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                        <td><?php echo $row->no_hp ?></td>
                                        <td><?php
                                            if ($row->j_kelamin == 'L') {
                                                echo "Laki - laki";
                                            } else {
                                                echo "Perempuan";
                                            }
                                            ?></td>
                                        <td><?php echo $row->tahun_angkatan ?></td>
                                        <td><?php echo $row->nama_jurusan ?></td>
                                        <td><?php echo $row->nama_kegiatan ?></td>
                                <?php

                                }
                            }
                                ?>
                                <!-- <td>
                                <a href="#" class="btn btn-success" type="button" aria-haspopup="true" aria-expanded="false">
                                    Reset Password
                                </a>
                            </td> -->
                                    </tr>

                        </tbody>
                    </table>

                <?php }
                ?>
            </div>
        </div>
    </div>

     <!-- Page level plugins -->
     <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/demo/datatables-demo.js"></script>