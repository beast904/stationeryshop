<?php
include "header.php";	
session_start();
if(!isset($_SESSION['uid']))
{
	header('location:index.php');
}
$uid=$_SESSION['uid'];
$cmd1=mysql_query( "select * from user_master where UID='$uid'", $conn );
$r1=mysql_fetch_array( $cmd1 );
?>
<!DOCTYPE html>
<?php 

      include('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("STATIONERY SHOP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content ='	
	  
					<center><h2>The Stationery Shop</h2></center>
					<p>Name : '.$r1[1].' '.$r1[2].'<p>
					<!-- Order Details -->
					<table class="table">
						<hr/><tr>
						<th colspan="3">Product name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
						</tr>
						
						<hr/>
					<tr><td><br></td></tr>
						
							';		
										if(isset($_SESSION['ctid']))
										{
										
										$ctid=$_SESSION['ctid'];
										//to fetch product_id

										$sql="select * from cart_details where CTID='$ctid'";
										$res=mysql_query($sql,$conn) or die(mysql_error());

										$sql="select * from cart_master where CTID='$ctid'";
										$tot1=mysql_query($sql,$conn);
										$tot2=mysql_fetch_array($tot1);


										while($res1=mysql_fetch_array($res))
										{
											$sql1 = "select * from products where PID=".$res1['PID']."";
												$cmd1 = mysql_query($sql1,$conn)  or die( mysql_error( ) );
												$rset1 = mysql_fetch_array( $cmd1 );
												
											//echo $rset1['pname'];
											$p=$rset1['pprice'];
											$q=$res1['quantity'];
											$st=$p * $q ;
											
				$content.='
					<br/>
								<tr>
									<td colspan="3">'.$rset1['pname'].'</td>
									<td>'.$rset1['pprice'].'</td>
									<td>'.$res1['quantity'].'</td>
									<td>'.$st.'</td>
									
								</tr>
								
								<tr><td><br></td></tr>
						
			';		
			}
			$content.='
	
							<tr >
								<td colspan="5">Shiping charges</td>
								<td><strong>FREE</strong></td>
							</tr>
							
								
							<tr><td><br></td></tr>
							<hr>	
							<tr class="table-bordered">
								<td colspan="5"><strong>TOTAL</strong></td>
								<td><strong class="order-total">'.$tot2['total_cost'].'</strong></td>
							<tr>
							<hr>
						</div>
			
					</div>
					<!-- /Order Details -->
		
  ';
										}
										else 
										{
											$content .='empty cart or fail to fetch data or products will be deliverd';
										}
      $obj_pdf->writeHTML($content); 
      ob_end_clean();
      $obj_pdf->Output('stationery_bill.pdf', 'I');  
?>
