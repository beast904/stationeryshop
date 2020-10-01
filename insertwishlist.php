<?php
session_start();
include "db.php";
if(isset($_SESSION['uid']))
{
	
if(isset($_GET['pid']))
	{
		$pid=$_GET['pid'];
			//auto id start
		$sql = "select max( WID ) from wishlist";
		$cmd = mysql_query( $sql, $conn );
		$cnt = mysql_num_rows( $cmd );
		if( $cnt == 0 )
		{
			$cartid = 1;
		}
		else
		{
			$rset = mysql_fetch_array( $cmd );
			$WID = $rset[0] + 1;
		}
			//auto id end
		$sql = "insert into wishlist values( $WID, $_SESSION[uid],$pid)";
		$cmd = mysql_query( $sql, $conn );
		if($cmd)
		{
			header( 'location:wishlist.php' );
		}
	}
}

else
{
	echo "<script type='text/javascript'>";
		echo "alert('product can be added only after login');";
		echo "window.location.href='index.php';";
		echo "</script>";
}

?>