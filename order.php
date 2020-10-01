<?php	
include 'header.php';
include "db.php";
$uid=$_SESSION['uid'];
$ctid=$_SESSION['ctid'];

if(isset($_POST['add']))
{
			
	$fname = $_POST["f_name"];
	$lname = $_POST["l_name"];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zip-code'];
	$add = $_POST['address'];
	$landmark=$_POST['landmark'];
	
		
		//auto id start
			$sql = "select max(ADDID) from address";
			$cmd = mysql_query( $sql, $conn );
			$cnt = mysql_num_rows( $cmd );
			if( $cnt == 0 )
			{
				$addid = 1;
			}
			else
			{
				$rset = mysql_fetch_array( $cmd );
				$addid = $rset[0] + 1;
			}
			//auto id end
		
		
		
		
		$sql = "INSERT INTO `address` 
		(`ADDID`, `UID`, `city`, `state`, `pincode`,`address`,`landmark`) 
		VALUES ($addid, '$uid', '$city', '$state', '$zipcode','$add','$landmark')";
		
		
		$res = mysql_query($sql,$conn);
		
		if($res){
				header('location:checkout.php');
		}
	}


if(isset($_POST['checkout']))
{	
	
	$paymethod=$_POST['paymethod']; 
	$addid=$_POST['addid'];
	
	
		$sql="select * from cart_details where CTID='$ctid' ";
		$res=mysql_query($sql,$conn) or die(mysql_error());
		
		
		while($res1=mysql_fetch_array($res))
		{
			$pid=$res1['PID'];
			$quantity=$res1['quantity'];
			
			$sql1="select pprice from products where PID='$pid'";
			$res3=mysql_query($sql1,$conn);
			$rset2=mysql_fetch_array($res3);
			
			$price=$rset2['pprice'];
			$pr=$quantity*$price;
	
	
		//auto id start
		$sql = "select max( OID ) from orders";
		$cmd = mysql_query( $sql, $conn );
		$cnt = mysql_num_rows( $cmd );
		if( $cnt == 0 )
		{
			$oid = 1;
		}
		else
		{
			$rset = mysql_fetch_array( $cmd );
			$oid = $rset[0] + 1;
		}
			//auto id end		
			
			
		$sql = "insert into orders  values( '$oid','$_SESSION[uid]','$pid','$addid','$quantity','$pr',NOW(),'$paymethod','pending')";
		$cmd = mysql_query( $sql, $conn ) ;
		
		
		
		}
		
		
		
	
			
}
?>
<div class="container section">
	<div class="row">
		<div class="col-md-12">
		<p class='alert alert-danger'>hi, thanks for purchasing our products, here's a link to get your bill, contact us if you have any questions  </p>
		<br>
		<a class ='btn btn-link' href='getpdf.php'> save your bill  <i class="fa fa-2x fa-file-pdf-o"></i></a>
		<br>
		<a class ='btn btn-link' href='yourorder.php'> my orders</a>
		</div>
	</div>
</div>

<?php		
include "footer.php";
?>