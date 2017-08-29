<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset = "utf-8">
<title>Shopping Cart</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="container" >
<br /><br />
<div class="col-lg-6 col-md-6">
<div class="table-responsive">
<h3 align="center">Shopping Cart</h3>
<br/>
<?php 
foreach($buydata as $databuy){



echo '<div class ="col-md-6" style="padding:6px; background-color:#f1f1f1; align="center"> <h4>'.$databuy->product_name.'</h4> 
 <h3 class="text-danger">$'.$databuy->price.'</h3>
  <input type="text" name="quantity" class="quantity" id="qty"/><br /> 
 <button type="button" class="btn btn-success" id="add_cart" name="add_cart"/>Add to cart</button>
 <input type="hidden" name="id" class="id" id="product_id" value="'.$databuy->id.'"/>
  <input type="hidden" name="product_name" class="id" id="product_name" value="'.$databuy->product_name.'"/>

  <input type="hidden" name="product_price" class="id" id="product_price" value="'.$databuy->price.'"/>


</div>';
}	
?>
</div>
</div>

<div class="col-lg-6 col-md-6">
	<div id="card_details">
		<h3 align="center">Cart is empty</h3>
	</div>

</div>
</div>
<script>
		$(document).ready(function(){
			console.log("inside")
			$('#add_cart').click(function(){
			console.log("add cart")
			var product_id = $("#product_id").val();
			var product_name = $("#product_name").val();
			var product_price =  $("#product_price").val();
			var quantity = $('#qty').val();
			console.log(product_id);
			console.log(product_name);
			if(quantity != '' && quantity > 0)
			{
				$.ajax({
					url:"http://localhost/assignment/index.php/cartcontroller/cartadd",
					method:"POST",
					data:{product_id:product_id,product_name:product_name,product_price:product_price, quantity:quantity},
					success:function(res)
					{

						alert("Product added into cart");
						$("#card_details").html(res);
						$('#' + product_id).val('');

					}
				})

			}
			else{
				alert("please enter quality");

			}

		});
			

		$(document).on('click','.remove', function(){
			var row_id = $(this).attr("id");
			if (confirm("Are you sure you want to remove this"))
			 {
			 	$.ajax({
			 		url:"http://localhost/assignment/index.php/cartcontroller/remove",
			 		method:"POST",  
			 		data: {row_id:row_id}, //selecting which data we want to send to the server
			 		success:function(data) 
			 	    {
			 	    	alert("product remove from cart");
			 	    	$('#card_details').html(data);
			 	    }
			 	});

			 }
			 else
			 {
			 	return false;

			 }

		});
		$(document).on('click','#clear_cart', function(){
			if(confirm("Are you sure you want to clear cart?")){

				$.ajax({
					url:"http://localhost/assignment/index.php/cartcontroller/clear",
					success:function(data){
						alert("your cart has been clear");
						$('#card_details').html(data);
					}
				});

			}
			else
			{
				return false;

			}
		});




})
</script>
</body>
</html>