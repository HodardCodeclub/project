<?php
include"include/connnect.php";
$key=addslashes($_GET['q']);
?>

<table border="1">
<tr style="font-family:COMIC SANS MS;color:blue;"><td>No</td>
<td>Umukiriya</td><td>Telephone</td><td>igicuruzwa</td><td>QTY</td><td>Ayo Yatanze</td><td> Asigaranye</td><td>Yishyuye</td></tr>


<?php
$sel="SELECT * FROM  user_saling WHERE cname LIKE '%$key%'";
$run_sel=mysqli_query($con,$sel);
$rows=mysqli_num_rows($run_sel);

if($rows==0)
{
echo"No result found!";
}

else
{
$count=1;
while($row_debt=mysqli_fetch_array($run_sel))
 {
 	$id=$row_debt['id'];
	?>
	<tr>
	<td><?php echo $count; $count++;  ?></td>
		<td><?php echo $row_debt['cname'];  ?></td> 
		<td><?php echo $row_debt['telephone'];  ?></td>
		<td><?php echo $row_debt['prod_name'];  ?></td>

		<td><?php  echo number_format($row_debt['quantity']);   ?></td>
		<td><?php echo number_format($row_debt['payed']).'  Frw';  ?></td>
		<td><?php echo number_format($row_debt['debt']).'  Frw';  ?></td>
		<td><?php  echo number_format($row_debt['total_payed']);  ?></td>
		


</tr>
<?php	
}

?>
</table>

<?php
}

?>