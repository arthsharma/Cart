<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset = "utf-8">
<title>Shopping Cart</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">

  
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="#"><i class="fa fa-home">Home</i></a></li>
      <li class="dropdown">


        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Our Products<span class="caret"></span></a>
         <!-- <?php print_r ($product); ?> -->
 
       <ul class="dropdown-menu ">
       <?php
foreach($product as $products){ 
echo '<li><a href="../maincontroller/main/'.$products->sno.'" >'.$products->category_id.'</a></li>';

       }
       ?>
            </ul>
                         
         
      </li>
    
      <li><a href="#"><i class="material-icons">&#xe0ba;</i>Contact Us</a></li>
    </ul>
   
  </div>
 
</div>
</nav>

</body>
</html>