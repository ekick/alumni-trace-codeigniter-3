<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.4.2.min.js"></script>
  <style>
  #tampilan {
    margin: 0 auto;
    padding: 20px;
    background:#f0f0f0;
    width: 100%;
  }

  #bekerja #wirausaha #kuliah #belum {
    margin-left: 20px;
  }
</style>
<script>
  $(document).ready(function(){
          $("#bekerja").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
          $("#wirausaha").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
          $("#kuliah").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
          $("#belum").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
          $(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
          if ($("input[name='optionsRadios']:checked").val() == "bekerja" ) { //Jika radio button "option1" dipilih maka tampilkan form-inputan
          $("#bekerja").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
          $("#wirausaha").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          $("#kuliah").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          $("#belum").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          } else if ($("input[name='optionsRadios']:checked").val() == "wirausaha" ) { //Jika radio button "option1" dipilih maka tampilkan form-inputan
          $("#wirausaha").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
          $("#bekerja").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          $("#kuliah").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          $("#belum").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          }else if ($("input[name='optionsRadios']:checked").val() == "kuliah" ) { //Jika radio button "option1" dipilih maka tampilkan form-inputan
          $("#kuliah").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
          $("#bekerja").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          $("#wirausaha").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          $("#belum").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          }else if ($("input[name='optionsRadios']:checked").val() == "belum" ) { //Jika radio button "option1" dipilih maka tampilkan form-inputan
          $("#belum").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
          $("#bekerja").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          $("#kuliah").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
          $("#wirusaha").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
        }
      });
        });
      </script>
    </head>

    <body id="page-top">

      <h1 class="h3 mb-0 text-gray-800">Data Alumni</h1>
      <!-- Page Wrapper -->
      <div id="wrapper">
        <!-- content -->
        <div class="container rounded bg-white mt-5 mb-5">
          <nav class="navbar navbar-light" style="background-color: #e3f2fd; margin-top: 15px;">
            <h5><i class="fas fa-info-circle"></i>
            Isilah data sesuai dengan identitas alumni</h5>
          </nav>

          <br>

          <form action="<?php echo base_url('simpan') ?>" method="post">
            <div class="form-group">
              <label>Nama Lengkap :</label>
              <input type="text" class="form-control" placeholder="" name="nama" value="<?php echo $user['nama'] ?>" disabled>
            </div>
            <div class="form-group">
              <label>Tahun Lulus :</label>
              <input type="text" class="form-control" placeholder="" name="tahun_lulus" value="<?php echo $user['tahun_angkatan'] ?>" disabled>
            </div>
            <div class="form-group">
              <label>Alamat :</label>
              <input type="text" class="form-control" placeholder="" name="alamat" value="<?php echo $user['alamat'] ?>">
            </div>
            <div class="form-group">
              <label>Telepon/HP :</label>
              <input type="text" class="form-control" placeholder="" name="no_hp" value="<?php echo $user['no_hp'] ?>">
            </div>
            <div class="form-group">
              <label>Kegiatan Setelah Lulus :</label>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="bekerja" class="detail">
                  Bekerja
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="wirausaha" class="detail">
                  Wirausaha
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios3" value="kuliah" class="detail">
                  Kuliah
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios4" value="belum" class="detail">
                  Belum Bekerja/Kuliah
                </label>
              </div><br>
              <hr>
              <div>
                <div id="bekerja">
                  <h3>Bekerja</h3>
                  <p>Nama Perusahaan/Industri/Lembaga :<br>
                    <input type="text" class="form-control" name="namaperusahaan">
                  </p>
                  <p>Alamat Perusahaan/Industri/Lembaga :<br>
                    <input type="text" class="form-control" name="alamatperusahaan">
                  </p>
                  <p>Sektor Perusahaan/Industri/Lembaga :<br>
                    <input type="text" class="form-control" name="sektor">
                  </p>
                  <p>Jabatan dalam pekerjaan :<br>
                    <input type="text" class="form-control" name="jabatan">
                  </p>
                </div>

                <div id="wirausaha">
                  <h3>Wirausaha</h3>
                  <p>Nama Usaha :<br>
                    <input type="text" class="form-control" name="namausaha">
                  </p>
                  <p>Alamat Usaha :<br>
                    <input type="text" class="form-control" name="alamatusaha">
                  </p>
                  <p>Bidang Usaha :<br>
                    <input type="text" class="form-control" name="bidang">
                  </p>
                  <p>Bulan dan Tahun Membuka Usaha :<br>
                    <input type="text" class="form-control" name="bulanusaha">
                  </p>
                </div>

                <div id="kuliah">
                  <h3>Kuliah</h3>
                  <p>Nama Perguruan Tinggi / Universitas :<br>
                    <input type="text" class="form-control" name="namauniv">
                  </p>
                  <p>Fakultas :<br>
                    <input type="text" class="form-control" name="fakultas">
                  </p>
                  <p>Jurusan / Prodi :<br>
                    <input type="text" class="form-control" name="jurusanuniv">
                  </p>
                </div>

                <div id="belum">
                  <h3>Belum Bekerja/Kuliah</h3>
                  <p>Kegiatan yang dilakukan sekarang :<br>
                    <p>
                      <input type="radio" name="belum" id="" value="mencari pekerjaan"> Mencari Pekerjaan :<br>
                    </p>
                    <p>
                      <input type="radio" name="belum" id="" value="mencari perguruan tinggi"> Mencari Perguruan Tinggi :<br>
                    </p>
                    <p><input type="radio" name="belum" id="" value="lainnya"> Lainnya :
                      <input type="text" class="form-control" name="lainnyatext">
                    </p>
                  </div>
                </div>
                <br>
                <input type="submit" name="" value="Simpan" class="btn btn-success">
              </form>

            </div>
            <!-- content -->
          </div>
          <!-- Page Wrapper -->
        </body>
