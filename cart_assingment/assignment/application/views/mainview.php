
<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset = "utf-8">
<title>Shopping Cart</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
 
	<p align="center">our products</p>
	 
	<table align="center">
		<tr>
			<th>Brand</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Action</th>
			
		</tr>
		<br>
		<tr>
		
				<?php foreach($details as $detail) {
					echo '<tr>';
					echo '<td width="30%">'.$detail->product_name.'</td><td class="text-left" width="25%">'.$detail->price.'</td><td  width="20%">'.$detail->quantity.'</td><td width="20%"><i class="fa fa-cart-arrow-down"><a href="../../cartcontroller/cart_buy/'.$detail->id.'" >Buy</a></i></td>';
       				echo '</tr>';


				} 
		
		?>
		
		</tr>

	</table>

	
</body>
</html>