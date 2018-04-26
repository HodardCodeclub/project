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

#data:hover{background-color:#4CAF50}
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
xmlhttp.open("GET","autosearchstock.php?q="+str,true);
xmlhttp.send();
}

</script>

<script type="text/javascript" src="js/jquery.js"></script>
</head>


<body >
<fieldset style="background-color:white;">
<legend>Ibisigaye  Muri Stock</legend>
<p style="margin-left:600px;">
<input type="text" Placeholder="Search here"onkeyup="autoFetchStock(this.value)"/> &nbsp &nbsp 

</p>

<div id="result">

<table border="1">
<tr style=" font-family:COMIC SANS MS;color:blue;background-color:#4CAF50;">
<td>No</td>
<td>Igicuruzwa</td><td>Quantity</td><td>Ikiranguzo/unit</td><td>Igiciro/unit</td></tr>
<?php
include"include/connnect.php";
$sel="select * from new_stock  order by prod_name";
$run_sel=mysqli_query($con,$sel);
	$count=1;
 while($row_prod=mysqli_fetch_array($run_sel)){
	$id=$row_prod['id'];
	$name=$row_prod['prod_name'];
	$quantity=$row_prod['quantiy'];
	$price=$row_prod['selling_price'];
	$org_price=$row_prod['original_price'];
	
	

	
	?>
	<tr id="data"><td><?php echo $count; $count++;  ?></td>
<td><?php echo $name;  ?></td><td><?php echo number_format($quantity);  ?></td><td><?php echo number_format($org_price).'Frw'; ?></td><td><?php echo number_format($price).'Frw';  ?></td>

</tr>
	



<?php	
	
 }

?>
</table>
</div>
</fieldset>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/search.js"></script>
</body>

<html>
