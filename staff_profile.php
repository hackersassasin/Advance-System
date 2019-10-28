<?php 
include 'dbConnect.php';
session_start();

if(empty($_SESSION['email']))
{
	header('location:staff_login.php');
}



$f_name = $_SESSION['f_name'];
$l_name = $_SESSION['l_name'];
$email = $_SESSION['email'];

	if(isset($_POST['update']))
	{
		$branch_id = $_POST['branch_id'];
		$designation_id = $_POST['designation_id'];
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$email = $_POST['email'];
		$file_name = $_POST['file_name'];
		
	$sql = "UPDATE tbl_staff SET branch_id='$branch_id', designation_id='$designation_id', f_name='$f_name' ,l_name='$l_name' ,email='$email' ,file_name='$file_name' ";
	
	if($con->query($sql))
	{
		$_SESSION['success']='Profile updated Successfully';
	}
	else{
			echo "Error while updation";
		} 

	}
	
	
	//code for change password
	if(isset($_POST['change']))
	{
		$old_pass = md5($_POST['password']);
		$new_pass = md5($_POST['new_password']);
		
		$check_pass = "SELECT * FROM tbl_staff WHERE email='".$email."' AND password='".$old_pass."'";
		
		$result = $con->query($check_pass);
		$record = mysqli_num_rows($result);
		
		if($record==1)
		{
			$sql = "UPDATE tbl_staff SET password='".$new_pass."'";
	
			if($con->query($sql))
			{
				echo "<script>alert('Password change Successfully')</script>";
			}
			else{
					echo "Error while updation";
				} 
		}else{
			echo "<script>alert('Password Does Not match with Old Password')</script>";
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Staff | Profile</title>
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
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="dist/css/bootstrap-toggle.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Staff</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Staff | Profile</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ucfirst($f_name); echo '&nbsp'; echo ucfirst($l_name);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo ucfirst($f_name); echo '&nbsp'; echo ucfirst($l_name);?>
                  
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="admin_logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($f_name); echo '&nbsp'; echo ucfirst($l_name);?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		<li class="">
          <a href="staff_dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
   <section class="content">
      <div class="row">
		<div class="col-md-8 col-md-offset-2">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b>My Profile</b></h3>
			  
			  <button data-toggle="modal" data-target="#passModal" class="btn btn-default pull-right">Change Password</button>
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:green"><?php if(isset($_SESSION['success'])){ echo $_SESSION['success']; unset($_SESSION['success']); } ?></span>
			<?php $userDetail = "Select * from tbl_staff where staff_id='".$_SESSION['staff_id']."'";
					$result = $con->query($userDetail);
					$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			?>
            <form method="post" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name:</label>
                  <input type="text" class="form-control" name="f_name" value="<?php  echo $row['f_name']; ?>" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Last Name:</label>
                  <input type="text" class="form-control" name="l_name" value="<?php  echo $row['l_name']; ?>"  placeholder="Password">
                </div>
				<div class="form-group">
				<label>Branch:</label>
				<select class="form-control" name="branch_id" id="branch_id">
			  <option value="">--Select Branch--</option>
				<?php $branch = "SELECT * FROM tbl_branch";
					$result = $con->query($branch);
					$records = mysqli_num_rows($result);
					
					while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						
				?>
				<option value="<?php echo $data['branch_id'];?>" <?php if($data['branch_id']==$row['branch_id']){ echo 'selected'; }?>><?php echo $data['branch_name'];?></option>
				<?php } ?>
			  </select>
			  </div>
				<div class="form-group">
				<label>Designation:</label>
				<select class="form-control" name="designation_id" id="designation_id">
			  <option value="">--Select Designation--</option>
				<?php $branch = "SELECT * FROM tbl_designation";
					$result = $con->query($branch);
					$records = mysqli_num_rows($result);
					
					while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						print_r($data);
				?>
				<option value="<?php echo $data['designation_id'];?>" <?php if($data['designation_id']==$row['designation_id']){ echo 'selected'; }?>><?php echo $data['designation_name'];?></option>
				<?php } ?>
			  </select>
			  </div>
			   <div class="form-group">
				<label>Email:</label>
				<input type="text" class="form-control" name="email" value="<?php  echo $row['email']; ?>" id="email" placeholder="Email" >
				
			  </div>
			  
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file_name" id="exampleInputFile">

                  
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" id="update" class="btn btn-primary" >Update</button>
			</div>
           </form>
		  
          </div>
          <!-- /.box -->
	

		
         
        </div>
        <!--/.col (left) -->
	  
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">JIT NASHIK</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- Trigger the modal with a button -->





<!--Change Password Modal -->
		<div id="passModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Change Password</h4>
			  </div>
			  <div class="modal-body">
			 <form class="form-horizontal" method="post" role="form">
			 <div class="form-group">
				<label class="control-label col-sm-2">Old Password:</label>
				<div class="col-sm-10">
					<input type="password"  name="password" id="password" class="form-control" placeholder="Enter new password">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">New Password:</label>
				<div class="col-sm-10">
					<input type="password"  name="new_password" id="new_password" class="form-control" placeholder="Enter new password">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Confirm Password:</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Re-enter password">
				</div>
			</div>
		
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" name="change" class="btn btn-default">Reset</button>
			</div>
		  </div>
		</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>

<!-- ./wrapper -->
<script src="dist/js/jquery.validate.min.js"></script>
<script>
$('#login').validate({

	debug: false,
	    errorClass: "authError",
rules: {
		branch_name: "required",
		designation_name: "required",
		email: {
					required: true,
					email: true
				},
		password: {
					required: true,
					minlength: 5
				}
		
		},
messages: {
				email: {
					required: "Please enter your email",
					email: "Please enter valid email address"
				},
				password: {
					required: "Please enter your password",
					minlength: "Your password must be at least 5 characters long"
				}
			},
			highlight: function(element, errorClass) {
	        $(element).removeClass(errorClass);
	    }			
});

</script>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
