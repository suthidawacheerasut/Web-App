<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
 include 'class/orderline.class.php';  

session_start();
// if(isset($_GET['no'])){
// 	$no = $_GET['no'];
// 	$date_ = $_GET['date_'];
// 	echo $date_;




// }

?>
<!DOCTYPE html>
<html>
<head>
<title>การชำระเงิน</title>
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

<body>
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
			<form action="status.php" method="post" class="last">
                <fieldset>
             <!--        <input type="hidden" name="cmd" value="_cart" />
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
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<!-- <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="products.html">Branded Foods</a></li>
						<li><a href="household.html">Households</a></li>
						<li class="dropdown mega-dropdown active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Veggies & Fruits<span class="caret"></span></a>				
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>	
										<li><a href="vegetables.html">Vegetables</a></li>
										<li><a href="vegetables.html">Fruits</a></li>
									</ul>
								</div>                  
							</div>				
						</li>
						<li><a href="kitchen.html">Kitchen</a></li>
						<li><a href="short-codes.html">Short Codes</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="drinks.html">Soft Drinks</a></li>
										<li><a href="drinks.html">Juices</a></li>
									</ul>
								</div>                  
							</div>	
						</li>
						<li><a href="pet.html">Pet Food</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Frozen Foods<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="frozen.html">Frozen Snacks</a></li>
										<li><a href="frozen.html">Frozen Nonveg</a></li>
									</ul>
								</div>                  
							</div>	
						</li>
						<li><a href="bread.html">Bread & Bakery</a></li>
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right"> 
<!-- about -->
<!-- 		<div class="privacy about">
			<h3>สินค้า<span>ในตะกร้า</span></h3>
			
	      <div class="checkout-right">
					<h4>คุณมีลอตเตอรี่ <span>3 หมายเลข</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>อันดับ</th>	
							<th>ลอตเตอรี่</th>
							<th>จำนวน</th>
							<th>รายละเอียด</th>
						
							<th>ราคา</th>
							<th>ลบ</th>
						</tr>
					</thead>
					<tbody><tr class="rem1">
						<td class="invert">1</td>
						<td class="invert-image"><a href="single.html"><img src="images/1.png" alt=" " class="img-responsive"></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">Fortune Sunflower Oil</td>
						
						<td class="invert">$290.00</td>
						<td class="invert">
							<div class="rem">
								<div class="close1"> </div>
							</div>

						</td>
					</tr>
					<tr class="rem2">
						<td class="invert">2</td>
						<td class="invert-image"><a href="single.html"><img src="images/3.png" alt=" " class="img-responsive"></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">Basmati Rise (5 Kg)</td>
					
						<td class="invert">$250.00</td>
						<td class="invert">
							<div class="rem">
								<div class="close2"> </div>
							</div>

						</td>
					</tr>
					<tr class="rem3">
						<td class="invert">3</td>
						<td class="invert-image"><a href="single.html"><img src="images/2.png" alt=" " class="img-responsive"></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">Pepsi Soft Drink (2 Ltr)</td>
						
						<td class="invert">$15.00</td>
						<td class="invert">
							<div class="rem">
								<div class="close3"> </div>
							</div>
	
						</td>
					</tr>

				</tbody></table> -->
			</div><br><br>
	
				<div class="col-md-8 address_form_agile">
				<h3>   กรุณาชำระเงิน</h3><br>
				<p>คุณสุทธิดา วชีระสุทธิ์</p>
				<p>ธนาคารไทยพาณิชย์ เลขที่บัญชี 907-0-19430-4 </p>
				<p>ประเภท ออมทรัพย์ สาขา มหาวิทยาลัยเชียงใหม่</p>
					  <!-- <input type="radio" name="optradio" >ธนาคารไทยพาณิชย์<br><br> -->
			


				<!-- <center><input type="button" name="ok"></center> -->

				<!-- <form action="Status.php" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">ชื่อ - นามสกุล: </label>
													<input class="billing-address-name form-control" type="text" name="name" placeholder="ชื่อ-นามสกุล">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">เบอร์โทรศัพท์:</label>
														    <input class="form-control" type="text" placeholder=เบอร์โทรศัพท์">
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">อำเภอ: </label>
														 <input class="form-control" type="text" placeholder="อำเภอ">
														</div>
															<div class="controls">
															<label class="control-label">จังหวัด: </label>
														 <input class="form-control" type="text" placeholder="จังหวัด">
														</div>
															<div class="controls">
															<label class="control-label">รหัสไปรษณีย์: </label>
														 <input class="form-control" type="text" placeholder="รหัสไปรษณีย์">
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												
													
											</div></div>  -->
										
									
								<br><br><a href="Status.php"></section><button class="submit check_out">ตกลง</button></</a>	
								</form><br><br>
									<!-- <div class="checkout-right-basket">
				        	<a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div> -->
					</div>
		<!-- 					<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4>สรุป</h4><ul>    </ul>
					<ul>
						<li>ราคาสินค้า <i>-</i> <span>240.00 </span></li>
						<li>ค่าขนส่ง <i>-</i> <span>35.00 </span></li>
					
				
						<li>ราคาทั้งหมด <i>-</i> <span>275</span></li>
					</ul>
						<a href="Address.php"><button class="submit check_out">ยืนยันการจัดส่ง</button></a>
				</div> -->
			
			

		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->



<!-- newsletter -->
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

<!-- //footer -->
<!-- js -->

<!-- //js -->
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
<!-- start-smoth-scrolling -->

<!-- start-smoth-scrolling -->
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