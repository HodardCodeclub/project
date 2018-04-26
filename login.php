<?php  
session_start();
  ?>
<!DOCTYPE>
<html>
<head>
<title></title>

<link rel="stylesheet" href="style.css" type="text/css">
<link rel="shortcut icon" href="images/logo1.jpeg">
</head> 
<body>
<div class="login">
<h2> LOGIN</h2>
<form method="POST" action="login.php">

<input type="text" name="user" placeholder="Please Enter Username....." autocomplete="off"><br><br>
<input type="password" name= "pass"placeholder="Please Enter Password....." autocomplete="off" ><br><br>
<input type="submit" value="Login"><br>
</form>
</div>
</body>
</html>
<?php
include"include/connnect.php";

if(isset($_POST['user'])&& isset($_POST['pass'])){
	$user=addslashes($_POST['user']);
	$pass=addslashes(sha1($_POST['pass']));
	if(!empty($user)&&!empty($pass)){
		$sel="select * from login_users where name='$user' && pass='$pass'";
		$que=mysqli_query($con,$sel);
		$row_user=mysqli_fetch_array($que);
			$type=$row_user['type'];
		 
		$check_user=mysqli_num_rows($que);
		if($check_user==0){
			echo "<script> alert('Password Or Email Is Incorrect')</script>";
		}
		else{
			if($type=='admin'){
					$_SESSION['user']=$user;
		echo "<script>window.open('admin/index.php?logged_in=you are successfully login','_self')</script>";
			}
			elseif ($type=='user1') {
			$_SESSION['user']=$user;
		echo "<script>window.open('cashier/index.php?logged_in=you are successfully login','_self')</script>";
			}
			else{
				$_SESSION['user']=$user;
		echo "<script>window.open('big_stock/index.php?logged_in=you are successfully login','_self')</script>";
			}
		
		}
		
		
	
}
}
?>