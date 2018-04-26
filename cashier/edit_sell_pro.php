<?php
include"include/connnect.php";
if(isset($_GET['edit_pro'])){
	$id= $_GET['edit_pro'];
	$select="select * from user_saling where id='$id'";
	$run_select= mysqli_query($con,$select);
	
	while($row_sell=mysqli_fetch_array($run_select)){
		$sell_id=$row_sell['id'];
		$sell_prod_name=$row_sell['prod_name'];
		$sell_quantity=$row_sell['quantity'];
		$sell_date=$row_sell['date'];		
		$sell_expense=$row_sell['expenses'];
		$customer_name=$row_sell['cname'];
		$sell_total=$row_sell['total'];
	}
	
}

?>