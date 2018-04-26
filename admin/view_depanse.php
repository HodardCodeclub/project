


<DOCTYPE>
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

tr:hover{background-color:#4CAF50}
</style>
</head>
<body>
<fieldset style="width:650px; height:auto; background-color:white;align:center; color:blue;
  margin-left:100px; margin-top:50px; font-family:COMIC SANS MS;"
><legend>Depanse z'umunsi wose</legend>
<p>
 <h3>Select Date</h3>
 <form method="POST">
 <table>
 <tr style="hover{background-color:white}">
 <td>Starting date</td>
 <td>Closing Date</td>

 </tr>
 <tr>
 

  <td><input type="date" name="date"></td>
   <td> <input type="date" name="date3"></td>

   <td></td><td><input type="submit" name="save" value="VIEW"  style="background:#0066A2;color:white;width:150px; border-radius:60px;height: 30px;"></td>
 </tr>
 </table>
 </form>
<table border="2">
<tr  style="font-family:COMIC SANS MS;color:blue;"><td>No</td><td> Date Ya Depanse</td>
<td>Uwayakoresheje</td><td>Icyo Yakoze</td><td>Angahe</td><td>Uwayatanze</td>
</tr>
<?php
include"include/connnect.php";
if(isset($_POST['save']))
{
$date2=$_POST['date'];	
$date3=$_POST['date3'];
$sel_dep="select * from depanse where date BETWEEN '$date2' AND '$date3'";
$run_sel_dep=mysqli_query($con,$sel_dep);
$count=1;
	while($row_user=mysqli_fetch_array($run_sel_dep)){
		$id=$row_user['id'];
		$user=$row_user['user'];
		$used_for=$row_user['used_for'];
		$amount=$row_user['amount'];
		$cashier=$row_user['cashier'];
		$date=$row_user['date'];
		
		?>
		

<tr>
<td><?php  echo $count; $count++; ?></td><td> <?php  echo date('d-m-Y',strtotime($date));  ?></td>
<td><?php  echo $user;  ?></td> <td> <?php  echo $used_for;  ?></td> <td> <?php  echo number_format($amount);  ?></td>
<td> <?php  echo $cashier;  ?></td>
</tr>
<?php
	}
	
}


?>
</table>
</fieldset>
</body>
</html>