<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIRUSUN</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicons
    ================================================== -->
  <link rel="shortcut icon" href="<?= base_url('assets/assets-page/'); ?>img/jpt.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?= base_url('assets/assets-page/'); ?>img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets/assets-page/'); ?>img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets/assets-page/'); ?>img/apple-touch-icon-114x114.png">

  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets-page/'); ?>css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets-page/'); ?>fonts/font-awesome/css/font-awesome.css">

  <!-- Stylesheet
    ================================================== -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets-page/'); ?>css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
  <!-- Navigation
    ==========================================-->
  <nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="#beranda" class="page-scroll">beranda</a></li>
          <li><a href="#Profil" class="page-scroll">Profil</a></li>
          <li><a href="#Tentang" class="page-scroll">Tentang</a></li>
          <li><a href="#kontak" class="page-scroll">Pendapatan</a></li>
          <li><a href="<?= base_url('auth'); ?>" class="page-scroll">Login</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
  </nav>
  <!-- Header -->
  <header id="header">
    <div class="intro">
      <div class="overlay">
        <div class="container">
          <div class="row">
            <div class="intro-text">
              <h1>RUMAH SUSUN JENEPONTO</h1>
              <p>DISPERKIMTAN KAB. JENEPONTO</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Features Section -->
  <div id="beranda" class="row">
    <div class="text-center beranda-item">
      <div class="container">
        <div class="section-title">
          <h2>BERANDA</h2>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <div class="features-item">
              <h3>Jumlah hunian</h3>
              <img src="<?= base_url('assets/assets-page/'); ?>img/rusun1.jpg" class="img-responsive" alt="">
              <p>Bangunan Rusun Jeneponto Memiliki Tiga Lantai Dengan Jumlah 99 Kamar dengan rincian....</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="features-item">
              <h3>Syarat dan tarif sewa bangunan</h3>
              <img src="<?= base_url('assets/assets-page/'); ?>img/ktp.jpg" class="img-responsive" alt="">
              <p>Syarat Wajib mengajukan sewa Bangunan Rusun adalah kepemilikan KTP serta mengisi dokumen yang telah disiapkan pengelola Rusun dan Tarif sewa Rusun
                bervariasi tiap lantai, Lantai 1 Rp 300.000/bulan. Lantai 2 Rp. 200.000/bulan. Lantai 3 Rp. 175.000/Bulan. LAntai 4 150.000/bulan lantai 5 125.000/perbulan </p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="features-item">
              <h3>Alamat</h3>
              <img src="<?= base_url('assets/assets-page/'); ?>img/rusun2.jpg" class="img-responsive" alt="">
              <p>Jl karya kelurahan binamu, Kecamatan Binamu, Kabupaten Jeneponto</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About Section -->
  <div id="Profil">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-6 about-img"> </div>
        <div class="col-xs-12 col-md-3 col-md-offset-1">
          <div class="about-text">
            <div class="section-title">
              <h2 class="text-center">Profil Disperkimtan</h2>
            </div>
            <p>program Rusunawa yang dilaksanakan oleh Dinas Perumahan dan pertanahan kabuten jeneponto mulai berjalan pada tahun ........</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Restaurant Menu Section -->
  <div id="Tentang">
    <div class="container">
      <div class="section-title text-center">
        <h2>rubrik</h2>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="menu-section">
            <h2 class="menu-section-title text-center">rubrik</h2>
            <div class="menu-item">
              <div class="menu-item-name">DISPERKIMTAN JENEPPONTO</div>
              <div class="menu-item-price"> </div>
              <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
            </div>
            <div class="menu-item">
              <div class="menu-item-name text-center">pojok rusun</div>
              <div class="menu-item-price"> DISPERKIMTAN JENEPONTO </div>
              <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
            </div>
            <!-- About Section -->
            <div class="menu-item">
              <div class="menu-item-name">Dasar Bantuan</div>
              <div class="menu-item-price"> 1 </div>
              <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
            </div>
            <div class="menu-item">
              <div class="menu-item-name">disperkimtan jeneponto</div>
              <div class="menu-item-price"> 2 </div>
              <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="menu-section">
            <h2 class="menu-section-title text-center"> form pendaftaran </h2>
            <div class="menu-item">
              <div class="menu-item-name">DINAS pERUMAHAN <a href="https://drive.google.com/file/d/1CzFdV5uuQMdDQag5T261TXuwq5cEXxMK/view?usp=sharing" target="_blank">download form pendaftaran</a></div>
              <div class="menu-item-price"> </div>
              <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
            </div>
            <div class="menu-item">
              <div class="menu-item-name">1</div>
              <div class="menu-item-price"> 3 </div>
              <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
            </div>
            <div class="menu-item">
              <div class="menu-item-name">2</div>
              <div class="menu-item-price"> 4 </div>
              <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
            </div>
            <div class="menu-item">
              <div class="menu-item-name">3</div>
              <div class="menu-item-price"> 5 </div>
              <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- About SectionS 
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title">Dinner</h2>
          <div class="menu-item">
            <div class="menu-item-name">Sesame-Ginger Beef</div>
            <div class="menu-item-price"> $15 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Crispy Fried Chicken</div>
            <div class="menu-item-price"> $17 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Mongolian Shrimp & Broccoli</div>
            <div class="menu-item-price"> $18 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam.. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Spicy Coconut Salmon</div>
            <div class="menu-item-price"> $20 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title">Desserts</h2>
          <div class="menu-item">
            <div class="menu-item-name">Chocolate Mud Cake</div>
            <div class="menu-item-price"> $11 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Bourbon-Pecan Tart</div>
            <div class="menu-item-price"> $14 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Texas Sheet Cake</div>
            <div class="menu-item-price"> $15 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name">Vanilla Cheesecake</div>
            <div class="menu-item-price"> $18 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
        </div>
      </div>
    </div> -->
      </div>
    </div>
    <!-- Gallery Section -->
    <div id="Login">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-6 col-md-4">
            <div class="gallery-item"> <img src="<?= base_url('assets/assets-page/'); ?>img/rusun1.jpg" class="img-responsive" alt=""></div>
          </div>
          <div class="col-xs-6 col-md-4">
            <div class="gallery-item"> <img src="<?= base_url('assets/assets-page/'); ?>img/rusun2.jpg" class="img-responsive" alt=""></div>
          </div>
          <div class="col-xs-6 col-md-4">
            <div class="gallery-item"> <img src="<?= base_url('assets/assets-page/'); ?>img/rusun3.jpg" class="img-responsive" alt=""></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Team Section
<div id="team">
  <div class="container">
    <div id="row">
      <div class="col-md-6">
        <div class="col-md-10 col-md-offset-1">
          <div class="section-title">
            <h2>Meet Our Chef</h2>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam commodo nibh.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="team-img"><img src="<?= base_url('assets/assets-page/'); ?>img/chef.jpg" alt="..."></div>
      </div>
    </div>
  </div>
</div> -->
    <!-- Contact Section -->
    <div id="kontak" class="text-center">
      <div class="container">
        <div class="section-title text-center">
          <h2>Pendapatan</h2>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-8 col-md-offset-2">

            <!-- <div class="col-md-4">
      <h3>penyewaan</h3>
      <div class="contact-item">
        <p>Hubungi</p>
        <p>+6285......</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Alamat Kantor</h3>
      <div class="contact-item">
        <p>jl Hasanuddin (ex Jl Pelita)</p>
        <p>Kelurahan Empoang, kecamtan Binamu</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Jam Kantor</h3>
      <div class="contact-item">
        <p>Senin - Jumat: 08:00 AM - 04:00 PM</p>
        <p></p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="section-title text-center">
      <h3>hubungi kami</h3>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-custom btn-lg">Kirim pesan</button>
      </form>
    </div> -->
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div id="footer">
      <div class="container text-center">
        <div class="col-md-6">
          <p>&copy; 2017 Gusto. All rights reserved. Design <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
        </div>
        <div class="col-md-6">
          <div class="social">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="<?= base_url('assets/assets-page/'); ?>js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/assets-page/'); ?>js/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/assets-page/'); ?>js/SmoothScroll.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/assets-page/'); ?>js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/assets-page/'); ?>js/contact_me.js"></script>
    <!-- chart -->
    <script src="<?= base_url('assets/assets-page/'); ?>js/dist/chart.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/assets-page/'); ?>js/main.js"></script>

</body>

</html>