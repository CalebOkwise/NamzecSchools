<?php 
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
?>

<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="We ddevelop creative software, eye catching software. We also train to become a creative thinker">
<meta name="author" content="OPTIMUM LINKUP COMPUTERS">
<link rel="icon"  sizes="16x16" href="<?php echo base_url() ?>uploads/logo.png">
        <title><?php echo $system_title;?></title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>optimum/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>optimum/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>optimum/css/colors/megna.css" id="theme"  rel="stylesheet">
<link href="<?php echo base_url();?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<style>
@media (max-width: 767px) {
  html, body { min-height: 100%; background: #fff; }
  #wrapper.login-register {
    position: relative;
    min-height: 100vh;
    height: auto;
    padding: 0px;
    /*padding: 39vh 20px 24px;*/
    background:
      linear-gradient(to bottom, rgba(255,255,255,.08), #fff 50%),
      url('<?php echo base_url(); ?>optimum/plugins/images/login-register.jpg')
      center top / auto 46vh no-repeat !important;
  }
  .login-box.login-sidebar {
    position: relative;
    right: auto;
    width: 100%;
    height: auto;
    margin: 0;
  }
  .login-box > br { display: none; }
  .login-box .white-box {
    position: relative;
    width: 100%;
    max-width: 730px;
    min-height: 61vh;
    margin: 0 auto;
    padding: 104px 24px 42px;
    border-radius: 30px 30px 18px 18px;
    box-shadow: 0 -8px 26px rgba(0,0,0,.08);
  }
  .login-logo {
    position: absolute;
    top: 40px;
    left: 50%;
    width: 150px;
    height: 150px;
    object-fit: contain;
    transform: translateX(-50%);
  }
  .login-brand { margin: 0; color: #064d36; font-size: 24px; font-weight: 700; text-align: center; padding-top: 50px;}
  .login-brand a { color: inherit; }
  .login-subtitle { margin: 9px 0 48px; color: #555; font-size: 17px; text-align: center; }
  .login-welcome { display: flex; align-items: center; gap: 18px; margin-bottom: 32px; }
  .login-welcome-icon, .secure-icon, .promo-icon { display: inline-flex; align-items: center; justify-content: center; flex: 0 0 auto; color: #075d40; }
  .login-welcome-icon { width: 70px; height: 70px; border-radius: 50%; background: #f3faf3; font-size: 25px; }
  .login-welcome h2 { margin: 0 0 7px; color: #222; font-size: 23px; }
  .login-welcome p { margin: 0; color: #666; font-size: 16px; line-height: 1.4; }
  #loginform .form-group { margin-bottom: 18px; }
  #loginform .form-control { width: 100%; height: 58px; padding: 0 18px; border: 1px solid #d5ddd8; border-radius: 15px; font-size: 16px; box-shadow: none; }
  .password-field { position: relative; }
  .password-field .form-control { padding-right: 52px; }
  .password-toggle { position: absolute; top: 50%; right: 17px; padding: 6px; border: 0; color: #707070; background: transparent; transform: translateY(-50%); }
  .login-options { display: flex; align-items: center; justify-content: space-between; margin: 13px 0 39px; font-size: 14px; }
  .login-options label { margin: 0; font-weight: 400; }
  .login-options a { color: #176b4b !important; font-weight: 600; }
  .login-submit { width: 100%; height: 58px; border: 0; border-radius: 30px; color: #fff; background: #087849; font-size: 18px; font-weight: 700; box-shadow: 0 6px 13px rgba(0,90,50,.2); }
  .secure-access { display: flex; align-items: center; gap: 14px; margin: 51px 0 34px; color: #666; font-size: 16px; text-align: center; }
  .secure-access::before, .secure-access::after { height: 1px; flex: 1; content: ''; background: #ddd; }
  .promo-card { display: flex; align-items: center; gap: 17px; padding: 25px 20px; border: 1px solid #e3f0e5; border-radius: 22px; background: #f5fbf5; }
  .promo-icon { width: 66px; height: 66px; border-radius: 50%; color: #fff; background: #075d40; font-size: 25px; }
  .promo-card h3 { margin: 0 0 8px; color: #19543b; font-size: 20px; }
  .promo-card p { margin: 0; color: #555; font-size: 15px; line-height: 1.5; }
  #recoverform { padding-top: 20px; }
}
</style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	
	
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
	 <h4 class="box-title m-b-20" align="center">
          <img class="login-logo" src="<?php echo base_url() ?>uploads/logo.png" width="70" height="70" alt="School logo"/></h4>
          <h1 class="login-brand"><a href=""><?php echo $system_name;?></a></h1>
          <p class="login-subtitle">School Management System</p>
          <div class="login-welcome">
            <span class="login-welcome-icon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
            <div><h2>Welcome Back!</h2><p>Sign in to continue to your dashboard</p></div>
          </div>
					
	<form method="post" role="form" id="loginform" class="form-horizontal form-material" action="<?php echo base_url();?>login/validate_login">

       <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required="" placeholder="<?php echo get_phrase('email');?>" style="width:100%">
                        </div>
                    </div>
                    <div class="form-group password-field">
                        <div class="col-xs-12" >
                            <input class="form-control" type="password" name="password" required="" placeholder="<?php echo get_phrase('passord');?>" style="width:100%">
          							<button type="button" class="password-toggle" aria-label="Show password"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                        </div>
                    </div>
					
        <div class="form-group login-options">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> <?php echo get_phrase('remember_me');?> </label>

            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><?php echo get_phrase('forgot_password?');?></a> </div>
        </div>
       <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
		
		  
<button class="login-submit btn btn-info btn-rounded btn-sm btn-block text-uppercase waves-effect waves-light" type="submit" style="width:100%; color:white">
<?php echo get_phrase('log_in');?>
</button>
                    <div align="center"><img id="install_progress" src="<?php echo base_url() ?>assets/images/preloader.gif" style="margin-left: 20px; display: none"/></div>

                        </div>
                    </div>
                 <?php echo form_close();?>
          <div class="secure-access"><span>Secure Access</span><span class="secure-icon"><i class="fa fa-shield" aria-hidden="true"></i></span></div>
         <div class="promo-card"><span class="promo-icon"><i class="fa fa-shield" aria-hidden="true"></i></span><div><h3>Our School, Smarter</h3><p>Students, staff, academics and more — all in one place.</p></div></div> 
        			
            	<form method="post" role="form" id="recoverform" class="form-horizontal form-material"  action="<?php echo base_url();?>login/reset_password">
                <input type="email" name="email" class="form-control" placeholder="<?php echo get_phrase('email');?>" style="width:100%" required>

<div class="form-group text-center m-t-20">
                        <div class="col-xs-6">
		<a href="<?php echo base_url();?>"><button class="btn btn-info btn-rounded btn-sm text-uppercase" type="button" style="color:white"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back_to_login');?></button></a>
		<button class="btn btn-success btn-rounded btn-sm  text-uppercase" type="submit" style="color:white"><i class="fa fa-key"></i>&nbsp;<?php echo get_phrase('reset_password');?></button>
                        </div>
                    </div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <?php echo form_close();?>
            </div>
        </div>
	
    </section>
<script src="js/index.js"></script>	


<!-- jQuery -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>


<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>optimum/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>optimum/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>optimum/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/js/jquery.toast.js"></script>

<script>
$(function() {
  $('.password-toggle').on('click', function() {
    var passwordInput = $('input[name="password"]');
    var isPassword = passwordInput.attr('type') === 'password';

    passwordInput.attr('type', isPassword ? 'text' : 'password');
    $(this).attr('aria-label', isPassword ? 'Hide password' : 'Show password');
    $(this).find('i').toggleClass('fa-eye-slash fa-eye');
  });
});
</script>

<?php if (($this->session->flashdata('error_message')) !=''):?>
<script type="text/javascript">
$(document).ready(function(){
  $.toast({
    heading: 'Error Message',
    text: '<?php echo $this->session->flashdata('error_message');?>',
    position: 'top-right',
    loaderBg: '#ff6849',
    icon:'warning',
    hideAfter: '3500',
    stack: 6

  });

});


</script>



<?php endif;?>




</body>

</html>
