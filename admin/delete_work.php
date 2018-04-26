<?php
include "include/connnect.php";
if(isset($_GET['delete_work'])){
	$id=$_GET['delete_work'];
	$delete="delete from login_users where id='$id'";
	$run_delete=mysqli_query($con,$delete);
	
	if($run_delete){
		echo"<script>alert('A user Has been Deleted')</script>";
		echo "<script>window.open('index.php?view_work','_self')</script>";
	}
	else{
		echo"<script>alert('A user  Has not  been Deleted')</script>";
		echo "<script>window.open('delete_work.php','_self')</script>";
	}
	
}


?>