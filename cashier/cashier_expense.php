<form action="" method="post" enctype="multipart/form-data">

  <fieldset style="width:400px; height:auto; background-color:white;align:center; color:blue;
  margin-left:200px; margin-top:50px; font-family:COMIC SANS MS;"><legend>Depanse Z'umunsi wose</legend>
  <table style="font-family:COMIC SANS MS;color:blue;">
  
  <tr><td> <b>Uwayakoresheje </b> </td><td> <input type="text" name="name"   value=""required></td></tr>
  
  <tr><td> <b>Icyo Yakoze</b> </td><td> <input type="text" name="used_for"  value=""required></td></tr>
  
  
   <tr><td> <b>Angahe: </b>  </td><td> <input type="number" name="amount"  step="any" required></td></tr>
   
   
  <tr align="center"><td colspan="3"> 
  <input type="submit" name="depanse"  value="Injiza Depanse"  style="width:100px;
	 height:35px; border:0;	 border-radius:5px;	 -webkit-border-radius:5px;	-o-border-radius:5px;	-moz-border-radius:5px;
	background-color:blue;		font-weight:bolder; color:white;" ></td></tr>
  </table>
   
  </fieldset>
</form>
<?php
include"include/connnect.php";
if(isset($_POST['depanse'])){
	$name=$_POST['name'];
	$used_for=$_POST['used_for'];
	$amount=$_POST['amount'];
	$c_name=$_SESSION['user'];
	$date= date("Y-m-d");
	
	$insert="insert into depanse(user,used_for,amount,cashier,date) values('$name','$used_for','$amount','$c_name','$date')";
	$run_insert=mysqli_query($con,$insert);

	//$run_update=mysqli_query($con, $update);
	if($run_insert){
		echo "<script>alert('Depanse Zinjijwe neza')</script>";
			echo "<script>window.open('index.php?expenses','_self')</script>";
	}
	else{
		echo "<script>alert('Hari Ikibazo')</script>";
			echo "<script>window.open('index.php','_self')</script>";
	}
	
	
	
}



?>