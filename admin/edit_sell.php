<html>
<head>
<title>Update product</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

</head>
<body bgcolor="skyblue">
<form action="" method="post" enctype="multipart/form-data">

  <fieldset style="width:400px; height:auto; background-color:white;align:center; color:blue;
  margin-left:200px; margin-top:50px; font-family:COMIC SANS MS;"><legend>Injiza igicuruzwa Gishya</legend>
  <table style="font-family:COMIC SANS MS;color:blue;">
  <tr><td><b>Product Name</b></td><td>
    <select name="product_name">
	<option > Select.....</option>
  <?php
  include"include/connnect.php";
  $sel= "select *from new_stock";
  $run_sel=mysqli_query($con,$sel);
  while($row=mysqli_fetch_array($run_sel)){
	 $name=$row['prod_name']; 
echo"<option value='$name'>$name</option>";	 
  }
 
  
  
  ?>
   </select>
  </td></tr>
  
  <tr><td> <b>Quantity</b> </td><td> <input type="text" name="qty" ></td></tr>
  <tr><td> <b>Date</b> </td><td> <input type="date" name="date" ></td></tr>
  <tr><td> <b>Customer Name</b> </td><td> <input type="text" name="cname" ></td></tr>
  <tr><td> <b>Expenses</b> </td><td> <input type="text" name="expense" ></td></tr>

  
  <tr align="center"><td colspan="3"> <input type="submit" name="update"  value="INJIZA"  style="width:100px;
	 height:35px; border:0;	 border-radius:5px;	 -webkit-border-radius:5px;	-o-border-radius:5px;	-moz-border-radius:5px;
	background-color:blue;		font-weight:bolder; color:white;" ></td></tr>
  </table>
   
  </fieldset>
</form>
<?php
if(isset($_POST['update'])){
	$pro_name=$_POST['product_name'];
	$quantity=$_POST['qty'];
	$date=$_POST['date'];
	$cname=$_POST['cname'];
	$selected_exp=$_POST['expense'];
	
	$sel="select * from new_stock where prod_name='$pro_name' ";
	$run_select=mysqli_query($con,$sel);
	
	while($row_pro= mysqli_fetch_array($run_select)){
		$id=$row_pro['id'];
		$price=$row_pro['selling_price'];
		$o_price=$row_pro['original_price'];
		$qty=$row_pro['quantiy'];
		$prof=$row_pro['profit'];
		$exp=$row_pro['expenses'];
		$total_exp=$selected_exp+$exp;
	
	$total_qty=$qty-$quantity;
	$profit=$total_qty*$o_price;
	$total=$total_qty * $price;
	$total_profit=$total-($profit+$total_exp);
	$upd="update new_stock set quantiy='$total_qty',total='$total',profit='$profit',total_profit='$total_profit' where id='$id' ";
	$run_upd=mysqli_query($con,$upd);
	
	$total_sell=($quantity*$price)-$selected_exp;
	
	$insert="insert into user_saling(prod_name,quantity,date,expenses,cname,total) 
	values('$pro_name','$quantity','$date','$selected_exp','$cname','$total_sell')
	";
	$run_insert=mysqli_query($con,$insert);
	if($run_insert){
		echo"<script>alert('Murakoze kugurisha igicuruzwa')</script>";
		echo"<script>window.open('index.php?sell_pro','_self')</script>";
	}
	else{
		echo"<script>alert('Try Again')</script>";
		echo"<script>window.open('index.php?sell_pro','_self')</script>";
	}
	

	}
	
	
	
	
	
	
	
	
	
}
?>

</body>
</html>