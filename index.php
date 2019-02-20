<?php
ob_start();
session_start();
require_once 'dbconnect.php';
$loged = false;
if (isset($_SESSION['user'])) {
    $loged = true;
    $uname = $conn->prepare("SELECT username FROM user WHERE id=".$_SESSION['user']);
    $uname->execute();
    $uname = $uname->fetch()['name'];

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
  
	<title>Assem Urazalimova</title>

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

                        <?php if (!$loged) {
                            echo "  
                            <a href=\"login.php\" ><i class=\"fa fa-sign-in\"></i>
                                <span class=\"hidden-xs text-uppercase\">Вход</span></a>

                        ";
                        }
                        else {
                            echo "  <a href=\"#\" > <span class=\"hidden-xs text-uppercase\">Здравствуйте, ".$uname." </span></a>";
                            echo "  <a href=\"logout.php\" > <span class=\"hidden-xs text-uppercase\">Выйти</span></a>";
                        }?>
                       
  	</div>

      
     <nav class="navbar navbar-static-top navbar-expand-lg navbar-light mynavbar" id="menu">

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
          </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarTogglerDemo01">
          <ul class="navbar-nav" >
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacts.html">Contacts</a>
            </li>
          </ul>
        </div>
     
    </nav>


  </header>
    


  <section>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
       
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" style="background-image: url('slider1.jpeg') ; ">
            <div class="carousel-caption ">
              <h1 class="name">Enjoy the taste</h1>
            </div>
          </div>
          <div class="carousel-item" style="background-image: url('slider3.jpeg'); ">
            <div class="carousel-caption ">
              <h1 class="name">Try new</h1>
            </div>
          </div>
          <div class="carousel-item" style="background-image: url('slider2.jpeg') ; ">
            <div class="carousel-caption">
              <h1 class="name" >Find the best</h1>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>

  </section>
    

  <section class="section-adv" >
		<div class="container" >	
			<p class="text-center">Jonathan Safran Foer</p>
        <h1 class="text-center citation">
        "Food is not rational. Food is culture, habit, craving and identity."</h1>
		</div> 
  </section>


  <section>
     <div class="row row-2 col-md-12 col-sm-12">
          <div class="col-md-2 col-sm-2"></div>
         <div class="col-md-4 col-sm-4">
          <br><br>
	        <h3 class="text-center text-about">Fresh food for everyone</h3>
	        <br> <br>
	        <p class="text-center text-dark" >Here will be a long text about your company or about music. Also you can say about following you. <br> Here will be other long text about how the company grow up or other not intresting topics</p>
          <br><br>
          <img class=" img-cafe" src="street.jpg">
          <br><br><br><br>
          <h4 class="text-center text-about">More about us</h4>
          <br> 
          <p class="text-center text-dark" >If you want to read more about our restaurant click here </p>  
          <p class="text-center"><a href="about.html" class="more text-center"> More </a> </p> <br><br>
	      </div>

        <div class="col-md-4 col-sm-4">
          <img class="img-cafe" src="cafe.jpeg">
          <br><br><br>
          <h3 class="text-center text-about">Any social media you want</h3>
          <br> <br>
          <p class="text-center text-dark" >Here will be a long text about your company or about music. Also you can say about following you.<br>Here will be other long text about how the company grow up or other not intresting topics</p>
          <br><br><br>
          <img class="img-cafe" src="service.jpg">

        </div>
        <div class="col-md-2 col-sm-2"></div>
	  </div> 
  

  </section>

<section>
  
  <div class="row container-menu justify-content-md-center">
    <div class="card border-dark mb-3 container-reserve" >
      <div class="card-body text-dark">
        <h5 class="card-text text-center">Our secret ingredient is a pinch of Love.</h5>
        <br>
        <h4 class="card-title text-center"><a href="menu.php" class="more">Reserve a table now</a></h4>
  </div>
</div>

  </div>

</section>


  <section>
    <div class="container row-3" >
      <h2 class="text-center" style="color: rgba(142, 127, 82, 1);">The most Popular</h2>
      <br><br>
      <div class="card-deck">
          <div class="card">
              <img class="card-img-top" src="plate1.png" alt="Card image cap">
              <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="plate2.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="plate3.png" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
            </div>
          </div>
        </div>
    </div>
  </section>
  </div>


  <section>
    <div class="row-4">
    </div>
  </section>




<footer>
  <div class="container-fluid bg-primary py-3">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-9 col-sm-12">
          <p class="text-dark">+7 (777) 777-70-70</p>
          <p class="text-dark">Assem Urazalimova</p>
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
   
     <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/myjs.js"></script>
    <script src="js/jquery.min.js"></script>




</body>
</html>
