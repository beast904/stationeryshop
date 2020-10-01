<?php
	include("header.php");

?>
<div>
<form action="add_brand.php" method="post" enctype="multipart/form-data">
<input type="text" name="name"><br>
<input type="file" name="image"><br>
<input type="submit" name="submit1" value="submit">
</form>
<div>
<?php
if(isset($_POST['submit1']))
{
	$name = $_POST["name"];
	$path = $_FILES["image"]["name"];
	$sql = "insert into brands value( '', '$name', '$path' )";
	$cmd = mysql_query( $sql, $conn );
	if($cmd) echo "added";
}
?>