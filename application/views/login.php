<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - SPK Prioritas Perbaikan</title>
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.png');?>">
    <!-- library css -->
    <link href="<?php echo base_url('dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/datepicker3.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/styles.css');?>" rel="stylesheet">
    <!-- library javascript-->
    <script src="<?php echo base_url('node_modules/sweetalert/dist/sweetalert.min.js');?>"></script>
    <script src="<?php echo base_url('dist/js/jquery-1.11.1.min.js');?>"></script>
    <script src="<?php echo base_url('dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('dist/jquery-validate/jquery.validate.min.js');?>"></script>
    <style>
        body {
            background-image: url(<?php echo base_url('dist/img/rsud-kajen.jpg');?>);
	}
    </style>
</head>
<body>
    <div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
		<div class="panel-heading">Login Page</div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo base_url('auth/login');?>" method="post" id="form_login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" id="username" type="text" autofocus="">
				</div>
				<div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
				</div>
				   <input name="submit" type="submit" value="Login" class="btn btn-primary" />
                            </fieldset>
                        </form>
                    </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
    <?php if ($this->session->flashdata('error_message')): ?>
        <script>
            swal({
                title: "Gagal Login",
                text: "<?php echo $this->session->flashdata('error_message'); ?>",
                //timer: 1500,
                showConfirmButton: false,
                type: 'error'
            });
        </script>
    <?php endif; ?>
    <script>
        $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
        $(document).ready(function() {
            $('#form_login').validate({
               rules:{
                 username:{
                     required:true,
                     maxlength:30
                 },
                 password: {
                     required:true,
                     minlength:5
                 }
               },messages:{
                   username:{
                       required:'username harus diisi',
                       maxlength:'maksimal karakter username 30'
                   },
                   password: {
                       required:'password harus diisi',
                       minlength:'manimal karakter password 5'
                   }
               },highlight:function(elm){
                  $(elm).closest('.form-group').addClass('has-error');
               },unhighlight:function(elm){
                  $(elm).closest('.form-group').removeClass('has-error');
               }
            });
          });
    </script>
</body>
</html>
