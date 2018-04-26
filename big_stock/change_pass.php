<form method="post" action="change_pass.php">
<fieldset style="font-family:COMIC SANS MS;color:blue;background-color:skyblue;width:440px;"> 
<legend>Change Your Password Here</legend>

<table>
<tr>
<td>Enter  Current Password</td><td><input type="password" name="cpass" required></td></tr><tr>
<td>Enter New Password</td><td><input type="password" name="npass1" required></td></tr><tr>
<td>RE-enter New Password</td><td><input type="password" name="npass2" required></td></tr><tr>
<td><input type="submit" name="change"Value="Change Password"></td></tr>

</table>

</fieldset>
</form>

<?php
include"include/connnect.php";
if(isset($_POST['change'])){
	$cpass=sha1($_POST['cpass']);
	$npass1=sha1($_POST['npass1']);
$npass2=sha1($_POST['npass2']);
	$que="select * from login_users where type='user2'";
	$run_que=mysqli_query($con,$que);
	$row=mysqli_fetch_array($run_que);
	$id=$row['id'];
	$name=$row['name'];
	$pass=$row['pass'];
	if($pass==$cpass){
		if($npass1==$npass2){
			$upd="update login_users set pass='$npass1' where id='$id' ";
			$run_upd=mysqli_query($con,$upd);
			echo "<script>alert('Guhindura umubare wibanga Byagenze Neza')</script>";
			echo "<script>window.open('logout.php','_self')</script>";
		}
		else{
			echo "<script>alert('two new password does not match')</script>";
			echo "<script>window.open('index.php?change_pass','_self')</script>";
		}
	}
	else{
		echo "<script>alert('the current password doesnot match')</script>";
			echo "<script>window.open('index.php?change_pass','_self')</script>";
	
	}
	echo $cpass;
	
}	



?>

