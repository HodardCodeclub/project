<?php
include"include/connnect.php";

if(isset($_GET['edit_pro'])){
	$pro_id=$_GET['edit_pro'];
	$sel="select * from new_stock where id='$pro_id'";
	$run_sel=mysqli_query($con,$sel);
	
	while($row_pro=mysqli_fetch_array($run_sel)){
		$id=$row_pro['id'];
		
	$pro_name=$row_pro['prod_name'];
	$sell_price=$row_pro['selling_price'];
	$org_price=$row_pro['original_price'];
	$quantity=$row_pro['quantiy'];
	$min=$row_pro['min_qty'];
	}
	
}




?>
<html>
<head>
<title>Editing product</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
  tinymce.init({ selector:'textarea' });
  </script>
</head>
<body bgcolor="skyblue">
<form action="" method="post" enctype="multipart/form-data">

  <fieldset style="width:400px; height:auto; background-color:white;align:center; color:blue;
  margin-left:200px; margin-top:50px; font-family:COMIC SANS MS;"><legend>Hindura</legend>
  <table style="font-family:COMIC SANS MS;color:blue;">
  <tr><td><b>Product Name</b></td><td><input type="text" name="product_name" value="<?php echo $pro_name;  ?>"></td></tr>

  
  
  
  <tr><td> <b>Quantity</b> </td><td> <input type="text" name="qty" value="<?php echo $quantity;   ?>" required></td></tr>
  
  
  <tr><td> <b>Igicuruzo</b> </td><td> <input type="text" name="sell_price"  value="<?php  echo $sell_price;  ?>"required></td></tr>
  
  
   <tr><td> <b>Ikiranguzo</b>  </td><td> <input type="text" name="org_price" value="<?php  echo $org_price;  ?>" required></td></tr>
   <tr><td> <b>Minimum Quanity:</b>  </td><td> <input type="text" name="min" value="<?php  echo $min;  ?>" required></td></tr>
   
   
  <tr align="center"><td colspan="3"> 
  <input type="submit" name="update"  value="HINDURA"  style="width:100px;
	 height:35px; border:0;	 border-radius:5px;	 -webkit-border-radius:5px;	-o-border-radius:5px;	-moz-border-radius:5px;
	background-color:blue;		font-weight:bolder; color:white;" ></td></tr>
  </table>
   
  </fieldset>
</form>

</body>
</html>
<?php
if(isset($_POST['update'])){
	global $pro_id;
	
    $update_id= $pro_id;
	$update_name=$_POST['product_name'];

	$up_sell_price=$_POST['sell_price'];
	$up_org_price=$_POST['org_price'];
	$update_quantity=$_POST['qty'];
	$up_min_qty=$_POST['min'];
	
		
	$update= "update new_stock set prod_name='$update_name',selling_price='$up_sell_price',original_price='$up_org_price',quantiy='$update_quantity' ,min_qty='$up_min_qty' where id='$update_id'";
	
	$run_update=mysqli_query($con,$update);
	
	if($run_update){
		echo"<script>alert('Guhindura Byagenze neza')</script>";
		echo"<script>window.open('index.php?view_sto','_self')</script>";
	}
	else{
		echo"<script>alert('Data Has not Been Updated Successfully')</script>";
		echo"<script>window.open('index.php?edit_pro','_self')</script>";
	}

	
	
	
}


?>