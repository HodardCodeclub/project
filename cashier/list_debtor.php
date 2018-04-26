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
<script>

function autoFetchStock(str)
{
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("result").innerHTML=xmlhttp.responseText.trim();
}
}
xmlhttp.open("GET","autosearchdate.php?q="+str,true);
xmlhttp.send();
}

</script>

<script type="text/javascript" src="js/jquery.js"></script>

</head>

<body >
<fieldset style="background-color:white;">
<legend>Kureba Amadeni</legend>
<p style="margin-left:600px;">
<input type="text" Placeholder="Shaka Umukiriya"onkeyup="autoFetchStock(this.value)"/> &nbsp &nbsp 

</p>
<div id="result">
<table border="1">
<tr style="font-family:COMIC SANS MS;color:blue;"><td>No</td>
<td>Umukiriya</td><td>Telephone</td><td>igicuruzwa</td><td>QTY</td><td>Ayo Yatanze</td><td> Asigaranye</td><td>Date</td>
<td>Action</td></tr>
<?php
include"include/connnect.php";

$sel="select * from user_saling where debt>0";
$run_sel=mysqli_query($con,$sel);
	$count=1;
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
        <td ><a href="index.php?pay_debt=<?php echo $id;?>">Pay</a></td>


</tr>
	



<?php	
	
 }

?>
</table>
</div>
</fieldset>
</body>

<html>