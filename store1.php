<?php 
include "header.php";
$stext='';
if(isset($_POST['sbtn']))
{
	$stext = $_POST['stxt'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    

    <title>Product filter in php</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        	<br />
        	<br />
            <div class="col-md-3">                				
				<div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="50" />
                    <input type="hidden" id="hidden_maximum_price" value="1000" />
                    <p id="price_show">50 - 1000</p>
                    <div id="price_range"></div>
                </div>				
                <div class="list-group">
					<h3>Brand</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
					
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="cello"  > cello</label>
                    </div>
					 <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="camlin"  > camlin</label>
                    </div>
					 <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="robut"  > robut</label>
                    </div>
					<div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="apsara"  > apsara</label>
                    </div>
                   <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="natraj"  > natraj</label>
                    </div>
                    </div>
                </div>

				<div class="list-group">
					<h3>Categories</h3>
                   
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector category" value="bcd" > abcd</label>
                    </div>
                    
                </div>
				
				
				<input type="text" name="stxt" id="stext" value="<?php  echo $stext; ?>"  hidden>
				
				
            </div>

            <div class="col-md-9">
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
		var stext = $('#stext').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, stext:stext },
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:50,
        max:1000,
        values:[50, 1000],
        step:50,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>
