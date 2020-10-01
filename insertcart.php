<?php
session_start();
include "db.php";
if(isset($_SESSION['uid']))
{
if(isset($_GET['pid']))
{
	
	
	
	
	$pid = $_GET['pid'];
	$sql = "select CTID from cart_master where UID = '$_SESSION[uid]'";
	$cmd = mysql_query( $sql, $conn);
	$rset = mysql_fetch_array( $cmd );
	$count = mysql_num_rows( $cmd );
	if( $count == 1 )
	{
	
		$sql = "select * from cart_details where PID='$pid' and CTID='$rset[0]' ";
		$cmd = mysql_query($sql,$conn);
		$count1 = mysql_num_rows( $cmd );
		if( $count1 >= 1 )
		{
			echo "<script type='text/javascript'>";
			echo "alert('product already in cart');";
			echo "window.location.href='cart.php';";
			echo "</script>";
		}
		else
		{
			$sql = "insert into cart_details values( $rset[CTID], $pid, 1)";
			$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );
			header( 'location:cart.php' );
		}
	}
	else
	{
			//auto id start
		$sql = "select max( CTID ) from cart_master";
		$cmd = mysql_query( $sql, $conn );
		$cnt = mysql_num_rows( $cmd );
		if( $cnt == 0 )
		{
			$cartid = 1;
		}
		else
		{
			$rset = mysql_fetch_array( $cmd );
			$cartid = $rset[0] + 1;
		}
			//auto id end
		$sql = "insert into cart_master values( $cartid, $_SESSION[uid], 0)";
		$cmd = mysql_query( $sql, $conn );
		$sql = "insert into cart_details values( $cartid, $pid, 1)";
		$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );
		header( 'location:index.php' );
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