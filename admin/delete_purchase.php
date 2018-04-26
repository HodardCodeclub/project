<?php
include"include/connnect.php";
if(isset($_GET['delete_purchase'])){
$del_id=$_GET['delete_purchase'];
$que="delete from admin_purchase where id='$del_id'";
$run_que=mysqli_query($con,$que);
if($run_que){
	echo "<script>alert('A poduct  has been deleted!')</script>";
		echo "<script>window.open('index.php?view_purchase','_self')</script>";
}
}


?>