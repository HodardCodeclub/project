vv				<?php
				ob_start();
				include'include/connnect.php';
				if(isset($_GET['date'])){
					$date=$_GET['date'];
				?>
				
                <div style="font-weight:bold;color:ORANGE;font-size: x-large;text-align: center"> 
                <span style="color: KHAKI">Quincallerie </span>- STOCK MANAGEMENT SYSTEM<br>
				Reba raporo yibyagurishijwe byose yo ku itariki <?php echo $date;   ?>
                </div><br/>
               
				<table align="center" border=1>
				<tr> <th> NO </th> <th>Prod Name </th> <th>Qty</th><th>Date</th><th>Balance </th><th>Uwabigurishije </th></tr>
				
				<?php
				//$sel="select * from user_saling  where date='$date'";
				$q=$con->query("SELECT * FROM user_saling where date='$date' ");
				$count=1;
				while($row=mysqli_fetch_array($q))
				{
				echo"<tr>";
				echo"<td>".$count."</td>";
				$count++;
				echo"<td>".$row['prod_name']."</td>";
				echo"<td>".$row['date']."</td>";
				echo"<td>".$row['cname']."</td>";
		     	echo"<td>".$row['payed']."Frw</td>";
				echo"<td>".$row['cashier_name']."</td>";	
				
				//echo"<td>".$row[6]."</td>";	
				//echo"<td>".$row[7]."</td>";
				//echo"<td>".$row[8]."</td>";
				//echo"<td>".$row[9]."</td>";
				echo"</tr>";
				}
				?>
				
				</table>
	
				<?php
				include("mpdf60/mpdf.php");
				$mpdf=new mPDF('P','A4'); 
				
				$mpdf->SetDisplayMode('fullpage');
				
				// LOAD a stylesheet
				
				$stylesheet = file_get_contents('mpdf60/mpdfstyletables.css');
				$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
				
				$report_content=ob_get_contents();
				
				$mpdf->WriteHTML($report_content,2);
				$mpdf->Output('CURRENT_STOCK.pdf','I');
				exit;	
				
				}
				?>