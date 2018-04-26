<html>
<head>
<title>Update product</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

</head>
<body bgcolor="skyblue">
<form action="" method="post" enctype="multipart/form-data">

  <fieldset style="width:400px; height:auto; background-color:white;align:center; color:blue;
  margin-left:200px; margin-top:50px; font-family:COMIC SANS MS;"><legend>Hitamo igicuruzwa ushaka gusohora muri stock nini </legend>
  <table style="font-family:COMIC SANS MS;color:blue;">
  <tr><td><b>Product Name</b></td><td>
    <select name="product_name">
	<option > Select.....</option>
  <?php
  include"include/connnect.php";
  $sel= "select * from new_article_bigstock order by Prod_name";
  $run_sel=mysqli_query($con,$sel);
  while($row=mysqli_fetch_array($run_sel)){
	 $name=$row['prod_name']; 
echo"<option value='$name'>$name</option>";	 
  }
 
  
  
  ?>
   </select>
  </td></tr>
  
  <tr><td> <b>Quantity</b> </td><td> <input type="number" name="qty" step="any" ></td></tr>
  
 
  
  
  <tr align="center"><td colspan="3"> <input type="submit" name="update"  value="EMEZA"  style="width:100px;
	 height:35px; border:0;	 border-radius:5px;	 -webkit-border-radius:5px;	-o-border-radius:5px;	-moz-border-radius:5px;
	background-color:blue;		font-weight:bolder; color:white;" ></td></tr>
  </table>
   
  </fieldset>
</form>
<?php
$quantity=0;
if(isset($_POST['update'])){
	$pro_name=$_POST['product_name'];
	$sortee=$_POST['qty'];
	$date=date("Y-m-d");
	$cashier=$_SESSION['user'];
	$sel="select * from new_article_bigstock where prod_name='$pro_name' ";
	$run_select=mysqli_query($con,$sel);
	
	while($row_pro= mysqli_fetch_array($run_select)){
		$id=$row_pro['id'];
		$quantity=$row_pro['quantity']-$sortee;
		//$price=$row_pro['selling_price'];
		$o_price=$row_pro['original_price'];
		$total_qty=0;
				
		$total_qty=$total_qty+$sortee;
		// ayarangujwe kuri new stock
		//$ayarangujwe=$total_qty*$o_price;
		//$azavamo=$total_qty*$price;		
		//$inyungu=$azavamo-$ayarangujwe;
		// ayarangujwe kuri admin purchase  
		$ayatanzwe=$o_price*$sortee;
		
		
		
		
	//------------------- update table ya article after yo gusohora ibintu------------------------------------
		if($quantity<=0){

echo"<script>alert('Quantity mufite muri stock ntabwo zihagije')</script>";

		}
		else{
			$upd_art="update new_article_bigstock set quantity='$quantity' where prod_name='$pro_name'";
	 $run_insert=mysqli_query($con,$upd_art);

     // nabikoze nshaka gushira ibintu muri stock nshyashya kugirango admin age abireba neza mugihe abishaka-----------
    $upd_art1="update new_stock set quantiy=quantiy+'$sortee',original_price='$o_price' where prod_name='$pro_name'";
	 $run_insert1=mysqli_query($con,$upd_art1);

	 // uburyo hazajya hakorwa raporo yibyavuye muri stock

	 $insert_small_sto="insert into stock_comm(prod_name,date,ibisohotse,ibisigayemo,original_price,umukozi) values('$pro_name','$date','$sortee','$quantity','$o_price','$cashier')";

	 $run_insert_small_sto=mysqli_query($con,$insert_small_sto);

	 //uburyo hazajya haboneka rapport yibintu byinjiye binyunze muri movement d'entree

	 $insertt="insert into admin_purchase(prod_name,date,status,ibyinjiye,org_price,total_purchase)
	values('$pro_name','$date','MVENTREE','$sortee','$o_price','$ayatanzwe')";
	 $run_insertt=mysqli_query($con,$insertt);
	

	if($run_insert1){
		echo"<script>alert('MUrakoze Gusohora '+'    $pro_name'+'   $sortee'+'  muri stock')</script>";
		echo"<script>window.open('index.php?view_sto','_self')</script>";
	}
	else{
		echo"<script>alert('Try Again')</script>";
		echo"<script>window.open('index.php?mvt_article','_self')</script>";
	}
		}
	
	

	}
	
	
	
	
	
	
	
	
	
}
?>

</body>
</html>