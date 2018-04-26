<?php
include"include/connnect.php";
if(isset($_GET['delete_sell'])){
$del_id=$_GET['delete_sell'];
$que="delete from user_saling where id='$del_id'";
$run_que=mysqli_query($con,$que);
if($run_que){
	echo "<script>alert('A poduct  has been deleted!')</script>";
		echo "<script>window.open('index.php?view_sell','_self')</script>";
}
}


?>