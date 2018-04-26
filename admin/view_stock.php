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


</head>

<body>

<fieldset style="background-color:white;">
<legend>Ibisigaye  Muri Stock</legend>
<p style="margin-left:600px;">
<input type="text" Placeholder="Search here"onkeyup="autoFetchStock(this.value)"/> &nbsp &nbsp 
<a href="index.php?register_product" ><input type="submit" value="Add Product"  style="background:#0066A2;color:white;width:150px; border-radius:60px;height: 30px;" ></a>
</p>

<div id="result">

<table border="1">
<tr style="font-family:COMIC SANS MS;color:blue; background-color:#4CAF50; ">
<td>No</td>
<td>Igicuruzwa</td>
<td>Quantity</td>
<td>Ikiranguzo/unit</td>
<td>Igiciro/unit</td>
<td>Ayarangujwe</td>
<td>Azavamo</td>
<td>Inyungu</td>
<td>Action</td>


<?php
include"include/connnect.php";
$sel="select * from new_stock  order by prod_name";
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
		<td><?php echo number_format($row_prod['selling_price']).'Frw';  ?></td>
		<?php
         $azavamo=$row_prod['quantiy']*$row_prod['selling_price'];
         $ayarangujwe=$row_prod['quantiy']*$row_prod['original_price'];
         $inyungu=$azavamo-$ayarangujwe;
		?>
		<td><?php echo number_format($ayarangujwe).'Frw'; ?></td>
		<td><?php echo number_format($azavamo).'Frw'; ?></td>
		<td><?php  echo number_format($inyungu).'Frw';?></td>
		<td> <a href="index.php?edit_pro=<?php echo $id; ?>">Edit</a></td>
    <tr>
	



<?php	
	
 }

?>
</table>

</div>
</fieldset>
</body>
</html>
