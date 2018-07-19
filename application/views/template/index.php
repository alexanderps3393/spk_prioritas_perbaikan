<!doctype html>
<html lang="en">
  <head>
  	<title>SPK Prioritas Pemeliharaan</title>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  	<!-- VENDOR CSS -->
  	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>">
  	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css');?>">
  	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/linearicons/style.css');?>">
  	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/chartist/css/chartist-custom.css');?>">
        <link href="<?php echo base_url('assets/vendor/jquery-ui.css');?>" rel="stylesheet">
  	<!-- MAIN CSS -->
  	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
  	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  	<link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css');?>">
  	<!-- GOOGLE FONTS -->
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  	<!-- ICONS -->
  	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png');?>">
  	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.png');?>">
        <!-- Javascript -->
    <script src="<?php echo base_url('node_modules/sweetalert/dist/sweetalert.min.js');?>"></script>
  	<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
  	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
  	<script src="<?php echo base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
  	<script src="<?php echo base_url('assets/scripts/klorofil-common.js');?>"></script>
        <script src="<?php echo base_url('assets/vendor/jquery-ui.js')?>"></script>
        <script src="<?php echo base_url('dist/jquery-validate/jquery.validate.min.js');?>"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $('#tgl').datepicker({dateFormat: 'yy-mm-dd'});
              setTimeout(function(){
                $(".pesan").fadeIn("slow");
              },500);
              setTimeout(function(){
                $(".pesan").fadeOut("slow");
              },1000);
          });
        </script>
  </head>
  <body>
	  <!-- WRAPPER -->
	  <div id="wrapper">
      <!-- NAVBAR -->

      <nav class="navbar navbar-default navbar-fixed-top">
        
		   
		    <div class="container-fluid">
          <div class="nav navbar-nav navbar-left" style="margin-left: 300px">
            <h2>~ SPK Prioritas Pemeliharaan ~</h2>
          </div>
          
          <div class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('auth/'.$this->uri->segment(1).'_logout');?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
          </div>
		    </div>
      </nav>
      <!-- END NAVBAR -->
      <!-- LEFT SIDEBAR -->

      <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
          <?php if($this->uri->segment(1)=='admin'){?>
          <nav>
            <ul class="nav">
              <li>
                <a href="<?php echo base_url('admin/home');?>" class="active"><i class="lnr lnr-home"></i><span>Dashboard</span></a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/periode');?>" class=""><i class="lnr lnr-code"></i> <span>Data Periode</span></a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/kriteria');?>" class=""><i class="lnr lnr-cog"></i> <span>Data Kriteria</span></a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/indikator');?>" class=""><i class="lnr lnr-chart-bars"></i><span>Data Indikator</span></a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/rusak');?>" class=""><i class="lnr lnr-alarm"></i> <span>Data Kerusakan</span></a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/nilai');?>" class=""><i class="lnr lnr-alarm"></i> <span>Data Penilaian</span></a>
              </li>
              <li>
                <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i><span>Analisa</span> <i class="icon-submenu lnr lnr-chevron-left"></i>
                </a>
                <div id="subPages" class="collapse ">
                  <ul class="nav">
                    <li><a href="<?php echo base_url('admin/analisa');?>" class="">Analisa SAW</a></li>
                    <li><a href="<?php echo base_url('admin/rusak/cetak');?>" class="">Laporan Data Kerusakan</a></li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="<?php echo base_url('admin/home/help');?>" class=""><i class="lnr lnr-cog"></i> <span>Help</span></a>
              </li>
            </ul>
          </nav>
        <?php }else if($this->uri->segment(1)=='ka_instalasi'){?>
            <nav>
              <ul class="nav">
                <li>
                  <a href="<?php echo base_url('ka_instalasi/home');?>" class="active"><i class="lnr lnr-home"></i><span>Dashboard</span></a>
                </li>
                <li>
                  <a href="<?php echo base_url('ka_instalasi/user');?>" class=""><i class="lnr lnr-alarm"></i> <span>Data Admin</span></a>
                </li>
                <li>
                  <a href="<?php echo base_url('ka_instalasi/laporan');?>" class=""><i class="lnr lnr-alarm"></i> <span>Laporan Kerusakan</span></a>
                </li>
                <li>
                  <a href="<?php echo base_url('ka_instalasi/home/help');?>" class=""><i class="lnr lnr-cog"></i> <span>Help</span></a>
                </li>
              </ul>
            </nav>
          <?php } ?>
	      </div>
      </div>
      <!-- END LEFT SIDEBAR -->


      <!-- CONTENT -->
      <div class="main">
        <div class="main-content">
          <div class="container-fluid">
             <?php echo $template;?>
          </div>
        </div>
      </div>
      <!-- END CONTENT -->
      <div class="clearfix"></div>
        <footer>
          <div class="container-fluid">
            <p class="copyright">SPK Prioritas Perbaikan -  <i class="fa fa-love"></i>
            <a href="http://rsud_kajen.com">RSUD Kajen</a>
            </p>
          </div>
        </footer>
      </div>
	    <!-- END WRAPPER -->
      <script>
            $('.delete_lead').on("click", function (e) {
              e.preventDefault();
              var url = $ (this).attr('href');
              swal({
                title      : "Are you sure?",
                text       : "Once deleted, you will not be able to recover this Lead !",
                icon       : "warning",
                buttons    : true,
                dangerMode : true
              })
              .then((willDelete) => {
                if (willDelete) {
                  swal("Success! Your Lead has been deleted!", {
                    icon: "success"
                  });
                  setTimeout(
                    function(){
                      window.location.replace(url);
                    }, 1500);
                } else {
                    swal("Your Lead is safe!");
                }
              });
            });
          </script>
          <?php if ($this->session->flashdata('success_message')): ?>
          <script>
            swal({
              title             : "Good Job",
              text              : "<?php echo $this->session->flashdata('success_message'); ?>",
              icon              : "success",
              showConfirmButton : false,
              type              : 'success'
            });
          </script>
          <?php endif; ?>
          <?php if ($this->session->flashdata('error_message')): ?>
          <script>
            swal({
              title             : "Oopss.. not good!!",
              text              : "<?php echo $this->session->flashdata('error_message'); ?>",
              icon              : "error",
              showConfirmButton : false,
              type              : 'error'
            });
    </script>
    <?php endif; ?>
  </body>
</html>
