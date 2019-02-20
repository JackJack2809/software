<?php
ob_start();
session_start();
require_once 'dbconnect.php';
if( isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
}
$login=$pass="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login= test_input($_POST['login']);
    $pass= test_input($_POST['pass']);
}
$password = hash('sha256', $pass);

$auth = $conn->prepare("select id,username,password from user where username='$login'");
$auth->execute();
$row = $auth->fetch();
$count = $auth->rowCount();


if ($count == 1 && $row['password'] == $password) {
    $_SESSION['user'] = $row['id'];
    header("Location: index.php");
} else {
    $err_msg = "Incorrect Credentials, Try again...";
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$comp_name = "Vesta";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Авторизация</title>


    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />

</head>

<body>


<div id="all">
    <header>

        <!-- *** TOP ***
_________________________________________________________ -->
        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-5 contact">

                        <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                        </p>
                    </div>
                    <div class="col-xs-7">

                        <div class="login">
                            <a href="login.php" > <span class="hidden-xs text-uppercase">Вход</span></a>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- *** TOP END *** -->

        <!-- *** NAVBAR ***
_________________________________________________________ -->

        <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

            <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand home" href="index.php">
                            <img src="img/logo.png" alt="Universal logo" class="hidden-xs hidden-sm">
                            <img src="img/logo-small.png" alt="Universal logo" class="visible-xs visible-sm"><span class="sr-only">Главная</span>
                        </a>
                    </div>
                    <!--/.navbar-header -->

                    <div class="navbar-collapse collapse" id="navigation">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href = "./index.php"> Главная </a>
                            </li>


                            <li class="dropdown">
                                <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">О нас <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="Unnecessary/contact.html">Контакты</a>
                                    </li>
                                    <li><a href="Unnecessary/contact2.html">Информация</a>

                                </ul>
                            </li>
                        </ul>

                    </div>

                    </span>
                </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>


</div>

<!-- *** NAVBAR END *** -->

</header>

<hr>

<div id="content">
    <div class="container" id="contact">

        <section>
            <div class="row">
                <div class="col-md-8">


                    <div class="heading">
                        <h3>Вход</h3>
                    </div>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Логин</label>
                                    <input name="login" type="text" class="form-control" id="login">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">Пароль</label>
                                    <input name="pass" type="password" class="form-control" id="pass">
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" name = "upload" class="btn btn-template-main"></i>Войти</button>

                            </div>
                        </div>
                        <!-- /.row -->
                    </form>
                </div>




            </div>


        </section>

    </div>
    <!-- /#contact.container -->
</div>
<!-- /#content -->





<hr>
<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright1">
    <div class="container">
        <div class="col-md-12">
            <p class="pull-left">&copy; 2017 <?php echo $comp_name ?></p>
            <p class="pull-right">Template by <a href="https://bootstrapious.com">Bootstrapious</a> & <a
                    href="https://fity.cz">Fity.cz</a>
                <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
            </p>

        </div>
    </div>
</div>
<!-- /#copyright -->

<!-- *** COPYRIGHT END *** -->



</div>
<!-- /#all -->

<!-- #### JAVASCRIPT FILES ### -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
</script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="js/jquery.cookie.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/front.js"></script>



<!-- gmaps -->

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

<script src="js/gmaps.js"></script>
<script src="js/gmaps.init.js"></script>

<!-- gmaps end -->





</body>

</html>
