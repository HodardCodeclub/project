<?php
include"include/connnect.php";
$key=addslashes($_GET['q']);
?>

<table border="1">
<tr style="font-family:COMIC SANS MS;color:blue; background-color:#4CAF50; "><td>No</td>
<td>Igicuruzwa</td><td>Quantity</td><td>Ikiranguzo/unit</td></tr>

<?php
$sel="SELECT * FROM new_stock WHERE prod_name LIKE '%$key%'  AND quantiy < 5";
$run_sel=mysqli_query($con,$sel);
$rows=mysqli_num_rows($run_sel);

if($rows==0)
{
echo"No result found!";
}

else
{
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

</tr>

<?php	
}

?>
</table>

<?php
}

?>