<?php 
include 'dbConnect.php';
session_start();

if(isset($_POST['reAprove_update']))
{
	$staff_id =$_POST['staff_id'];
	if(isset($_POST['app_adv_amt_up']))
	{
		$app_adv_amt =$_POST['app_adv_amt_up'];
	}
	
	$update1 = "Update tbl_advance SET app_adv_amt='".$app_adv_amt."' WHERE staff_id='".$staff_id."'";
	if($con->query($update1))
	{
	 $_SESSION['approve']='Approved Amount Updated Successfully';
		header('location:new_request.php');
		//$_SESSION['approve']='Amount Successfully Approved ';
	}
}


?>