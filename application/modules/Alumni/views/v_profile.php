	<h1 class="h3 mb-0 text-gray-800">Profile Anda</h1>
    <!-- Page Wrapper -->
    <div id="wrapper">
    	<!-- content -->
		<div class="container rounded bg-white mt-5 mb-5 text-center" style="padding-top: 25px; padding-bottom: 25px;">
		<?php if(!empty($this->session->flashdata('upload'))){
			echo $this->session->flashdata('upload');
		 } ?>
		   <?php echo form_open_multipart('ubah_foto'); ?>
		                <div style="background-color: #EDEDED; width: 100%; padding: 20px;">
		                	<div class="d-flex flex-column align-items-center">
								<img class="rounded-circle mt-30" src="<?php echo base_url('assets/foto/'.$user['foto']) ?>" style="padding-top: 20px; padding-bottom: 20px; padding-right: 40%; padding-left: 40%; width: 100%; border-radius: 50%; ">
								<label>Ubah Foto Profile :</label>
								<input type="file" name="foto" style="padding-top: 20px; padding-bottom: 20px; padding-right: 40%; padding-left: 40%; width: 100%; ">
							</div><br>
							<table class="table">
									<tr>
										<td>
											<div class="col-md-12">
						                    	<label class="labels">Nama Lengkap :</label>
						                    	<b><?php echo $user['nama'] ?></b>
						                    	<!-- <input type="text" class="form-control" value="" readonly> -->
						                    </div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="col-md-12">
						                    	<label class="labels">NIS :</label>
						                    	<b><?php echo $user['nis'] ?></b>
						                    	<!-- <input type="text" class="form-control" value="" readonly> -->
						                    </div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="col-md-12">
						                    	<label class="labels">Tahun Lulus :</label>
						                    	<b><?php echo $user['tahun_angkatan'] ?></b>
						                    	<!-- <input type="text" class="form-control" value="" readonly> -->
						                    </div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="col-md-12">
						                    	<label class="labels">No Handphone :</label>
						                    	<b><?php echo $user['no_hp'] ?></b>
						                    	<!-- <input type="text" class="form-control" value="" readonly> -->
						                    </div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="col-md-12">
						                    	<label class="labels">Alamat :</label>
						                    	<b><?php echo $user['alamat']?></b>
						                    	<!-- <input type="text" class="form-control" value="" readonly> -->
						                    </div>
										</td>
									</tr>
							</table>
							<hr>
							<input type="submit" name="" value="Simpan Perubahan" class="btn btn-success">
		                </div>
		   <?php echo form_close(); ?>
    	</div>
    	<!-- content -->
    </div>
    <!-- Page Wrapper -->