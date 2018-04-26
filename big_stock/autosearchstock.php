<?php
include"include/connnect.php";
$key=addslashes($_GET['q']);
?>

<table border="1">
<tr style="font-family:COMIC SANS MS;color:blue; background-color:#4CAF50; "><td>No</td>

<td>Igicuruzwa</td>
<td>Stock</td>
<td>entree</td>
<td>Sortee</td>
<td>Action</td>

<?php
$sel="SELECT * FROM article WHERE Prod_name LIKE '%$key%'";
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
		<td><?php echo $row_prod['Prod_name'];  ?></td>
		<td><?php echo $row_prod['stock']; ?></td>
		<td><?php echo $row_prod['entree']; ?></td>
		<td><?php echo $row_prod['sortee']; ?></td>

        <td> <a href="index.php?edit_pro=<?php echo $id; ?>">Edit</a>
	/<a href="delete?delete_pro=<?php echo $id; ?>"> Delete</a></td>
<tr>

<?php	
}

?>
</table>

<?php
}

?>