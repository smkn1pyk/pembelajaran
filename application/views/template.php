<!DOCTYPE html>
<html>
<head>
	<title>SMKN 1 PAYAKUMBUH</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="text/css" href="https://sisfo.smkn1payakumbuh.sch.id/assets/images/logo1.png">
  <style type="text/css">
    .bg-donker{
     background: #7db9e8; /* Old browsers */
     background: -moz-linear-gradient(top,  #7db9e8 0%, #2989d8 0%, #2989d8 33%, #207cca 44%, #1e5799 91%); /* FF3.6-15 */
     background: -webkit-linear-gradient(top,  #7db9e8 0%,#2989d8 0%,#2989d8 33%,#207cca 44%,#1e5799 91%); /* Chrome10-25,Safari5.1-6 */
     background: linear-gradient(to bottom,  #7db9e8 0%,#2989d8 0%,#2989d8 33%,#207cca 44%,#1e5799 91%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
     filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7db9e8', endColorstr='#1e5799',GradientType=0 ); /* IE6-9 */
   }
 </style>
</head>
<body class="">
  <nav class="navbar navbar-expand-lg navbar-dark bg-donker fixed-top border-bottom">
    <a class="navbar-brand" href="<?= base_url() ?>"><i class='fa fa-google-wallet'></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php 
    if($cekThnAjr) { 
      ?>
      <div>
        <form method="GET" class="form-inline">
          <div class="input-group">
            <select name="thn_ajr" class="form-control">
              <?php

              foreach ($cekThnAjr as $key => $value) {
                $thn = substr($value->thn_ajr, 0,4); 
                $semester = substr($value->thn_ajr, 4);
                if($semester=='1'){
                  $semester = 'Ganjil';
                }else{
                  $semester = 'Genap';
                }
                if($value->thn_ajr==$this->session->userdata('thn_ajr')){
                  echo "<option value='$value->thn_ajr' selected>$thn $semester</option>";
                }else{
                  echo "<option value='$value->thn_ajr'>$thn $semester</option>";
                }
              }
              ?>
            </select>
          </div>
          <div class="input-group">
            <button class="btn btn-light ml-2"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>
    <?php } ?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('welcome/kompetensi') ?>"><i class="fa fa-list"></i> Kompetensi Keahlian</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('welcome/halaman2') ?>"><i class="fa fa-list"></i> Pembelajaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('welcome/halaman1') ?>"><i class="fa fa-list"></i> Pembagian Tugas <span class="sr-only">(current)</span></a>
        </li>
        <?php
        if($this->session->userdata('nama')){ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard') ?>"><i class='fa fa-user'></i> <?= $this->session->userdata('nama') ?> </a>
          </li> 
        <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth') ?>"><i class='fa fa-sign-in'></i> Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <div class="container text-center jumbotron mb-1 p-2" style="margin-top: 80px;">
    <h3>SMK NEGERI 1 PAYAKUMBUH</h3><h4><?= $this->session->userdata('thn_ajr'); ?></h4>
    
  </div>
  <div class="container bg-light pt-3 rounded pb-2">
    <?php
    $this->load->view('pages/'.$page);
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>