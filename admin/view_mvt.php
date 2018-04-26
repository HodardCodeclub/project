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
<legend>Ibisigaye  Muri Stock Nini</legend>
<p style="margin-left:600px;">
<input type="text" Placeholder="Search here"onkeyup="autoFetchStock(this.value)"/> &nbsp &nbsp 
<a href="index.php?create" ><input type="submit" value="Add Product"  style="background:#0066A2;color:white;width:150px; border-radius:60px;height: 30px;" ></a>
</p>

<div id="result">

<table border="1">
<tr style="font-family:COMIC SANS MS;color:blue; background-color:#4CAF50; ">
<td>No</td>
<td>Igicuruzwa</td>
<td>Ikiranguzo/unit</td>
<td>Quantity</td>
<!--<td>Action</td>-->

<?php
include"include/connnect.php";
$sel="select * from new_article_bigstock  order by prod_name";
$run_sel=mysqli_query($con,$sel);
	$count=1;
 while($row_prod=mysqli_fetch_array($run_sel))
 {
 	$id=$row_prod['id'];
	?>
	<tr id="data">
		<td><?php echo $count; $count++;  ?></td>
		<td><?php echo $row_prod['prod_name'];  ?></td>
		<!--<td><?php //echo date('d-m-Y',strtotime($row_prod['arrival_date'])); ?></td>-->
		<td><?php echo number_format($row_prod['original_price']).'Frw'; ?></td>
		<!--<td><?php // echo number_format($row_prod['selling_price']).'Frw';  ?></td>-->
		<td><?php echo number_format($row_prod['quantity']);  ?></td>
		<!--<td> <a href="index.php?edit_pro=<?php echo $id; ?>">Edit</a>
	/<a href="delete.php?delete_pro=<?php echo $id; ?>"> Delete</a></td>-->
    <tr>
	



<?php	
	
 }

?>
</table>

</div>
</fieldset>
</body>
</html>
