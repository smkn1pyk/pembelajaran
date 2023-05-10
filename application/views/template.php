<!DOCTYPE html>
<html>
<head>
	<title>SMKN 1 PAYAKUMBUH</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="text/css" href="https://dapodik.smkn1payakumbuh.sch.id/assets/img/logo.jpg">
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
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
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('app/kurikulum') ?>"><i class="fa fa-list"></i> Kurikulum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('app/pembelajaran') ?>"><i class="fa fa-list"></i> Pembelajaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('app/pembagian_tugas') ?>"><i class="fa fa-list"></i> Pembagian Tugas <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
    <form>
      <?php
      $semester_id = $this->db->query("SELECT DISTINCT(semester_id) from getsekolah order by semester_id desc")->result();
      ?>
      <select class="form-control" name="semester_id" hx-get="<?= base_url('app') ?>" hx-target="#data">
        <option value="">Tahun Ajaran</option>
        <?php foreach ($semester_id as $key => $value): ?>
          <?php
          if($this->input->get('semester_id')){
            if($value->semester_id==$this->input->get('semester_id')){
              ?> <option value="<?= $value->semester_id ?>" selected><?= $value->semester_id ?></option> <?php
            }else{
              ?> <option value="<?= $value->semester_id ?>"><?= $value->semester_id ?></option> <?php
            }
          }else{
           if($value->semester_id==$this->session->userdata('semester_id')){
            ?> <option value="<?= $value->semester_id ?>" selected><?= $value->semester_id ?></option> <?php
          }else{
           ?> <option value="<?= $value->semester_id ?>"><?= $value->semester_id ?></option> <?php
         }
       }
       ?>
     <?php endforeach ?>
   </select>
 </form>
</nav>
<div class="container text-center jumbotron mb-1 p-2" style="margin-top: 80px;">
  <h3>SMK NEGERI 1 PAYAKUMBUH</h3><h4><?= $this->session->userdata('semester_id'); ?></h4>
</div>

<div class="container bg-light pt-3 rounded pb-2">
  <div id="data" hx-get="<?= $page ?>" hx-target="#data" hx-trigger="load"></div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>