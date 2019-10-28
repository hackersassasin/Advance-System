<?php
include 'dbConnect.php';
session_start();

if(isset($_POST['submit'])){
 $branch_id = $_POST['branch_id'];
 $designation_id = $_POST['designation_id'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$password = md5($_POST['password']);


if($_FILES['file_name']['name']!='')
{
	$target_dir = "profile_upload/";
	$target_file = $target_dir . basename($_FILES["file_name"]["name"]);
	$image = move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file);
	
	// print_r($image);die;
}


$email_check = "SELECT * FROM tbl_staff WHERE email='".$email."'";
$result = $con->query($email_check);
$count = mysqli_num_rows($result);
if($count==1)
{
	echo '<script>alert("Email Id Already exist")</script>';
}else
{

$sql = "INSERT INTO tbl_staff(branch_id,designation_id,f_name,l_name,email,password,file_name)value('$branch_id','$designation_id','$f_name','$l_name','$email','$password','$file_name')";

if($con->query($sql))
{
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	$select = "SELECT * FROM tbl_staff WHERE email='".$email."' AND password='".$password."'";
	
	$result = $con->query($select);
	$record = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	if($record==0)
	{
		$_SESSION['error'] = "Invalid Credentials";
	}else
	{
		$adv_ltd = "SELECT advance_limit FROM tbl_designation WHERE designation_id='".$row['designation_id']."'";
		$res= $con->query($adv_ltd);
		$advrow= mysqli_fetch_array($res);
		$insert_staff_record = "INSERT INTO tbl_advance(staff_id,ttl_adv_lmt)value('".$row['staff_id']."','".$advrow['advance_limit']."')";
		$record=$con->query($insert_staff_record);
		$_SESSION['staff_id'] = $row['staff_id'];
		$_SESSION['f_name'] = $row['f_name'];
		$_SESSION['l_name'] = $row['l_name'];
		$_SESSION['email'] = $row['email'];
		header('location:staff_dashboard.php');
	}
	
}
else{
	echo "Error while insertion";
    }
	
}

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Staff | SignUp</title>
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
    <a href="index2.html"><b>Staff</b>SignUp</a>
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

    <form id="staff_register" action="" method="post" enctype="multipart/form-data">
		<div class="form-group has-feedback">
			
			  <select class="form-control" required name="branch_id" id="branch_id">
			  <option value="">--Select Branch--</option>
			    <?php $branch = "SELECT * FROM tbl_branch";
					$result = $con->query($branch);
					$records = mysqli_num_rows($result);
					while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				?>
				<option value="<?php echo $data['branch_id'];?>"><?php echo $data['branch_name'];?></option>
				<?php } ?>
			  </select>
      </div>
	  <div class="form-group has-feedback">
			
			  <select class="form-control" required name="designation_id" id="designation_id">
			  <option value="">--Select Designation--</option>
				<?php $branch = "SELECT * FROM tbl_designation";
					$result = $con->query($branch);
					$records = mysqli_num_rows($result);
					while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				?>
				<option value="<?php echo $data['designation_id'];?>"><?php echo $data['designation_name'];?></option>
					<?php } ?>
			  </select>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" id="f_name" name="f_name" required value="<?php if(isset($_POST['f_name'])){ echo $_POST['f_name']; }  ?>" class="form-control" placeholder="First Name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" id="l_name" name="l_name" required value="<?php if(isset($_POST['l_name'])){ echo $_POST['l_name']; }  ?>" class="form-control" placeholder="Last Name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" required name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; }  ?>" id="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" required name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; }  ?>" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="password" class="form-control" required name="cpassword" value="<?php if(isset($_POST['cpassword'])){ echo $_POST['cpassword']; }  ?> id="cpassword" placeholder="Confirm Password">
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

    <a href="staff_login.php" class="text-center">Already Register? SignIn</a>

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
