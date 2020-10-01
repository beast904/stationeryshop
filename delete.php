<?php
session_start();
include "db.php";

if(isset($_REQUEST['pid'] ))
{
	
	$pid=$_REQUEST['pid'];
	$ctid=$_REQUEST['ctid'];
	
	$sql="delete from cart_details where PID='$pid' and CTID='$ctid'";
	$res=mysql_query($sql,$conn);
	if($res)
	{
		
		echo "<script type='text/javascript'>";
		//echo "alert('record deleted successfully');";
		echo "window.location.href='cart.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['wpid'] ))
{
	
	$wpid=$_REQUEST['wpid'];
	$uid=$_SESSION['uid'];
	
	$sql="delete from wishlist where PID='$wpid' and UID='$uid'";
	$res=mysql_query($sql,$conn);
	if($res)
	{
		
		echo "<script type='text/javascript'>";
		//echo "alert('record deleted successfully');";
		echo "window.location.href='wishlist.php';";
		echo "</script>";
	}
}

?>