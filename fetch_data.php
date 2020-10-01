<?php
include "db.php";
//fetch_data.php
if(isset($_POST["action"]))
{
	$query = " SELECT * FROM products where CID='0' ";

	if(isset($_POST['brand']))
	{
		$brand_filter = implode("','",$_POST["brand"]);
		$query .=" AND brand IN('$brand_filter') ";   
	}
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$min = $_POST["minimum_price"];
		$max = $_POST["maximum_price"];
		$query .= " AND pprice BETWEEN $min AND $max ";
	}
	if($_REQUEST["stext"]!='')
	{
		//echo "<script>alert('hello');</script>";
		$stext = $_REQUEST["stext"];
		$query .=" AND pname LIKE '%$stext%' OR pdesc LIKE '%$stext%' ";
		$stext = '';
	}
		
	//$statement = $conn->prepare($query);
	//$statement->execute();
	//echo "$query";
	$statement=mysql_query( $query,$conn );
	$count=mysql_num_rows( $statement );
	
	//$total_row = $statement->rowCount();
	if($count>0)
	{
		while($row = mysql_fetch_array($statement))
		{

			$pid    = $row['PID'];
			$pname   = $row['pname'];
			$pdesc = $row['pdesc'];
			$price = $row['pprice'];
			$pimg = $row['pimage'];
			$tag = $row['ptag'];
			$discount= $row['pdiscount'];
			$date=$row['date'];
			?>
				<div class="col-md-3 col-xs-6">
					<div class="product">
						<a href="product.php?pid=<?php echo $pid;?>"> 
						<div class="product-img">
							<img src="<?php echo $pimg; ?>" alt="" >
							<div class="product-label">
								<span class="sale">-30%</span>
								<span class="new">NEW</span>
							</div>
						</div> 
						</a>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href=""><?php echo substr($pname,0,25); ?> </a></h3>
							<h4 class="product-price"><?php echo $price; ?><del class="product-old-price">$990.00</del></h4>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<div class="product-btns">
								<button class="add-to-wishlist"><a href="insertwishlist.php?pid=<?php echo $pid; ?>"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a></button>
								<button class="add-to-wishlist"><a href="insertcart.php?pid=<?php echo $pid; ?>" ><i class="fa fa-shopping-cart"></i><span class="tooltipp">add to cart</span></a></button>
							</div>
						</div>
					</div>
				</div>
		<?php
		}
}}
		?>
		
	


