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
<li><a href="index.php">ARTICLE</a>
<ul>
	
	<li><a href="index.php?create">New Product</a>
	</li>
	<li><a href="index.php?new_article">Kwinjiza Ibyaranguwe</a> </li>
	<li><a href="index.php?mvt_article">gusohora igicuruzwa</a> </li>
	</ul>
	</li>

<li><a>View</a>
<ul>
	<li><a href="index.php?view_sto">stock</a></li>
	<li><a href="index.php?autocommande">izenda gushira</a></li>
</ul>
</li>
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
	if(isset($_GET['create'])){
		include"create.php";

	}
	else if(isset($_GET['new_article'])) {
	include "new_article.php";
	}
	else if(isset($_GET['view_sto'])){
    include"view_stock.php";
	}
	else if(isset($_GET['mvt_article'])){
		include"mvt_article.php";

	}
	else if(isset($_GET['autocommande'])){
		include"autocommande.php";
	}
	else if(isset($_GET['change_pass'])){
		include"change_pass.php";
	}
?>



</body>


</html>
<?php
}
?>