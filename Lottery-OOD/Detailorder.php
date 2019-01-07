<?php
 session_start();
 include 'class/orderline.class.php'; 
$order = new orderline;
$no = $_GET['id'];

$data = $order->detailOrder($no);
 
?><!DOCTYPE html>
<html>
<head>
<title>รายละเอียดการสั่งซื้อ</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>


<body >
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="#"><?php echo 'ยินดีต้อนรับ คุณ '.$_SESSION['id_member'];?></a>
		</div>
		<div class="w3l_search">
			<form action="Search" method="get">
				<input type="text" name="num" value="ค้นหาลอตเตอรี่" minlength="1" maxlength="6" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ค้นหาลอตเตอรี่';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
	<!-- 	<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="events.html">หน้าหลัก</a><i>/</i></li>
					<li><a href="products.html">สถานะการสั่งซื้อ</a><i>/</i></li>
		
					
				
				</ul>
			</div> -->
		<div class="product_list_header">  
			<form action="cart.php" method="post" class="last">
                <fieldset>
                  <!--   <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" /> -->
                    <input type="submit" name="submit" value="ดูสินค้าในตะกร้า" class="button" />
                </fieldset>
            </form>
		</div>

		<!-- <div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
							 
								<li><a href="login.html">สถานะการสั่งซื้อ</a></li> 
							<li><a href="login.html">ข้อมูลส่วนตัว</a></li> 
								<li><a href="login.html">ออกจากระบบ</a></li> 
					
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div> -->
		<div class="w3l_header_right1">
			<h2><a href="SelectLogin.php">ออกจากระบบ</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->


	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="User.php"><span>Lottery</span> Store</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="User.php">หน้าหลัก</a><i>/</i></li>
					<li><a href="Profile.php">ข้อมูลส่วนตัว</a><i>/</i></li>
					<li><a href="Status.php">สถานะการสั่งซื้อ</a></li>
				
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+092) 034 1814</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">stdwcrs@gmail.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
		<div class="products-breadcrumb">
		<div class="container">
	
		</div>
	</div>
<!-- //header -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
	
		
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>

<!-- top-brands -->
	
	<div class="top-brands">
		<div class="container">
			
			
		

			<?php
			echo '<div style="margin:50px; padding:50px;">';
		   foreach ($data as $read) {
		   	// <p>ชื่อ : สุทธิดา วชีระสุทธิ์</p>
          $orderno =  $read['orderno'];
        
          $date  =  $read['saledate'];
          $time  =  $read['saletime'];




        }
         // echo '<div style="margin:50px; padding:50px;">';
       

        echo "<h2>เลขที่ใบสั่งซื้อ : ".$orderno."</h2><br>";
         

        echo "<h4>วันเวลาที่ซื้อขาย : ".$date." ".$time."</h4><br>";

     
			
       
       	
        echo "<table class='table table-hover' width='150' height='100' border='1' >
        		<tr class='info' align = 'center'>
        		<td >อันดับ</td> <td>หมายเลขลอตเตอรี่</td> <td>วันที่ออกรางวัล</td> <td>จำนวน(ฉบับ)</td> <td>ราคา(บาท)</td>

        		</tr>";


        		$i=0;
           foreach ($data as $read) {
           	$totalp = $read['totalprice'];
          
           	$i++;

		  echo "<tr align = 'center'>
		  			<td>".$i."</td>

		  			<td>".$read['lotteryno']."</td>
		  			<td>".$read['date_']."</td>

		  			<td>".$read['quantity']."</td>
		  			<td>".($read['quantity']*80)."</td>




		        </tr>";


        }
       echo "</table><br><br>";
       echo"<p align = 'right'>ราคาสินค้าทั้งหมด  &nbsp;&nbsp;&nbsp;&nbsp;".($totalp-32)."&nbsp;&nbsp;&nbsp;&nbsp;  บาท</p>";
       echo"<p align = 'right'>ค่าขนส่ง  &nbsp;&nbsp;&nbsp;&nbsp;32 &nbsp;&nbsp;&nbsp;&nbsp; บาท</p>";
       echo"<p align = 'right'>ราคาสุทธิ &nbsp;&nbsp;&nbsp;&nbsp; ".$totalp."&nbsp;&nbsp;&nbsp;&nbsp;  บาท</p><br>";
     	echo"</div>";







?>
			</form>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //top-brands -->

<!-- newsletter -->
<!-- 	<div class="newsletter">
		<div class="container">
			<div class="w3agile_newsletter_left">
				<h3>sign up for our newsletter</h3>
			</div>
			<div class="w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="subscribe now">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> -->
<!-- //newsletter -->
<!-- footer -->
	<div class="footer">
		<div class="container">
	
		
			<div class="clearfix"> </div>
			<div class="agile_footer_grids">
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h4>100% secure payments</h4>
						<img src="images/card.png" alt=" " class="img-responsive" />
					</div>
				</div>
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h5>connect with us</h5>
						<ul class="agileits_social_icons">
							<li><a href="https://www.facebook.com/suthida.wacheerasut.9" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="https://twitter.com/psw52812020" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							
							<li><a href="https://www.instagram.com/sutthidawacheerasut/?hl=th" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<div class="w3ls_logo_products_left1">
				
		
				
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			
		</div>
	</div>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
</body>
</html>


