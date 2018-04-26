<html>
<head>
<title>Update product</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

</head>
<body bgcolor="skyblue">
<form action="" method="post" enctype="multipart/form-data">

  <fieldset style="width:400px; height:auto; background-color:white;align:center; color:blue;
  margin-left:200px; margin-top:50px; font-family:COMIC SANS MS;"><legend>Injiza Ibicuruzwa Waranguye</legend>
  <table style="font-family:COMIC SANS MS;color:blue;">
  <tr><td><b>Product Name</b></td><td>
    <select name="product_name" required="">
	<option > Select.....</option>
  <?php
  include"include/connnect.php";
  $sel= "select *from new_stock order by prod_name";
  $run_sel=mysqli_query($con,$sel);
  while($row=mysqli_fetch_array($run_sel)){
	 $name=$row['prod_name']; 
echo"<option value='$name'>$name</option>";	 
  }
 
  
  
  ?>
   </select>
  </td></tr>
  
  <tr><td> <b>Quantity</b> </td><td> <input type="number" name="qty" step="any" required=""></td></tr>
   <tr><td> <b>Ayo Waranguje</b> </td><td> <input type="number" name="org_price" step="any" required=""></td></tr>
 
  
  
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
	$ayaranguweho=$_POST['org_price'];
	$date=date("Y-m-d");
	$sel="select * from new_stock where prod_name='$pro_name' ";
	$run_select=mysqli_query($con,$sel);
	
	while($row_pro= mysqli_fetch_array($run_select)){
		$id=$row_pro['id'];
		//$price=$row_pro['selling_price'];
		$o_price=$row_pro['original_price'];
		$qty=$row_pro['quantiy'];
				
		$total_qty=$quantity+$qty;
		// ayarangujwe kuri new stock
		$ayarangujwe=$quantity*$ayaranguweho;
		//$total_ayara=$ayarangujwe+$row_pro['ayarangujwe'];
		//$azavamo=$total_qty*$price;		
		//$inyungu=$azavamo-$total_ayara;
		// ayarangujwe kuri admin purchase  
		$ayatanzwe=$quantity*$ayaranguweho;		
	    //$azabonwa=$quantity*$price;
		
		
		
	//------------------- to insert into table ya raport yibyaranguwe------------------------------------
	$insert="insert into admin_purchase(prod_name,date,status,ibyinjiye,org_price,total_purchase)
	values('$pro_name','$date','LIVRAISON','$quantity','$ayaranguweho','$ayatanzwe')";
	 $run_insert=mysqli_query($con,$insert);
	
	
	$upd="update new_stock set quantiy='$total_qty',original_price='$ayaranguweho' where id='$id' ";
	$run_upd=mysqli_query($con,$upd);
	if($run_upd){
		echo"<script>alert('Byagenze neza')</script>";
		echo"<script>window.open('index.php?view_sto','_self')</script>";
	}
	else{
		echo"<script>alert('Try Again')</script>";
		echo"<script>window.open('index.php?update_sto','_self')</script>";
	}
	

	}
	
	
	
	
	
	
	
	
	
}
?>

</body>
</html>