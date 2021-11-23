<?php 
include "connect.php";
include "functions.php";
session_start();
ob_start();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pati Kardeşliği</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
	<script src="https://kit.fontawesome.com/196af8238f.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-envelope">  </i> info@patikardesligi.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/patilogo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<?php if($_SESSION["uye_nick"]){
									 ?>
								<li><a href="hesabim.php"><i class="fa fa-user"></i> Hesabım</a></li>
								<?php } ?>
								<?php if($_SESSION["uye_durum"]==1){ ?>
								<li><a href="admin-panel/index.php"><i class="fas fa-tasks"></i></i>Yönetim Paneli</a></li> 
								
								<?php }if($_SESSION["uye_nick"] && $_SESSION["uye_durum"]==0){ ?>
								<li><a href="add-animal.php"><i class="fas fa-plus"></i> Dostunu ekle!</a></li>
								<?php } ?>
								<li><a href="#" style="color:red;"><i class="fa fa-star"></i> Patici ol!</a></li>
								<li><a href="#"><i class="fas fa-book-open"></i> Yardım</a></li>
								<?php if(!$_SESSION["uye_nick"]){
									?>
								<li><a href="login.php"><i class="fa fa-lock"></i> Giriş yap/Kayıt ol</a></li>
								<?php }else{ ?>
									<li><a href="session_destroy.php"><i class="fas fa-sign-out-alt"></i>Çıkış yap</a></li> 
									<?php } ?>
									
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Ana sayfa</a></li>
								<li class="dropdown"><a href="#">Patiler<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Kediler</a></li>
										<li><a href="product-details.html">Köpekler</a></li> 
										<li><a href="checkout.html">Kuşlar</a></li> 
										<li><a href="cart.html">Diğer</a></li> 
                                    </ul>
                                </li> 
								<li><a href="#">Üyeler</a>
                                    
							</li> 
							<li class="dropdown"><a href="#">Ticket<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="ticket.php">Ticket oluştur</a></li>
										<li><a href="tickets-list.php">Ticket listesi</a></li> 
                                    </ul>
                                </li> 
								<li><a href="contact-us.php">İletişim</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	