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
<legend>Ibyaranguwe</legend>
<form method="post" action="">
<h2 style="text-align:center;font-family:COMIC SANS MS;color:blue;">Raporo y'amadeni yamaze kwishyurwa </h2>
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
    <td></td><td><input type="submit" name="save" value="VIEW"  style="background:#0066A2;color:white;width:150px; border-radius:60px;height: 30px;"></td>
 </tr>
 </table>

</P>

</form>
<table border="1">
<tr style="font-family:COMIC SANS MS;color:blue;"><td>No</td>
<td>Umukiriya</td><td>Telephone</td><td>igicuruzwa</td><td>QTY</td><td>Ayo Yatanze</td><td> Asigaranye</td><td>Date</td>
</tr>
<?php
include"include/connnect.php";
if(isset($_POST['save'])){
$date2=$_POST['date'];	
$date3=$_POST['date3'];

$sel="select * from user_saling where debt = 0 AND date BETWEEN '$date2' AND '$date3' AND status='IDENI' ";
$run_sel=mysqli_query($con,$sel);
	$count=1;
	$t_purchase=0;
	$qtyy=0;
 while($row_debt=mysqli_fetch_array($run_sel)){
	$id=$row_debt['id'];
	$prod_name=$row_debt['prod_name'];
	$quantity=$row_debt['quantity'];
	$cashier_name=$row_debt['cashier_name'];
	$customer_name=$row_debt['cname'];
	$telephone=$row_debt['telephone'];
	$date=$row_debt['date'];
	$payed=$row_debt['payed'];
	$balance=$row_debt['debt'];
	$total_payed=$row_debt['total_payed'];
?>
<tr>
	<td><?php echo $count; $count++;  ?></td>
		<td><?php echo $customer_name;  ?></td> 
		<td><?php echo $telephone;  ?></td>
		<td><?php echo $prod_name;  ?></td>
		<td><?php  echo number_format($quantity);   ?></td>
		<td><?php echo number_format($payed).'  Frw';  ?></td>
		<td><?php echo number_format($balance).'  Frw';  ?></td>
	
		<td><?php echo date('d-m-Y',strtotime($date)) ; ?></td>
       


</tr>
	



<?php	
	
 }

?>

	


</table>

</fieldset>
</body>

<html>
<?php   }

?>