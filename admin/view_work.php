


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
<fieldset style="width:600px; height:auto; background-color:white;align:center; color:blue;
  margin-left:200px; margin-top:50px; font-family:COMIC SANS MS;"
><legend>Abakozi Bawe</legend>
<table border="2">
<tr>
<td>Names</td><td> Action</td>
</tr>
<?php
include"include/connnect.php";
if(isset($_GET['view_work'])){
	$que= "select * from login_users where type!='admin'";
	$run_que=mysqli_query($con,$que);
	
	while($row_user=mysqli_fetch_array($run_que)){
		$id=$row_user['id'];
		$name=$row_user['name'];
		$pass=$row_user['pass'];?>
		

<tr>

<td><?php  echo $name;  ?></td> <td><a href="index.php?edit_id=<?php echo $id; ?>">Edit</a>/
<a href="delete_work.php?delete_work=<?php  echo $id;?>">Delete</a></td>
</tr>
<?php
	}
	
}


?>
</table>
</fieldset>
</body>
</html>