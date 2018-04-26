<?php

include"include/connnect.php";

$state=$_POST['partialState'];
$sel="select prod_name from new_stock where prod_name LIKE '%$state%'";
$run_sel=mysqli_query($con,$sel);
while($row_prod=mysqli_fetch_array($run_sel){
	echo"<div>".$row_prod['prod_name']."</div>";
}

?>
<head>

</head>
<?php
require "db.php";
 if(isset($_POST['search_term'])){
	 $search_term=mysqli_real_escape_string($conn,(htmlentities($_POST['search_term'])));
	 if(!empty($search_term)){
		 $search="select * from new_stock where prod_name LIKE '%$search_term%' '";
		 $run_search=mysqli_query($conn,$search);
		 
			$result_count= mysqli_num_rows($run_search);
			$suffix= ($result_count != 1)? 's': '';
		?>
		<table>
		<tr>
			<td colspan="4" style="text-align:center;">
				<span style="color:green;">
				<?php echo ('<p>'.'Your search for "'.$search_term.'" returned '.$result_count.' results'.'</p>'); 
				if($result_count==0){
					?>
				<td style="border:0px; text-align:left;"> <a href="login.php?kurangisha">Rangisha hano</td>
				<?php 
			}
				?>
				</span>
			</td>
		</tr>
		<?php 
		while($result_row=mysqli_fetch_assoc($run_search)){
			$id= $result_row['id'];
			?> 
	<tr style="border-bottom: solid 1px silver;"> 
		<td style="border:0px; text-align:left;"><?php echo $result_row['prod_name'] ;  ?></td>
		
		<?php 
  			
		}
	 }
 }
?><br>
</table><br><br><br>