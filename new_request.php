<?php 
include 'dbConnect.php';
session_start();

if(empty($_SESSION['email']))
{
	header('location:admin_login.php');
}



$f_name = $_SESSION['f_name'];
$l_name = $_SESSION['l_name'];
$email = $_SESSION['email'];

if(isset($_POST['app_adv_amt']))
{
	$staff_id = $_POST['staff_id'];
	$app_adv_amt = $_POST['app_adv_amt'];
	$ttl_adv_lmt = $_POST['ttl_adv_lmt'];
	$remaining = $ttl_adv_lmt-$app_adv_amt;
	$update = "Update tbl_advance SET app_adv_amt='".$app_adv_amt."', ttl_adv_lmt='".$remaining."' WHERE staff_id='".$staff_id."'";
	if($con->query($update))
	{
		echo '<script>alert("Amount Successfully Approved")</script>';
		//$_SESSION['approve']='Amount Successfully Approved ';
	}
	
}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
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
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
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
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
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
          <a href="admin_dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Advance Requests</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="new_request.php"><i class="fa fa-circle-o"></i> New Resquest</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Old Requests</a></li>
          </ul>
        </li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">New Requests</h3>
              <a href="export_data.php" class="btn btn-danger pull-right">Export .xls</a>
			  <br />
			  <p style="color:green"><?php if(isset($_SESSION['approve'])){  echo $_SESSION['approve']; unset($_SESSION['approve']); }  ?></p>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Branch</th>
                  <th>Designation</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Total Advance<br> Limit</th>
                  <th>Requests(Amt)</th>
				  <th>Approve Advance<br>(Amt)</th>
				  <th>Approve Status</th>
                  <th>Action</th>
                </tr>
                </thead>
				 <tbody>
				<?php 
					$users = "SELECT * FROM tbl_staff JOIN tbl_branch ON tbl_branch.branch_id=tbl_staff.branch_id JOIN tbl_designation ON tbl_designation.designation_id=tbl_staff.designation_id";
					$result = $con->query($users);
					//print_r($result);die;
					
					$records = mysqli_num_rows($result);
					
					
					$i = 1;
					while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						$sele= 'SELECT * FROM tbl_advance WHERE staff_id="'.$data['staff_id'].'"';
						$res = $con->query($sele);
						$row_adv = mysqli_fetch_array($res);
						if($row_adv['reqst_amt']!='' AND $row_adv['deleted_at']=='0')
					{
				?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $data['branch_name']; ?></td>
                  <td><?php echo $data['designation_name']; ?></td>
                  <td><?php echo $data['f_name']; ?></td>
                  <td><?php echo $data['l_name']; ?></td>
                  <td><?php echo $data['email']; ?></td>
                  <td><input type="text" name="ttl_adv_lmt" value="<?php echo $row_adv['ttl_adv_lmt'];?>" disabled placeholder="Total Advance Limit"></td>
                  <td><input type="text" name="reqst_amt" value="<?php echo $row_adv['reqst_amt'];?>" placeholder="Request Amt" disabled></td>
                  <td>
				  <form method="POST" >
				  <input type="hidden" name="staff_id" value="<?php echo $data['staff_id']; ?>">
				  <input type="hidden" name="ttl_adv_lmt" value="<?php echo $row_adv['ttl_adv_lmt']; ?>">
				  <input type="text" name="app_adv_amt" onchange="this.form.submit()" value="<?php echo $row_adv['app_adv_amt'];?>" <?php if($row_adv['app_adv_amt']!=''){ echo 'disabled'; }?> placeholder="Enter Amount">
				  </form>
				  </td>
                  <td>
				  <?php if($row_adv['app_adv_amt']==''){ ?>
				  <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" style="line-height:0.333333; important!">Request</button>
				  <?php }else{ ?>
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" style="line-height:0.333333; important!" >Approved</button>
				  <?php } ?>
				</div>
				  
				  </td>
                  <td><a href="#" data-toggle="tooltip" title="Edit User Detail" ><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#editModal<?php echo $i; ?>" ></i></i></a> | <a href="delete_request.php?id=<?php echo $row_adv['req_id']; ?>&staff_id=<?php echo $data['staff_id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
				
				<!-- Edit Modal -->
					<div id="editModal<?php echo $i; ?>" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Aproved Amt</h4>
						  </div>
						 <div class="modal-body">
						<form action="update_app_amt.php" method="post">
						<input type="hidden" name="staff_id" value="<?php echo $data['staff_id']; ?>">
						<input type="hidden" name="ttl_adv_lmt" value="<?php echo $row_adv['ttl_adv_lmt']; ?>">
							  <div class="form-group">
							  <label>Branch:</label>
								<input type="text" class="form-control" name="branch_name" value="<?php  echo $data['branch_name']; ?>"  disabled>
								
								<label>Name:</label>
								<input type="text" class="form-control" name="Name" value="<?php  echo $data['f_name']; echo $data['l_name']; ?>"  disabled>
							  
							   <label>Designation:</label>
								<input type="text" class="form-control" name="designation_name" value="<?php   echo $data['designation_name']; ?>"  disabled>
							  
							  
								<label>Total Advance Limit:</label>
								<input type="text" class="form-control" name="ttl_adv_lmt" value="<?php echo $row_adv['ttl_adv_lmt'];?>"  disabled>
							 
								<label>Request Amt:</label>
								<input type="text" class="form-control" name="reqst_amt" value="<?php echo $row_adv['reqst_amt'];?>" disabled>
							
								<label>Aproved Amt:</label>
								<input type="text" class="form-control" name="app_adv_amt_up" value="<?php echo $row_adv['app_adv_amt'];?>" placeholder="Enter Amt to Re-aprove">
							  </div>
							  <button type="submit" name="reAprove_update" id="reAprove_update" class="btn btn-primary">Re-aprove</button>
						</form>
					  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
						  </div>
						</div>

					  </div>
					  
					 
					</div>  
                
				</tr>
						
					<?php $i++;  } }?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- Trigger the modal with a button -->


<!--Branch Modal -->
<div id="branchModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Branch</h4>
      </div>
      <div class="modal-body">
     <form class="form-horizontal" method="post" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Branch Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Branch Name" required>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Submit</button>
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



<!--Designation Modal -->
<div id="designationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Designation</h4>
      </div>
      <div class="modal-body">
         <form method="post" class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Designation:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="designation_name" name="designation_name" placeholder="Enter Designation Name" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Advance Limit:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="advance_limit" name="advance_limit" placeholder="Advance Limit:" required>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="des_submit" class="btn btn-primary">Add</button>
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

$('#editModal').validate({
	debug: false,
	    errorClass: "authError",
		rules: {
				app_adv_amt:"required"
				},
				
	
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
