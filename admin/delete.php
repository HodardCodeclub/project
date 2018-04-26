<?php
include"include/connnect.php";
if(isset($_GET['delete_pro'])){
$del_id=$_GET['delete_pro'];
$que="delete from new_stock where id='$del_id'";
$run_que=mysqli_query($con,$que);
if($run_que){
	echo "<script>alert('A poduct  has been deleted!')</script>";
		echo "<script>window.open('index.php?view_sto','_self')</script>";
}
else{
echo "<script>alert('A poduct  has not  been deleted!')</script>";
		echo "<script>window.open('index.php?view_sto','_self')</script>";
}	
}



?>