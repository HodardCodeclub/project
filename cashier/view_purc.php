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
<h2 style="text-align:center;font-family:COMIC SANS MS;color:blue;">Reba raporo yibyinjiye muri stock</h2>
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
<td>Igicuruzwa</td><td>Itariki </td><td>Status</td><td>QTY</td><td>Ikiranguzo</td>
<td>Ayo Waranguje</td><tr>

<?php

include"include/connnect.php";
if(isset($_POST['save'])){
$date2=$_POST['date'];	
$date3=$_POST['date3'];

$sel="select * from admin_purchase where date BETWEEN '$date2' AND '$date3' ";
$run_sel=mysqli_query($con,$sel);
	$count=1;
	$t_purchase=0;
	$qtyy=0;
 while($row_prod=mysqli_fetch_array($run_sel)){
	 $id=$row_prod['id'];
	$prod_name=$row_prod['prod_name'];
	$date=$row_prod['date'];
	$Status=$row_prod['status'];
	$ibyinjiye=$row_prod['ibyinjiye'];
	//$totali_yabyo=$row_prod['totali_yabyo'];
	
	$ikiranguzo=$row_prod['org_price'];
	$total_purchase=$row_prod['total_purchase'];
	//$total_profit=$row_prod['total_profit'];
	$t_purchase=$t_purchase+$total_purchase;
	$qtyy=$qtyy+$ibyinjiye;
?>
	<tr><td><?php echo $count; $count++;  ?></td>
<td><?php echo $prod_name;  ?></td>
<td><?php echo date('d-m-Y',strtotime($date));  ?></td>
<td><?php  echo $Status; ?></td>
<td><?php echo number_format($ibyinjiye); ?></td>

<td><?php echo number_format($ikiranguzo);   ?></td>
<td><?php echo number_format($total_purchase).'Frw' ;?></td>

<tr>
	



<?php	
	
 }

?>

	


</table>
<p>QTY Total:<b style="font-family:COMIC SANS MS;color:blue;"> <?php  echo number_format($qtyy); ?></b>

   &nbsp &nbsp&nbsp&nbsp&nbsp Totali Yayo Waranguje: <b style="font-family:COMIC SANS MS;color:blue;"> <?php echo number_format($t_purchase).'Frw';    ?></b></p>
</fieldset>
</body>

<html>
<?php   }

?>