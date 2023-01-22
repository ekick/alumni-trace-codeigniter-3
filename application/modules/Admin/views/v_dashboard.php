    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
            <!-- page heading -->
            <?= $this->session->flashdata('message'); ?>
            <!-- Content Row -->
    <div class="row right">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-5 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Alumni</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $jumlah; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-5 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-1">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-md font-weight-bold text-info text-uppercase mb-1">Import Data Alumni
                                </div>
                                <?php if(!empty($this->session->flashdata('status'))){ ?>
                                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
                                <?php } ?>
                                <div class="col">
                                    <form method="post" action="<?= base_url('import'); ?>" enctype="multipart/form-data">
                                            <label for="file">Pilih file excel</label>
                                            <input type="file" name="fileExcel"/>
                                        <div class="mt-2 float-right">
                                            <button type="submit" name="submit_file" value="Submit" class="btn btn-success btn-icon-split">
                                                <span class=" icon text-white-50"><i class="fas fa-file-excel"></i></span>
                                                <span class="text">Import</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Presentase Alumni</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pb-2 ">
                        <canvas id="myPieChart">
                        </canvas>
                    </div>

                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text " style="color:#000000"></i> RPL
                        </span>

                        <span class="mr-2">
                            <i class="fas fa-circle text" style="color: #46CEAD;"></i> TKJ
                        </span>

                        <span class="mr-2">
                            <i class="fas fa-circle text" style="color:#AC92EA ;"></i> MM
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text" style="color: #EB87BF;"></i> PSPR
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text" style="color: #9ED36A;"></i> PSPT
                        </span>



                    </div>



                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text" style="color: #FECD57;"></i> BDP
                        </span>

                        <span class="mr-2">
                            <i class="fas fa-circle text" style="color: #FB6D51;"></i> UPW
                        </span>

                        <span class="mr-2">
                            <i class="fas fa-circle text" style="color: #EC5564;"></i> APL
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text" style="color: #E5E8EC;"></i> OTKP
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text" style="color: #646C77;"></i> AKL
                        </span>

                    </div>

                </div>

            </div>
        </div>

        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kegiatan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>


                </div>
            </div>

        </div>

    </div>
            <!-- Content Row -->

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/chart-bar-demo.js"></script>

<script src="<?= base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

<!-- //Data Jurusan -->

<script>
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["RPL", "TKJ", "MM", "PSPR", "PSPT", "BDP", "UPW", "APL", "OTKP", "AKL"],
            datasets: [{
                data: [<?php echo $jurusan['RPL']; ?>,
                    <?php echo $jurusan['TKJ']; ?>,
                    <?php echo $jurusan['MM']; ?>,
                    <?php echo $jurusan['PSPR']; ?>,
                    <?php echo $jurusan['PSPT']; ?>,
                    <?php echo $jurusan['BDP']; ?>,
                    <?php echo $jurusan['UPW']; ?>,
                    <?php echo $jurusan['APL']; ?>,
                    <?php echo $jurusan['OTKP']; ?>,
                    <?php echo $jurusan['AKL']; ?>
                ],
                backgroundColor: ['#000000', '#46CEAD', '#AC92EA', '#EB87BF', '#9ED36A', '#FECD57', '#FB6D51', '#EC5564', '#E5E8EC', '#646C77'],
                hoverBackgroundColor: [''],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>


<!-- Data Kegiatan -->

<script>
    // Bar Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myAreaChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Bekerja', 'Kuliah', 'Wirausaha', 'Belum Bekerja/Kuliah'],
            datasets: [{
                label: "Jumlah",
                backgroundColor: 'rgb(23, 125, 255)',
                borderColor: 'rgb(23, 125, 255)',
                data: ['<?php echo $kegiatan['Bekerja']; ?>',
                    '<?php echo $kegiatan['Kuliah']; ?>',
                    '<?php echo $kegiatan['Wirausaha']; ?>',
                    '<?php echo $kegiatan['Option']; ?>'
                ],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        }
    });
</script>