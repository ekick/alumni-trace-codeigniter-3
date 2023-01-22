<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alumni | SMKN 1 Gorontalo</title>
    <meta name="description" content="Free bootstrap template Atlas">
    <link rel="icon" href="img/favicon.png" sizes="32x32" type="image/png">
    <!-- custom.css -->
    <link rel="stylesheet" href="<?= base_url('assets');?>/css/custom.css">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="<?= base_url('assets');?>/css/bootstrap.min.css">
	<!-- font-awesome -->
    <link rel="stylesheet" href="<?= base_url('assets');?>/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <!-- AOS -->
    <link rel="stylesheet" href="<?= base_url('assets');?>/css/aos.css">
</head>

<body>
    <!-- banner -->
    <div class="jumbotron jumbotron-fluid" id="banner" style="background-image: url(<?= base_url('assets');?>/img/smea.jpg);">
        <div class="container text-center text-md-left">
            <header>
                <div class="row justify-content-between">
                    <div class="col-2">
                        <img src="<?= base_url('assets');?>/img/logosmk.png" alt="logo">
                    </div>
                </div>
            </header>
            <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="display-3 text-white font-weight-bold my-5">
            	Penelusuran Alumni<br>
            	SMK Negeri 1 Gorontalo
            </h1>
            <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="lead text-white my-4">
                Lembaga Pendidikan Dan Pelatihan Yang Dapat Menghasilkan Tamatan 
                <br> Yang Profesional Dan Mandiri
            </p>
            <a href="auth" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="btn my-4 font-weight-bold atlas-cta cta-green">Login</a>
        </div>
    </div>

	<!-- copyright -->
	<div class="jumbotron jumbotron-fluid" id="copyright">
        <div class="container">
            <div class="row justify-content-between">
            	<div class="col-md-6 text-white align-self-center text-center text-md-left my-2">
                    Copyright © 2021 SMKN 1 Gorontalo.
                </div>
                <div class="col-md-6 align-self-center text-center text-md-right my-2" id="social-media">
                    <a href="https://www.facebook.com/smekonegorontalo/" class="d-inline-block text-center ml-2">
                    	<i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="https://twitter.com/smk1gorontalo" class="d-inline-block text-center ml-2">
                    	<i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- AOS -->
    <script src="<?= base_url('assets');?>/js/aos.js"></script>
    <script>
      AOS.init({
      });
    </script>
</body>

</html>