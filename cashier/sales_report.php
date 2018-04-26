<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover{background-color:#4CAF50}
</style>
</head>

<body >
<fieldset style="background-color:white;">
<legend>Ibiri Muri Stock</legend>
<form method="POST" action="">
<h2 style="text-align:center;font-family:COMIC SANS MS;color:blue;">Reba raporo yibyagurishijwe  byose</h2>
 
<p>
 <h3>Select Date</h3>
 <table>
 <tr style="hover{background-color:white}">
 <td>Starting date</td>
 <td>Closing Date</td>

 </tr>
 <tr>
 

  <td><input type="date" name="date"></td>
   <td> <input type="date" name="date3"></td>
    <td></td><td><input type="submit" name="save" value="submit" style="background:#0066A2;color:white;width:150px; border-radius:60px;height: 30px;"></td>
 </tr>
 </table>
  </P>

 </form>
<table border="1">
<tr style="font-family:COMIC SANS MS;color:blue;"><td>No</td>
<td>Prod Name</td><td>Quantity</td><td>Date</td><td>Customer Name</td><td>Yishyuye</td>
<td>Asigayemo</td><tr>
<?php
include"include/connnect.php";
if(isset($_POST['save'])){
$date2=$_POST['date'];	
$date3=$_POST['date3'];
$sel_dep="select * from depanse where date BETWEEN '$date2' AND '$date3'";
$run_sel_dep=mysqli_query($con,$sel_dep);
$total=0;
while($run_dep=mysqli_fetch_array($run_sel_dep)){
	$name=$run_dep['user'];
	$used_for=$run_dep['used_for'];
	$amount=$run_dep['amount'];
	$c_name=$run_dep['cashier'];
	
	
	$total=$total+$amount;
}
// this is for depense 

$sel_amadeni="select * from pay_debt where date BETWEEN '$date2' AND '$date3'";
$run_amadeni=mysqli_query($con,$sel_amadeni);
$total_yishyuwe=0;
$total_atishyuwe=0;
while($row_deni=mysqli_fetch_array($run_amadeni)){
	$yishyuye=$row_deni['yishyuye'];
	$asigaye=$row_deni['asigayemo'];
	$total_yishyuwe=$total_yishyuwe+$yishyuye;
	$total_atishyuwe=$total_atishyuwe+$asigaye;
}








$sel="select * from user_saling where  date BETWEEN '$date2' AND '$date3' ";

$run_sel=mysqli_query($con,$sel);

	$count=1;
	$total_payed=0;
	$total_balance=0;
 while($row_prod=mysqli_fetch_array($run_sel)){
	$id=$row_prod['id'];
	$name=$row_prod['prod_name'];
	$quantity=$row_prod['quantity'];
	$date=$row_prod['date'];
	$cname=$row_prod['cname'];
	$first_payed=$row_prod['first_payed'];
	$payed=$row_prod['payed'];
	$debt=$row_prod['debt'];
$total_payed=$total_payed+$first_payed;
$total_balance=$total_balance+$debt;


	
	?>
	<tr><td><?php echo $count; $count++;  ?></td>
<td><?php echo $name;  ?></td><td><?php echo number_format($quantity);  ?></td><td><?php echo date('d-m-Y',strtotime($date)) ; ?></td>
<td><?php echo $cname;  ?></td> <td><?php echo number_format($payed) ;  ?></td>
<td><?php echo number_format($debt);  ?></td>



<tr>
	



<?php	
	
 }?>
  <tr><td  colspan="10" ><h5 style="font-family:COMIC SANS MS;color:blue;">Versement:
  <?php  echo number_format(($total_payed+$total_yishyuwe)-$total) .' Frw';  ?> &nbsp&nbsp&nbsp
 Ideni:<?php echo number_format($total_balance).'Frw';  ?>   &nbsp&nbsp&nbsp  Depense: 
 <?php echo number_format($total).'Frw';  ?> </h5></td></tr>
 <?php 
}
?>
</table>
</fieldset>
</body>

<html>