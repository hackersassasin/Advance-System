<?php
include 'dbConnect.php';

if(isset($_POST['submit']))
{
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$file_name = $_POST['file_name'];

$sql = "INSERT INTO tbl_principal(f_name,l_name,email,password,file_name)value('$f_name','$l_name','$email','$password','$file_name')";

if($con->query($sql))
	echo "record inserted successfully";
}else{
	echo "Error while insertion";
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Principal | SignUp</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Principal</b>SignUp</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
	
	<style>
		.authError{
			color:red;
			font-size:11px;
		}
	</style>

    <form id="staff_register" action="" method="post">
		
	  <div class="form-group has-feedback">
        <input type="text" id="f_name" name="f_name" class="form-control" placeholder="First Name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" id="l_name" name="l_name" class="form-control" placeholder="Last Name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
		<label>Profile Pic (Optional	)</label>
        <input type="file" name="file_name" id="file_name" >
        
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    
	

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script src="dist/js/jquery.validate.min.js"></script>
<script>
$('#staff_register').validate({

		debug: false,
	    errorClass: "authError",
rules: {
		f_name: "required",
		l_name: "required",
		//file_name: "required",
		
		email: {
					required: true,
					email: true
				},
		password: {
					required: true,
					minlength: 5
				},
		cpassword: {
						required: true,
						equalTo: "#password"
					}
		},
messages: {
				f_name: "Please Enter First name",
				l_name: "Please Enter Last name ",
				//file_name: "Please upload Profile picture ",
				
				email: {
					required: "Please enter your email",
					email: "Please enter valid email address"
				},
				password: {
					required: "Please enter your password",
					minlength: "Your password must be at least 5 characters long"
				},
				cpassword: {
					required: "Please enter your Confirm password",
					//cpassword: "Password Doesn't Match with password"
				}
			},
			highlight: function(element, errorClass) {
	        $(element).removeClass(errorClass);
	    }			
});

</script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
