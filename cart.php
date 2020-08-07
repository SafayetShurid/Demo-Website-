<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!--connecting to bootstrap framework-->

  <link rel="stylesheet" href="Bootstrap\css\bootstrap.min.css">
  <link rel="stylesheet"  href="css\style.css">
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
     <link rel="stylesheet" href="css/cart.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="Bootstrap\js\bootstrap.min.js"></script>

  <style>
    
    .s1
    {
      color: #fff;
    }

    th
    {
      color: #fff;
    }
  </style>
    
    <title> SMP FASHION </title>


</head>
<body>


  <div class="header container">

     <a href="#">
    <img src="images/logo2.png" alt="Logo">
  </a>
 <h1>SMP Fast Track </h1>
</div>



<!-- Navbar starts -->    
<nav class="navbar navbar-inverse">

<div class="container">

  <!-- <img style="max-width:110px; margin-top: 2px; margin-bottom: 0px; padding: 0px" class="navbar navbar-brand"  src="C:\Users\ASUS\Desktop\project work\Project\images\logo.png" >
-->


  <ul class="nav navbar-nav navbar-left" >


    
    <li ><a href="index.html">Home</a></li>
    <li><a href="About us.html">About us</a></li>
      <li><a href="page1.html">Infobiotic Outsourcing Lab & Studios</a></li>

      <!-- a drop down menu -->

        <li class="dropdown active"  data-hover="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown">SMP Fashions LTD
        <span class="caret"></span></a>
     <ul class="dropdown-menu" role="menu">
        <li><a  href="cart.php#men">Men's Clothing</a></li>
        <li><a  href="cart.php#women">Womens Clothing</a></li>
        <li><a  href="cart.php#other">Accessories</a></li>                       
      </ul>
      </li>


       
        <li><a href="page4.html">SMP Exports LTD</a></li>
        <li><a href="page5.html"> The 3D Printing Team</a></li>
        
   <!-- <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Tutorials <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">HTML</a></li>
        <li><a href="#">CSS</a></li>
        <li><a href="#">JavaScript</a></li>                        
      </ul>
    </li> -->

  </ul>
</div>
</nav>

<!-- Navbar ends -->

<?php
session_start();
$product_ids = array();
//session_destroy();

//check if Add to Cart button has been submitted
if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){
        
        //keep track of how mnay products are in the shopping cart
        $count = count($_SESSION['shopping_cart']);
        
        //create sequantial array for matching array keys to products id's
        $product_ids = array_column($_SESSION['shopping_cart'], 'id');
        
        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );   
        }
        else { //product already exists, increase quantity
            //match array key to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
        
    }
    else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, start from key 0 and fill it with values
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>


        <?php

        $connect = mysqli_connect('localhost', 'root', '', 'cart');
        $query = 'SELECT * FROM products ORDER by id ASC';
        $result = mysqli_query($connect, $query);

        /* if ($result):
            if(mysqli_num_rows($result)>0):
                while($product = mysqli_fetch_assoc($result)):
                //print_r($product);
				*/
                ?>
				
				
				
				
				<div id="men">
<div class="container-fluid">
 <div class="row">
 
 <form method="post" action="cart.php?action=add&id=1">
  <div class="col-md-2 col-md-offset-1 ">
    <div class="thumbnail">
      
        <img src="images/men1.jpg" alt="Lights" style="width:100% ">
        <div class="caption">
          <p style="text-align: justify;"><b>BRANDED SUIT</b></p>
		   <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="BRANDED SUIT" />
                            <input type="hidden" name="price" value="120" />
          <button  value="Add to Cart" name="add_to_cart" class="btn btn-success">Add to cart!</button>
        </div>
     
    </div>
  </div>
  </form>
  
  <form method="post" action="cart.php?action=add&id=2">

  
  <div class="col-md-2">
    <div class="thumbnail">
      
	
        <img src="images/men2.jpg" alt="Nature" style="width:100%">
        <div class="caption">
         <p style="text-align: justify;"><b>BRANDED WATCH</b></p>
		  <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="BRANDED WATCH" />
                            <input type="hidden" name="price" value="35" />
          <button  value="Add to Cart" name="add_to_cart" class="btn btn-success">Add to cart!</button>
        </div>
		</form>
      
    </div>
  </div>
  
  <form method="post" action="cart.php?action=add&id=3">
  <div class="col-md-2">
    <div class="thumbnail">
      
        <img src="images/men3.jpg" alt="Fjords" style="width:100%">
        <div class="caption">
         <p style="text-align: justify;"><b>BRANDED SHOES</b></p>
		  <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="BRANDED SHOES" />
                            <input type="hidden" name="price" value="57" />
          <button  value="Add to Cart" name="add_to_cart" class="btn btn-success">Add to cart!</button>
        </div>
    
    </div>
  </div>
</form>

  <div class="col-md-4" style="color:#ff9400"  >
    <h2 style=" font-family: 'Anton', sans-serif">Men's Clothing </h2>
    <blockquote style=" font-family: 'Anton', sans-serif">We are providing the best men-wear u can ever get!
                Don't miss the chance cause we are offering a great
                discount too.So what are you waiting for??Grab your cart and start shopping NOW!!</blockquote>
  </div>
</div>
</div>
</div>


<!--women-->

<div id="women">
<div class="container-fluid">
 <div class="row">
 
 <form method="post" action="cart.php?action=add&id=4">
  <div class="col-md-2 col-md-offset-1 ">
    <div class="thumbnail">
      
        <img src="images/women1.jpg" alt="Lights" style="width:100% ">
        <div class="caption">
        <p style="text-align: justify;"><b>BRANDED BAG</b></p>
		 <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="BRANDED BAG" />
                            <input type="hidden" name="price" value="31" />
          <button  value="Add to Cart" name="add_to_cart" class="btn btn-success">Add to cart!</button>
        </div>
     
    </div>
  </div>
  </form>
  

  <form method="post" action="cart.php?action=add&id=5">
  <div class="col-md-2">
    <div class="thumbnail">
      
        <img src="images/women2.jpg" alt="Nature" style="width:100%">
        <div class="caption">
       <p style="text-align: justify;"><b>BRANDED SAREE</b></p>
	    <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="BRANDED SAREE" />
                            <input type="hidden" name="price" value="83" />
          <button  value="Add to Cart" name="add_to_cart" class="btn btn-success">Add to cart!</button>
        </div>
      
    </div>
  </div>
  </form>
  
  <form method="post" action="cart.php?action=add&id=6">
  <div class="col-md-2">
    <div class="thumbnail">
      
        <img src="images/women3.jpg" alt="Fjords" style="width:100%">
        <div class="caption">
        <p style="text-align: justify;"><b>BRANDED LIPSTICK</b></p>
		 <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="BRANDED LIPSTICK" />
                            <input type="hidden" name="price" value="35" />
          <button  value="Add to Cart" name="add_to_cart" class="btn btn-success">Add to cart!</button>
        </div>
    
    </div>
  </div>
  
  </form>
  
  

  <div class="col-md-4" style="color:#fc2828">
    <h2 style=" font-family: 'Anton', sans-serif">Women's Clothing </h2>
    <blockquote style=" font-family: 'Anton', sans-serif">We are providing the best women wear u can ever get!
                Don't miss the chance cause we are offering a great
                discount too.So what are you waiting for??Grab your cart and start shopping NOW!!</blockquote>
  </div>
</div>
</div>
</div>

<!--others-->

<div id="other">
<div class="container-fluid">
 <div class="row">
 
 <form method="post" action="cart.php?action=add&id=7">
  <div class="col-md-2 col-md-offset-1 ">
    <div class="thumbnail">
      
        <img src="images/other1.jpg" alt="Lights" style="width:100% ">
        <div class="caption">
          <p>BRANDED SUNGLASS</p>
		   <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="BRANDED SUNGLASS" />
                            <input type="hidden" name="price" value="21" />
          <button  value="Add to Cart" name="add_to_cart" class="btn btn-success">Add to cart!</button>
        </div>
     
    </div>
  </div>
  
  </form>

  <form method="post" action="cart.php?action=add&id=12">
  <div class="col-md-2  ">
    <div class="thumbnail">
      
        <img src="images/other3.jpg" alt="Lights" style="width:100% ">
        <div class="caption">
          <p>BRANDED GUITAR</p>
		   <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="BRANDED GUITAR" />
                            <input type="hidden" name="price" value="92" />
          <button  value="Add to Cart" name="add_to_cart" class="btn btn-success">Add to cart!</button>
        </div>
     
    </div>
  </div>
  
  </form>
  <form method="post" action="cart.php?action=add&id=9">
  <div class="col-md-2">
    <div class="thumbnail">
      
        <img src="images/other2.png" alt="Fjords" style="width:100%">
        <div class="caption">
          <p>BRANDED BODY SPRAY</p>
		   <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="BRANDED BODY SPRAY" />
                            <input type="hidden" name="price" value="15" />
          <button  value="Add to Cart" name="add_to_cart" class="btn btn-success">Add to cart!</button>
        </div>
    
    </div>
  </div>
  
  </form>



 <div class="col-md-4" style="color:#fff">
    <h2 style=" font-family: 'Anton', sans-serif"> Accessories </h2>
    <blockquote style=" font-family: 'Anton', sans-serif">We are providing the best accessories u can ever get!
                Don't miss the chance cause we are offering a great
                discount too.So what are you waiting for??Grab your cart and start shopping NOW!!</blockquote>
  </div>
</div>
</div>
</div>


<!--
                <div class="contain" >
                    <form method="post" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                        <div class="products">
                            <img src="<?php echo $product['image']; ?>" class="img-responsive" />
                            <h4 class="text-info">BRANDED</h4>
                            <h4>$ 10</h4>
                            <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="BRANDED" />
                            <input type="hidden" name="price" value="10" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info"
                                   value="Add to Cart" />
                        </div>
                    </form>
                </div>
				
				-->
				
            
        <div style="clear:both"></div>  
        <br />  
        <div class="table-responsive">  
        <table class="table">  
            <tr><th colspan="5"><h3>Order Details</h3></th></tr>   
        <tr class="s1">  
             <th width="40%">Product Name</th>  
             <th width="10%">Quantity</th>  
             <th width="20%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php   
        if(!empty($_SESSION['shopping_cart'])):  
            
             $total = 0;  
        
             foreach($_SESSION['shopping_cart'] as $key => $product): 
        ?>  
        <tr class="s1">  
           <td><?php echo $product['name']; ?></td>  
           <td><?php echo $product['quantity']; ?></td>  
           <td>$ <?php echo $product['price']; ?></td>  
           <td>$ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
           <td>
               <a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn-danger">Remove</div>
               </a>
           </td>  
        </tr>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);  
             endforeach;  
        ?>  
        <tr>  
             <td class="s1" colspan="3" align="right">Total</td>  
             <td class="s1" align="right">$ <?php echo number_format($total, 2); ?></td>  
             <td></td>  
        </tr>  
        <tr>
            <!-- Show checkout button only if the shopping cart is not empty -->
            <td colspan="5">
             <?php 
                if (isset($_SESSION['shopping_cart'])):
                if (count($_SESSION['shopping_cart']) > 0):
             ?>
              <form method="post" action="cart.php">
                <a type="submit" name="checkin" value="checkin" class="button">Checkout</a>
                </form>
                
                if(isset($_POST['checkin'])){
		session_destroy();
	}
             <?php endif; endif; ?>
            </td>
        </tr>
        <?php  
        endif;
        ?>  
        </table>  
         </div>
        </div>

        <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div style="margin-top: 5px">
                      <img class="logo" src="images/logo2.png" style="width: 50%" alt="Logo">
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p> © 2016 Copyright by SMP FAST TRACK </p>
        </div>
    </footer>


</body>
</html>

