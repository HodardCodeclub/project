<?php
include"include/connnect.php";

if(isset($_GET['edit_id'])){
	$work_id=$_GET['edit_id'];
	$sel="select * from login_users where id='$work_id'";
	$run_sel=mysqli_query($con,$sel);
	
	while($row_pro=mysqli_fetch_array($run_sel)){
		$id=$row_pro['id'];
		
	$work_name=$row_pro['name'];
	$work_pass=$row_pro['pass'];
	
	}
	
}




?>
<html>
<head><title></title>

</head>
<body>
<form method="post" action="">
<fieldset style="margin-left:250px; margin-top: 100px; font-family:COMIC SANS MS;color:blue;background-color:skyblue;width:440px;"> 
<legend>Edit Details of workers</legend>

<table>
<tr>
<td>Name</td><td><input type="text" name="name" value="<?php echo $work_name;  ?>" required></td></tr><tr>
<td>Password</td><td><input type="text" name="pass"required></td></tr><tr>

<td><input type="submit" name="change"Value="Update User"></td></tr>

</table>

</fieldset>
</form>
<?php
if(isset($_POST['change'])){
$user_id=$id;
$user_name=$_POST['name'];
$user_pass=md5($_POST['pass']);

$update="update login_users set name='$user_name',pass='$user_pass' where id='$user_id'";
$run_update=mysqli_query($con,$update);
if($run_update){
	echo "<script>alert('user account has been changed ')</script>";
	echo "<script>window.open('index.php?view_work','_self')</script>";
}

	
}
?>
</body>
</html>