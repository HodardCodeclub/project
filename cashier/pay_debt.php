<?php
include "include/connnect.php";
if(isset($_GET['pay_debt'])){
	$id=$_GET['pay_debt'];
		
$sel="select * from user_saling where id='$id'";
$run_sel=mysqli_query($con,$sel);

    $row_debt=mysqli_fetch_array($run_sel);
	$id=$row_debt['id'];
	$prod_name=$row_debt['prod_name'];
	$quantity=$row_debt['quantity'];
	$cashier_name=$row_debt['cashier_name'];
	$customer_name=$row_debt['cname'];
	$date=$row_debt['date'];
	$payed=$row_debt['payed'];
	$arimo=$row_debt['debt'];
	$ayarangujwe=$row_debt['ayarangujwe'];
	$telephone=$row_debt['telephone'];


 }


?>

<head>
<title></title>
</head>
<body bgcolor="skyblue">
<form action="" method="post" enctype="multipart/form-data">

  <fieldset style="width:400px; height:auto; background-color:white;align:center; color:blue;
  margin-left:200px; margin-top:50px; font-family:COMIC SANS MS;"><legend>ishyura Ideni</legend>
  <table style="font-family:COMIC SANS MS;color:blue;">
  
  
  
  <tr><td> <b>Customer Name</b> </td><td> <input type="text" name="sell_price"  value="<?php  echo $customer_name;  ?>"readonly></td></tr>
  
  
   <tr><td> <b>Enter Balance Payed </b>  </td><td> <input type="number" name="kuripa" step="any" required></td></tr>
   
   
  <tr align="center"><td colspan="3"> 
  <input type="submit" name="pay_debt"  value="ISHYURA"  style="width:100px;
	 height:35px; border:0;	 border-radius:5px;	 -webkit-border-radius:5px;	-o-border-radius:5px;	-moz-border-radius:5px;
	background-color:blue;		font-weight:bolder; color:white;" ></td></tr>
  </table>
   
  </fieldset>
</form>

</body>
</html>

<?php
$t_payed=0;
 if(isset($_POST['pay_debt'])){
	 $payed_balance=$_POST['kuripa'];
	 $date=date("Y-m-d");
	 
	 $ayo_yatanze=$payed+$payed_balance;
	 $asigayemo=$arimo-$payed_balance;
	 //$t_payed=$t_payed+$payed_balance;	
	 
	 //kuza kwishura ideni
	 $insert="insert into pay_debt(cust_name,cash_name,date,yishyuye,total_yishyuye,asigayemo)
	 values('$customer_name','$cashier_name','$date','$payed_balance','$ayo_yatanze','$asigayemo')";
	 $run_insert=mysqli_query($con,$insert);
	 $inyungu=$ayo_yatanze-$ayarangujwe;
	 //updating table of saling 
	 
	$upd="update user_saling set  payed='$ayo_yatanze',total_payed='$payed_balance',debt='$asigayemo',inyungu='$inyungu' where id='$id'";
	 $run_update=mysqli_query($con,$upd);
	 if($run_update){
		 echo"<script>alert('murakoze kwishyura ')</script>";
		 echo "<script>window.open('index.php?list_debtor','_self')</script>";
	 }
	 else{
		 echo"<script>alert('Ntabwo Bigenze Neza ')</script>";
		 echo "<script>window.open('index.php?pay_debt','_self')</script>";
	 }
 }


?>