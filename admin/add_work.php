<html>
<body>
<form method="POST" action="" enctype="multipart/form-data">
<fieldset style="width:400px;margin-left:100px; height:auto; background-color:skyblue;align:center; color:blue; ">
<legend> Injiza Umukozi Mushya  Hano</legend>
<table>
<tr>
<td>Names</td><td><input type="text" name="fname"></td>
</tr>
<tr>
<td> User Type</td>
<td><select name="user_type" required>
	<option value="">Select Type</option>
	<option value="user1">Smaller Stock</option>
	<option value="user2">User Big Stock</option>
</select></td>
</tr>
<tr>
<td>Password</td><td><input type="password" name="pass1"></td>
</tr>
<tr>
<td>RE-password</td><td><input type="password" name="pass2"></td>
</tr>
<tr>
<td><input type="submit" value="Create Account" name="submit"></td>
</tr>
</table>
</fieldset>
</form>
</body>

</html>
<?php
include"include/connnect.php";
if(isset($_POST['submit'])){
	$name=$_POST['fname'];
	$type=$_POST['user_type'];
	$pass1=sha1($_POST['pass1']);
	$pass2=sha1($_POST['pass2']);
	if($pass1==$pass2){
		$insert="insert into login_users(name,pass,type) values('$name','$pass1','$type')";
	$run_insert=mysqli_query($con,$insert);
	if($run_insert){
		 echo"<script>alert('An account has been Created!')</script>";
			 echo"<script>window.open('index.php?add_work','_self')</script>";
	}
	
		
	}
	else{
		echo"<script>alert('Password Does not much!')</script>";
	    echo"<script>window.open('index.php?add_work','_self')</script>";
	}
	
}
?>