
<html>
<head>
<title>Update product</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

</head>
<body bgcolor="skyblue">
<form action="" method="post" enctype="multipart/form-data">

  <fieldset style="width:400px; height:auto; background-color:white;align:center; color:blue;
  margin-left:200px; margin-top:50px; font-family:COMIC SANS MS;"><legend>Injiza igicuruzwa Ushaka Kugurisha</legend>
  <table style="font-family:COMIC SANS MS;color:blue;">
  <tr><td><b>Product Name</b></td><td>
    <select name="product_name" required >
	<option value="">Select....</option>
  <?php
  include"include/connnect.php";
  $sel= "select *from new_stock order by prod_name";
  $run_sel=mysqli_query($con,$sel);
  while($row=mysqli_fetch_array($run_sel)){
	 $name=$row['prod_name']; 
echo"<h1>"."<option value='$name'>$name</option>"."</h1>";	 
  }
 
  
  
  ?>
   </select>
  </td></tr>
  
  <tr><td> <b>Quantity</b> </td><td> <input type="number" name="qty" id="qty" onkeyup="sum();" step="any" required ></td></tr>
 <tr><td> <b>igiciro/unit</b> </td><td> <input type="number" name="price"  id="price" onkeyup="sum();" step="any"required ></td></tr>

  <tr><td> <b>Total</b> </td><td> <input type="number" id="total" onkeyup="sum();" step="any"  required ></td></tr>
  <tr><td> <b>Payed </b> </td><td> <input type="number" step="any" name="amount" required ></td></tr>

<script>
	

		function sum() {
      var txtFirstNumberValue = document.getElementById('qty').value;
      var txtSecondNumberValue = document.getElementById('price').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
  }
</script>



    <tr><td> <b>Customer Name</b> </td><td> <input type="text" name="cname" required ></td></tr>

  <tr><td> <b>Telephone</b> </td><td> <input type="text" name="telephone" required autocomplete="off"></td></tr>
  <tr align="center"><td colspan="3"> <input type="submit" name="sell"  value="Gurisha"  style="width:100px;
	 height:35px; border:0;	 border-radius:5px;	 -webkit-border-radius:5px;	-o-border-radius:5px;	-moz-border-radius:5px;
	background-color:blue;		font-weight:bolder; color:white;" ></td></tr>
  </table>
   
  </fieldset>
</form>
<?php
$status=" ";
if(isset($_POST['sell'])){
	$pro_name=$_POST['product_name'];
	$quantity=$_POST['qty'];
	$sel_price=$_POST['price'];
	$date=date("Y-m-d");
	$cname=$_POST['cname'];
	$tel=$_POST['telephone'];
	$payed=$_POST['amount'];
	
	$sel="select * from new_stock where prod_name='$pro_name' ";
	$run_select=mysqli_query($con,$sel);
	
	while($row_pro= mysqli_fetch_array($run_select)){
		$id=$row_pro['id'];
		$price=$row_pro['selling_price'];
		$o_price=$row_pro['original_price'];
		$qty=$row_pro['quantiy'];
		
			$total_qty=$qty-$quantity;
		$ayarangujwe=$total_qty*$o_price;
		$azavamo=$total_qty * $price;
		$inyungu_t=$azavamo-$ayarangujwe;
		
	// amafaranga yibicuruzwa	
	$total_sell=$quantity*$sel_price;
	$balance=$total_sell-$payed;
	if($balance > 0 ){
     $status="IDENI";
	}
	else{
      $status=" ";
	}
	$total_org_price=$quantity*$o_price;
	$inyungu=$total_sell-($total_org_price+$balance);
	
	$cashier=$_SESSION['user'];
	if($total_qty<0){
		echo"<script>alert('Ntabicuruzwa Bihagije Mufitemo')</script>";
		echo"<script>window.open('index.php?sell_pro','_self')</script>";
	}
	else{
		
						$upd="update new_stock set quantiy='$total_qty' where id='$id' ";
						$run_upd=mysqli_query($con,$upd);
						
						
						
			$insert="insert into user_saling(prod_name,quantity,date,cname,cashier_name,sell_per_pro,first_payed,payed,total_payed,debt,org_price,ayarangujwe,inyungu,telephone,status) 
			values('$pro_name','$quantity','$date','$cname','$cashier','$sel_price','$payed','$payed','0','$balance','$o_price','$total_org_price','$inyungu','$tel','$status')";
			$run_insert=mysqli_query($con,$insert);
						
						if($run_insert){
							echo"<script>alert('Murakoze kugurisha'+'    $pro_name   '+' igicuruzwa hasigayemo qty  '+'$total_qty')</script>";
							echo"<script>window.open('index.php?view_report','_self')</script>";
						}
						else{
							echo"<script>alert('Try Again')</script>";
							echo"<script>window.open('index.php?sell_pro','_self')</script>";
	                        }
		


	                        
    
		
	}
	

	}
	
	
	
}
?>

</body>
</html>