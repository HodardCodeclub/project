echo"<script>confirm('Do You Really want to sell'+$quantity+'   qty')</script>";


	
	$sel="select * from new_stock where prod_name='$pro_name' ";
	$run_select=mysqli_query($con,$sel);
	
	while($row_pro= mysqli_fetch_array($run_select)){
		$id=$row_pro['id'];
		$price=$row_pro['selling_price'];
		$o_price=$row_pro['original_price'];
		$qty=$row_pro['quantiy'];
		
			$total_qty=$qty-$quantity;
		$ayarangujwe=$total_qty*$o_price;
		$azavamo=$total_qty * $price;
		$inyungu_t=$azavamo-$ayarangujwe;
		
	// amafaranga yibicuruzwa	
	$total_sell=$quantity*$sel_price;
	$balance=$total_sell-$payed;
	$total_org_price=$quantity*$o_price;
	$inyungu=$total_sell-($total_org_price+$balance);
	
	$cashier=$_SESSION['user'];

	if($total_qty<0){
		echo"<script>alert('Ntabicuruzwa Bihagije Mufitemo')</script>";
		echo"<script>window.open('index.php?sell_pro','_self')</script>";
	}
	else{
		
						$upd="update new_stock set quantiy='$total_qty',azavamo='$azavamo',ayarangujwe='$ayarangujwe',inyungu='$inyungu_t' where id='$id' ";
						$run_upd=mysqli_query($con,$upd);
						
						
						
			$insert="insert into user_saling(prod_name,quantity,date,cname,cashier_name,sell_per_pro,first_payed,payed,total_payed,debt,org_price,ayarangujwe,inyungu) 
			values('$pro_name','$quantity','$date','$cname','$cashier','$sel_price','$payed','$payed','0','$balance','$o_price','$total_org_price','$inyungu')";
			$run_insert=mysqli_query($con,$insert);
						
						if($run_insert){
							echo"<script>alert('Murakoze kugurisha igicuruzwa hasigayemo qty  '+'$total_qty')</script>";
							echo"<script>window.open('index.php?view_report','_self')</script>";
						}
						else{
							echo"<script>alert('Try Again')</script>";
							echo"<script>window.open('index.php?sell_pro','_self')</script>";
	                        }
		


    
		
	}
	

	}
	