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
    <select name="product_name">
	<option > Select.....</option>
  <?php
  include"include/connnect.php";
  
  $sel= "select * from new_article_bigstock order by prod_name";
  $run_sel=mysqli_query($con,$sel);
  while($row=mysqli_fetch_array($run_sel)){
	 $name=$row['prod_name']; 
	 $sto=$row['quantity'];
echo"<option value='$name'>$name</option>";	 
  }
 
  
  
  ?>
   </select>
  </td></tr>
  
  <tr><td> <b>Quantity</b> </td><td> <input type="number" name="qty" step="any" ></td></tr>
  <tr><td> <b>Ikiranguzo</b>  </td><td> <input type="number" name="org_price" step="any" autocomplete="off"required></td></tr>
 
  
  
  <tr align="center"><td colspan="3"> <input type="submit" name="update"  value="INJIZA"  style="width:100px;
	 height:35px; border:0;	 border-radius:5px;	 -webkit-border-radius:5px;	-o-border-radius:5px;	-moz-border-radius:5px;
	background-color:blue;		font-weight:bolder; color:white;" ></td></tr>
  </table>
   
  </fieldset>
</form>
<?php
$quantity=0;
if(isset($_POST['update'])){
	$pro_name=$_POST['product_name'];
	$entree=$_POST['qty'];
	$org_price=$_POST['org_price'];
	$date=date("Y-m-d");
	
		
		
		
	//------------------- to insert into table ya raport yibyaranguwe------------------------------------
	$insert="update new_article_bigstock set quantity= quantity+'$entree',original_price='$org_price' where prod_name='$pro_name'";
	 $run_insert=mysqli_query($con,$insert);


     // -----------------here goes rapport yibyinjijwe muri stock nini--------------------------------

     //$insert_big_sto="insert into big_stock_report(Prod_name,) 
    // values('$pro_name',,'$org_price')";
	//$run_big_sto=mysqli_query($con,$insert_big_sto);

	$insert_big_sto="insert into big_stock_report(Prod_name,date,quantity_stock,org_price) 
    values('$pro_name','$date','$entree','$org_price')"; 
$run_big_sto=mysqli_query($con,$insert_big_sto);
	
	if($run_big_sto){
		echo"<script>alert('MUrakoze kwinjiza'+'    $pro_name'+'   $entree')</script>";
		echo"<script>window.open('index.php?view_sto','_self')</script>";
	}
	else{
		echo"<script>alert('Try Again')</script>";
		echo"<script>window.open('index.php?update_sto','_self')</script>";
	}
	

		
	
	
	
}
?>

</body>
</html>