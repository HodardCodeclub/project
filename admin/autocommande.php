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
xmlhttp.open("GET","autosearchcommande.php?q="+str,true);
xmlhttp.send();
}

</script>


</head>

<body>

<fieldset style="background-color:white;">
<legend>Produit zenda Gushira muri Stock </legend>
<h2 style="text-align:center;font-family:COMIC SANS MS;color:blue;">Reba Produit zenda Gushira muri Stock</h2>
<p style="margin-left:600px;">
<input type="text" Placeholder="Search here"onkeyup="autoFetchStock(this.value)"/> &nbsp &nbsp 

</p>

<div id="result">

<table border="1">
<tr style="font-family:COMIC SANS MS;color:blue; background-color:#4CAF50; ">
<td>No</td>
<td>Igicuruzwa</td>
<td>Quantity</td>
<td>Ikiranguzo/unit</td>

<?php
include"include/connnect.php";
$sel="select * from new_stock  where quantiy < min_qty";
$run_sel=mysqli_query($con,$sel);
	$count=1;
 while($row_prod=mysqli_fetch_array($run_sel))
 {
 	$id=$row_prod['id'];
	?>
	<tr id="data">
		<td><?php echo $count; $count++;  ?></td>
		<td><?php echo $row_prod['prod_name'];  ?></td>
		<td><?php echo number_format($row_prod['quantiy']);  ?></td>		
		<td><?php echo number_format($row_prod['original_price']).'Frw'; ?></td>
	
    <tr>
	



<?php	
	
 }

?>
</table>

</div>
</fieldset>
</body>
</html>
