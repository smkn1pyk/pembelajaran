
<!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>SMKN 1 Payakumbuh</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="icon" type="text/css" href="https://sisfo.smkn1payakumbuh.sch.id/assets/images/logo1.png">
        <style type="text/css" media="screen">
            .bg-donker{
                background: #7db9e8; /* Old browsers */
                background: -moz-linear-gradient(top,  #7db9e8 0%, #2989d8 0%, #2989d8 33%, #207cca 44%, #1e5799 91%); /* FF3.6-15 */
                background: -webkit-linear-gradient(top,  #7db9e8 0%,#2989d8 0%,#2989d8 33%,#207cca 44%,#1e5799 91%); /* Chrome10-25,Safari5.1-6 */
                background: linear-gradient(to bottom,  #7db9e8 0%,#2989d8 0%,#2989d8 33%,#207cca 44%,#1e5799 91%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7db9e8', endColorstr='#1e5799',GradientType=0 ); /* IE6-9 */
            }
        </style>
    </head>
    <body data-base="<?= base_url() ?>">
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <div class="app-header header-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
<!-- <h4>
<i class="metismenu-icon pe-7s-albums"></i>SMKN1PYK
</h4> -->
<div class="header__pane ml-auto">
    <div>
        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
</div>
</div>
<div class="app-header__mobile-menu">
    <div>
        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
</div>
<div class="app-header__menu">
    <span>
        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
        </button>
    </span>
</div>    
<div class="app-header__content">
    <div class="app-header-left"></div>
    <div class="app-header-right">
        <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                <img width="42" class="rounded-circle" src="https://cdn3.iconfinder.com/data/icons/vector-icons-6/96/256-512.png" alt="">
                                <i class="fa fa-angle-down ml-2 opacity-8"></i>
                            </a>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left  ml-3 header-user-info">
                        <div class="widget-heading">
                            <?= $this->session->userdata('nama'); ?>
                        </div>
                        <div class="widget-subheading">
                            <?php
                            if($this->session->userdata('hak_akses')==1){
                                echo "Guru Matpel";
                            }else
                            if($this->session->userdata('hak_akses')==2){
                                echo "Administrator";
                            }else{
                                echo $this->session->userdata('hak_akses');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
</div>        

<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>    
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Dashboards</li>
                    <li>
                        <a href="<?= base_url('dashboard') ?>" class="mm-active">
                            <i class="metismenu-icon pe-7s-culture"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="app-sidebar__heading">UI Components</li>

                    <?php
                    if($this->session->userdata('hak_akses')==1){ 
                        if($this->session->userdata('Jenis_PTK')=='Guru Mapel'){
                            ?>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-calculator"></i>
                                    Kompetensi Dasar
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Penilaian
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url('penilaian/input_penilaian') ?>">
                                            <i class="metismenu-icon"></i>
                                            Input Penilaian
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('penilaian/kirim_penilaian') ?>">
                                            <i class="metismenu-icon"></i>
                                            Kirim Penilaian
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php 
                        }else
                        if($this->session->userdata('Jenis_PTK')=='Guru BK'){
                            ?>
                            <li>
                                <a href="<?= base_url('data_master/data_siswa') ?>">
                                    <i class="metismenu-icon pe-7s-calculator"></i>
                                    Data Siswa
                                </a>
                            </li>
                        <?php } } ?>
                        <?php if($this->session->userdata('hak_akses')==2){ ?>
                            <li>
                                <a href="<?= base_url('data_master/users') ?>">
                                    <i class="metismenu-icon pe-7s-calculator"></i>
                                    Data Users
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>    
        <div class="app-main__outer">
            <div class="app-main__inner mb-5">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-browser icon-gradient bg-mean-fruit">
                                </i>
                            </div>
                            <div>
                                <?= strtoupper($title) ?>
                                <div class="page-title-subheading"></div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="bg-light p-2 rounded shadow" id="data-content">
                    <?php
                    $this->load->view($this->session->userdata('folder').'/page/'.$page);
                    ?> 
                </div>
            </div>
<!-- <div class="app-wrapper-footer">
<div class="app-footer">
<div class="app-footer__inner">
<div class="app-footer-left">
<ul class="nav">
<li class="nav-item">
<a href="javascript:void(0);" class="nav-link">
Footer Link 1
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0);" class="nav-link">
Footer Link 2
</a>
</li>
</ul>
</div>
<div class="app-footer-right">
<ul class="nav">
<li class="nav-item">
<a href="javascript:void(0);" class="nav-link">
Footer Link 3
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0);" class="nav-link">
<div class="badge badge-success mr-1 ml-0">
<small>NEW</small>
</div>
Footer Link 4
</a>
</li>
</ul>
</div>
</div>
</div>
</div>  -->   
</div>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="text-transform: uppercase;"><i class="fa fa-wpforms"></i> <span class="modal-title"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div id="ket-modal"></div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script></body>
<script type="text/javascript">
    var qualifyURL = function(pathOrURL) {
        if (!(new RegExp('^(http(s)?[:]//)','i')).test(pathOrURL)) {
            return $(document.body).data('base') + pathOrURL;
        }
        return pathOrURL;
    };

    var user = <?= $this->session->userdata('hak_akses') ?>;

    if(user=='1'){
        var user_akses = 'guru';
    }else
    if(user=='2'){
        var user_akses = 'admin';
    }

    $('#data-content').on('click', '.buka-modal', function(){
        var id = $(this).attr('id');
        var link = $(this).attr('data-id');
        $('.modal-body').load(qualifyURL(user_akses+'_form'),{page:id,data:link});
        $('.modal-dialog').addClass('modal-lg');
        $('.modal-title').html(id.replace("_", " "));
        $('.modal').modal('show');
    });

    $('#data-content').on('submit', '#form', function(e){
        e.preventDefault();
        var id = event.target.id;
        console.log(id);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", qualifyURL(user_akses+'_form/post'), true);
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                $('.modal-title').html(id.replace("_", " "));
                $('.modal').modal('show');
                $('.modal-body').html(xhr.responseText);
            }
        }
        var formData = new FormData(this);
        xhr.send(formData);
    });

    $('.modal').on('submit', 'form', function(e){
        $('.modal-footer').text('Mohon Tunggu');
        e.preventDefault();
        var id = event.target.id;
        console.log(id);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", qualifyURL(user_akses+'_form/post'), true);
        xhr.onreadystatechange = function() {
            if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                $('#ket-modal').html(xhr.responseText);
                setTimeout(function(){ $('#ket-modal').html(''); }, 3000);
                if(xhr.responseText=="<div class='alert alert-success'>Sukses</div>"){
                    setTimeout(function(){ $('.modal').modal('hide'); location.reload();}, 1000);
                }
            }
        }
        var formData = new FormData(this);
        xhr.send(formData);
    });
</script>
</html>
