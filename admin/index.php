<?php
session_start();
if(!isset($_SESSION['user'])){
	  echo "<script>window.open('../login.php?not_admin=you are not Admin','_self')</script>";
}
else{
	


?>
<!DOCTYPE>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="images/logo.jpeg">
<title>Transparent Menu Bar</title>
</head>
<body>
<div class="header"  style="margin-left:150px;">
<ul>

<li><a href="index.php">Ahabanza</a></li>
<li><a href="">Sitoke</a>
   <ul>
       <li><a href="index.php?view_sto">Ibiri Muri Stock</a></li>
	   <li><a href="index.php?update_sto">Ibyo Waranguye</a></li>
	   <li><a href="index.php?autocomande">Izenda Gushira</a></li>
	    
      
       
    </ul>
 
	</li>
<li><a href="#">report</a>
   <ul>
       <li><a href="index.php?view_sell">yibyaguzwe</a></li>
       <li><a href="index.php?view_purchase">YIBYINJIYE</a></li>
       <li><a href="index.php?view_big_stock"> stock nini</a></li>
       <li><a href="index.php?view_depanse">Ya Depanse Zose</a></li>
        <li><a href="index.php?view_payed">Amadeni</a></li>
        <li><a href="index.php?view">Amadeni YISHYUWE</a></li>
    </ul>  </li>
<li><a href="#">Account</a>

   <ul>
       <li><a href="index.php?change_pass">Change Password</a></li>
	   <li><a href="index.php?add_work">Create cashier</a></li>
	   <li><a href="index.php?view_work">View Cashier</a></li>
	   <li><a href="logout.php">Logout <?php  echo $_SESSION['user'];  ?></a></li>
      
      
    </ul>
</li>

</ul>
</div>
<div class="main" style="width:1000px;margin-left:150px;">
<?php
  
if(isset($_GET['register_product'])){
	include"register_pro.php";
}
else if(isset($_GET['update_sto'])){
	include "update_stock.php";
}
else if(isset($_GET['view_sto'])){
	include "view_stock.php";
}
else if(isset($_GET['autocomande'])){
	include "autocommande.php";
}
else if(isset($_GET['change_pass'])){
	include"change_pass.php";
}
else if(isset($_GET['edit_pro'])){
	include"edit_pro.php";
}
else if(isset($_GET['add_work'])){
	include"add_work.php";
}
else if(isset($_GET['view_work'])){
	include"view_work.php";
}
else if(isset($_GET['edit_id'])){
	include"edit_work.php";
}
else if(isset($_GET['view_sell'])){
	include"view_sell.php";
}
else if(isset($_GET['edit_sell'])){
	include"edit_sell.php";
}
else if(isset($_GET['view_purchase'])){
	include"view_purchase.php";
}
else if (isset($_GET['view_depanse'])){
	include "view_depanse.php";
}
else if (isset($_GET['view_payed'])){
	include"view_payed.php";
}
else if(isset($_GET['view_big_stock'])){
	include"view_mvt.php";

}
else if(isset($_GET['view'])){
	include"view.php";

}
	
?>
</div>



</body>


</html>
<?php
}
?>