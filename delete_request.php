<?php 
include 'dbConnect.php';
session_start();

$id=$_GET['id'];
$staff_id=$_GET['staff_id'];


	 $update1 = "Update tbl_advance SET deleted_at='1' WHERE staff_id='".$staff_id."' AND req_id='".$id."'";
	 if($con->query($update1))
	{
	  $_SESSION['approve']='Request Deleted Successfully';
		 header('location:new_request.php');
	
	}



?>