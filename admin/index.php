
<?php 
	require_once( "../db.php" ); 
	
	$cmd1 = mysql_query( "select * from user_master", $conn );
	$customers = mysql_num_rows( $cmd1 );

	$cmd2 = mysql_query( "select * from products", $conn );
	$products = mysql_num_rows( $cmd2 );

	$cmd3 = mysql_query( "select * from categories", $conn );
	$categories = mysql_num_rows( $cmd3 );

	$cmd4 = mysql_query( "select * from orders", $conn );
	$orders = mysql_num_rows( $cmd4 );
	
	$cmd5 = mysql_query( "select * from newsletter", $conn );
	$newsletter = mysql_num_rows( $cmd5 );
?>





<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ADMIN | HOME </title>

		<?php include "header.php";?>
 		
		
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->	
	<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="section"><h1>Welcome back <?php echo "$rset143[name]";?>!</h1></div>
				<br/><br/>
				<div class="row">
					
					<div class="col-lg-2 box" style="background-color:#ff4d4d">
						<a href="customer.php" class="btn">
							<h2><?php echo $customers; ?></h2>
							<br>
							customers <i class="fa fa-book fa-lg"></i>
						</a>
					</div>
					
					<div class="col-lg-2 box" style="background-color:yellow">
						<a class="btn" href="products.php">
							<h2><?php echo $products; ?></h2>
							<br>
							products <i class="fa fa-paperclip fa-lg"></i>
						</a>
					</div>
					
					<div class="col-lg-2 box" style="background-color:#e600e6">
						<a class="btn" href="categories.php">
							<h2><?php echo $categories; ?></h2>
							<br>
							categories <i class="fa fa-fa fa-lg"></i>
						</a>
					</div>
					
					<div class="col-lg-2 box" style="background-color:lime">
						<a class="btn" href="orders.php">
							<h2><?php echo $orders; ?></h2>
							<br>
							Items sold <i class="fa fa-shopping-cart fa-lg"></i>
						</a>
					</div>
	
					<div class="col-lg-2 box" style="background-color:#3366ff">
						<a class="btn" href="">
							<h2><?php echo $newsletter; ?></h2>
							<br>
							subscribers <i class="fa fa-comments fa-lg"></i>
						</a>
					</div>
					
				</div>
				<!-- /row -->
				<br><br>
				<div class="row" >
						
					<div class="col-md-6">
					<div id="piechart"></div>

					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

					<script type="text/javascript">
					// Load google charts
					google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

					// Draw the chart and set the chart values
					function drawChart() {
					  var data = google.visualization.arrayToDataTable([
					  ['categories', 'products per categories'],
					  ['school', 8],
					  ['college', 2],
					  ['office', 4],
					  ['art & craft', 2]
					 
					]);

					  // Optional; add a title and set the width and height of the chart
					  var options = {'title':'products in %', 'width':500, 'height':400};

					  // Display the chart inside the <div> element with id="piechart"
					  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
					  chart.draw(data, options);
					}
					</script>
					</div>
					
					
					<div class="col-md-6">
					<div id="columnchart_values"></div>
					<script type="text/javascript">
						google.charts.load("current", {packages:['corechart']});
						google.charts.setOnLoadCallback(drawChart);
						function drawChart() {
						  var data = google.visualization.arrayToDataTable([
							["Element", "Density", { role: "style" } ],
							["Copper", 8.94, "gold"],
							["Silver", 10.49, "green"],
							["Gold", 19.30, "purple"],
				["Platinum", 21.45 ,"red"]
						  ]);

						  var view = new google.visualization.DataView(data);
						  view.setColumns([0, 1,
										   { calc: "stringify",
											 sourceColumn: 1,
											 type: "string",
											 role: "annotation" },
										   2]);

						  var options = {
							title: "Density of Precious Metals, in g/cm^3",
							width: 600,
							height: 400,
							bar: {groupWidth: "95%"},
							legend: { position: "none" },
						  };
						  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
						  chart.draw(view, options);
					  }
					  </script>
					</div>
				</div>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	<hr/>
		 
	</body>
</html>
