<?php include('db.php'); ?>
<?php session_start(); ?>
<?php //print_r($_SESSION['cart']); ?>
<?php date_default_timezone_set('Asia/Manila'); ?>
<?php
    $jim = new Data();
    $countproduct = $jim->countproduct();
    
    $cat = $jim->getcategory();
    class Data {
        function countproduct(){
            $count = 0;
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart']:array();
            foreach($cart as $row):
                if($row['qty']!=0){
                    $count = $count + 1;
                }
            endforeach;
            
            return $count;
        }
        function getcategory(){
        	$con = mysqli_connect("localhost","root","root","dbgadget");
            $result = mysqli_query($con,"SELECT * FROM category");
            return $result;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Online Shopping Cart</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

</head><!--/head-->

<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>077-1111111</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> ShoppingCart@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://dribbble.com" target="_blank"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://plus.google.com" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="logo pull-left">
							<center><a href="index.php"><img src="images/home/header1.jpg" alt="" class="img-responsive"/></a></center>
						</div>
		
					</div>
					
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class=" navbar navbar-inverse"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header navbar-default">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?php

                                            $cat = $jim->getcategory();
                                            while($row = mysqli_fetch_array($cat,MYSQLI_ASSOC)){
                                                echo '<li><a href="category.php?filter='.$row['title'].'">'.$row['title'].'</a></li>';
                                            }
                                        ?>
    
                                    </ul>
                                </li> 
								<li><a href="about.php">About Us</a></li> 
								<li><a href="contact.php">Contact</a></li>
								<li><a href="cart.php">Cart <span class="badge"></span></a></li>
								<li><a href="login.php">Login</a></li>
							</ul>
						</div>
					</div>
                    <div class="col-sm-3 top_align">
						<div class="search_box pull-right">
                            <form action="index.php" method="post">
							     <input type="text" placeholder="Search" name="filter" />
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    