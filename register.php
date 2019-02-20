
<?php
    require('dbconnect.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
    $email = $_POST['email'];
        $password = $_POST['password'];
 
        $query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = "User Created Successfully.";
        }else{
            $fmsg ="User Registration Failed";
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
                  <a href="#" class="text-dark"><span class="lnr lnr-user"></span></a>
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
<div class="row row-reg">
    <div class="col-md-4"></div>
    <div class="col-md-4">
<div class="container">
      <form class="form-signin" method="POST">
          <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

        <h2 class="form-signin-heading">Please Register</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block sumbit-contact" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block " href="login.php">Login</a>
      </form>
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