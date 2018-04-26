<?php
session_start();
if(!isset($_SESSION['user'])){
	  echo "<script>window.open('../login.php?not_staff=you are not allowed ','_self')</script>";
}
else{
	


?>
<!DOCTYPE>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="images/logo1.jpeg">
<title>Transparent Menu Bar</title>
</head>
<body>
<div class="header"  style="margin-left:150px;">
<ul>

<li><a href="index.php">Ahabanza</a></li>
<li><a href="#">Ibicuruzwa</a>
   <ul>
       <li><a href="index.php?sell_pro">Sell Product</a></li>
	   <li><a href="index.php?view_report">view stock</a></li>
	   <li><a href="index.php?list_debtor">Pay debt</a></li>
	   <li><a href="index.php?expenses">Depanse</a></li>
	   <li><a href="index.php?ibyaranguwe">Ibyaranguwe</a></li>
	   
      
       
    </ul>
 
	</li>


<li><a href="#">report</a>
   <ul>
    <li><a href="index.php?sales_report">sales report</a></li>
    <li><a href="index.php?view_purchase">YIBYINJIYE</a></li>
    </ul>  </li>

<li><a href="#">Account</a>

   <ul>
       <li><a href="index.php?change_pass">Change Password</a></li>
	  
	   <li><a href="logout.php">Logout <?php echo $_SESSION['user'];  ?></a></li>
      
      
    </ul>
</li>

</ul>
</div>
<div class="main" style="width:1000px;margin-left:150px;">
<?php
if(isset($_GET['sell_pro'])){
	include "sell_product.php";	
}
else if(isset($_GET['view_report'])){
	include"sell_stock.php";
}
else if(isset($_GET['view_sto'])){
	include "../admin/view_stock.php";
}
else if(isset($_GET['change_pass'])){
	include"change_pass.php";
}
else  if (isset($_GET['sales_report'])){
	include "sales_report.php";
}
else if(isset($_GET['list_debtor'])){
	include"list_debtor.php";
}
else if (isset($_GET['pay_debt'])){
	include "pay_debt.php";
}
else if (isset($_GET['expenses'])){
	include "cashier_expense.php";
}
else if(isset($_GET['view_purchase'])){
	include"view_purc.php";
}
else if (isset($_GET['ibyaranguwe'])){
	include"ibyaranguwe.php";
}



	
?>



</body>


</html>
<?php
}
?>