<h1 class="h3 mb-0 text-gray-800">Selamat Datang <!-- <?php echo $this->session->userdata('nama') ?> -->!</h1>
<!-- content -->
<div class="container rounded bg-white mt-5 mb-5">
	<div style="text-align: center;">
		<!-- <h3 style="padding-top: 20px;">Alumni SMK Negeri 1 Gorontalo</h3> -->
		<br>
			<div class="col-xl-3 col-md-6 mb-4">
	            <div class="card border-left-primary shadow h-100 py-2">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
	                        <div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
	                            <?php echo $user['nama'] ?></div>
	                            <div class="h5 mb-0 font-weight-bold text-gray-800">Angkatan <?php echo $user['tahun_angkatan'] ?></div>
	                        </div>
	                        <div class="col-auto">
	                            <i class="fa fa-address-book fa-2x text-gray-300"></i>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    <br>
	</div>
</div>
<!-- content -->