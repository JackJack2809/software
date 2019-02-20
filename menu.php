<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBcontroller();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    case "add":
        if(!empty($_POST["quantity"])) {
            $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
            $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
            
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    break;
    case "remove":
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);              
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
            }
        }
    break;
    case "empty":
        unset($_SESSION["cart_item"]);
    break;  
}
}
?>
<!DOCTYPE html>
<html>


<head>

 	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">


  	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/full-slider.css" rel="stylesheet">

  
	<title>Eldar</title>

</head>


<body>

  <header class="myheader"> 

	 <div class="container-fluid py-3">
	    <div class="container">

	      <div class="row py-3 col-md-12 ">
          <div class="col-md-1 "></div>
	        <div class=" col-md-9 ">
	          <h6 class="text-dark">+7 (777) 777-70-70</h6>
	          <h6 class="text-dark">Makataeva st, 88</h6>
	        </div>
	        <div class="col-md-1 ">
	          <div class="d-inline-block">
	              <a href="register.php" class="text-dark"><span class="lnr lnr-user"></span></a>
	          </div>
	        </div>
          <div class="col-md-1"></div>
	      </div>
	    </div>
  	</div>

  	<div class="container">
  		<h1 class="text-center logo">Trésor</h1>
  	</div>

      
     <nav class="navbar navbar-static-top navbar-expand-lg navbar-light mynavbar" id="menu">

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
          </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarTogglerDemo01">
          <ul class="navbar-nav" >
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacts.html">Contacts</a>
            </li>
          </ul>
        </div>
     
    </nav>


  </header>


  <section>
    <div class="row-menu">
    </div>
  </section>

  <section>
    <div class="row row-2">
    </div>
  </section>



<section>
    <div class="container">
    <div class="row col-md-12">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <div class="container">
                <h4>Products</h4>
                <?php
                $product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
                if (!empty($product_array)) { 
                    foreach($product_array as $key=>$value){
                ?>
                    <div class="product-item">
                        <form method="post" action="menu.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                        <div class="product-image"><img class="product-image" src="<?php echo $product_array[$key]["image"]; ?>"></div>
                        <div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
                        <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
                        <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
                        </form>
                    </div>
                <?php
                        }
                }
                ?>
            </div>
        </div>

        <div class="col-md-4">
        <h4>Shopping Cart <a id="btnEmpty" class="more" href="menu.php?action=empty">Empty Cart</a></h4>
            <?php
            if(isset($_SESSION["cart_item"])){
                $item_total = 0;
            ?>  
            <table cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
            <th style="text-align:left;"><strong>Name</strong></th>
            <th style="text-align:left;"><strong>Code</strong></th>
            <th style="text-align:right;"><strong>Quantity</strong></th>
            <th style="text-align:right;"><strong>Price</strong></th>
            <th style="text-align:center;"><strong>Action</strong></th>
            </tr>   
            <?php       
                foreach ($_SESSION["cart_item"] as $item){
                    ?>
                            <tr>
                            <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
                            <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
                            <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                            <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
                            <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="menu.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
                            </tr>
                            <?php
                    $item_total += ($item["price"]*$item["quantity"]);
                    }
                    ?>

            <tr>
            <td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
            </tr>
            </tbody>
            </table>        
              <?php
            }
            ?>
        </div>

        </div>
</div>



</section>














  <footer>
    <div class="container-fluid bg-primary py-3">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-9 col-sm-12">
          <p class="text-dark">+7 (777) 777-70-70</p>
          <p class="text-dark">Eldar Kaisabekov</p>
        </div>
        <div class="col-md-3 col-sm-12">
          <div class="d-inline-block">
            <div class="bg-circle-outline d-inline-block">
              <a href="https://www.facebook.com/" class="text-dark"><i class="fa fa-2x fa-fw fa-facebook"></i>
    </a>
            </div>

            <div class="bg-circle-outline d-inline-block">
              <a href="https://twitter.com/" class="text-dark">
                <i class="fa fa-2x fa-fw fa-twitter"></i></a>
            </div>

            <div class="bg-circle-outline d-inline-block">
              <a href="https://www.linkedin.com/company/" class="text-dark">
                <i class="fa fa-2x fa-fw fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>



    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
     <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/myjs.js"></script>




</body>
</html>