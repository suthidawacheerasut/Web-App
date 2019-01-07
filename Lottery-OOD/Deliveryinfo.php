<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start(); 
include 'class/lottery.class.php';  
 include 'class/delivery.class.php';  
 include 'class/ordering.class.php';  
 include 'class/orderline.class.php';
// error_reporting(E_ALL ^ E_NOTICE);


date_default_timezone_set('Asia/Bangkok');

// if(isset($_GET['id'])){
// 	$no = $_GET['id'];
// 	$date_ = $_GET['da'];

		
		$qi =  $_GET['qi'];
		$da = $_GET['da'];
		$id = $_GET['id'];
		$q = $_GET['q'];
		$sum = $_GET['sum'];
 		$price= $_GET['price'];
if(isset($_GET['s']) and  $_GET['s'] == 0){
	$arrno = explode(",", $id);
	$arrd = explode(",", $da);
	$arrqi = explode(",", $qi);



	for($i=0;$i<$q;$i++){
	$l = new lottery();
 	 $lotdata =  $l->manageLottery('select',$arrno[$i],$arrd[$i]);
 	  foreach($lotdata as $read){
 	  	$no = $read['lottery_number'];
 	  	$qt = $read['quantity'];
 	  	$d = $read['issue_date'];
 	  	$p = $read['period'];
 	  	$s = $read['status'];
 	  	$c = $read['count'];
 	  	$image = $read['photo'];

 	

 	  }
 	  $qt = $qt-$arrqi[$i];
		$l->setLottery($no,$d,$p,$qt,$c,$s,$image);
		$l->manageLottery('edit',$arrno[$i],$arrd[$i]);
	

	}

	

}else{
	echo "no";
}

 		 


	$d = date("Y-m-d");
 	 $t = date("H:i:s");
 
 	 $idm = $_SESSION['id_member'];
 	
  
 
if(isset($_GET["save"]))  
 {  
 	 $idm = $_SESSION['id_member'];

 		

 	if($_GET['name']!=''){

 	
 	
 		$obj = new Delivery(); 
 	$n = $_GET["name"];
 	$ad = $_GET["newaddress"];
 	$ph = $_GET["phone"];
 	$obj->setDelivery($n,$ad,$ph);
 	
 
           $obj->saveDelivery() ;
 	$idd =  $obj->getDelivery();
 	// echo $id_delivery;

 	// $q = $_GET['q'];
 	// $p = $_GET['price'];

 	$order = new ordering();

 	
 	$order->setOrdering($d,$t,$price,$sum); 
 	$order->createOrder($idm,$idd);

 	$orderno =  $order->getOrder('one',$idm); 
 		$order->setStatus('ยังไม่ชำระเงิน',$orderno);
 	// echo $orderno;




 	}else{
 		$order = new ordering();
 			
 	
 	$order->setOrdering($d,$t,$price,$sum); 
 	$order->createOrder($idm,' ');
 	
 	$orderno =  $order->getOrder('one',$idm);
 	// echo $orderno;
 	$order->setStatus('ยังไม่ชำระเงิน',$orderno);
 	// echo $orderno;
 	}

	$arrno = explode(",", $id);
	$arrd = explode(",", $da);
	$arrqi = explode(",", $qi);

	// echo $q;



	// echo $q;
	for($j=0;$j<$q;$j++){
		// echo " ".$arrno[$j]." ".$arrd[$j]." ".$arrqi[$j]."<br>";
	
	$or = new orderline;
 	$or->setOrderline($arrqi[$j]);
 	// echo $orderno;

 // 	echo "<br>".$arrno[$i];
 	$re =  $or->addToCart($arrno[$j],$arrd[$j],$orderno);
 	

	}

	    $_SESSION["strid"] = ' ';
		$_SESSION["strd"] = ' ' ;


	$_SESSION["q"] = 0 ;


	header("location:Payment.php"); 
  
	
 }	
  

           




 
 


?>
<!DOCTYPE html>
<html>
<head>
<title>ข้อมูลการจัดส่ง</title>
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
				<input type="text" name="num" value="ค้นหาลอตเตอรี่" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ค้นหาลอตเตอรี่';}" required="">
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

			</nav>
		</div>
		<div class="w3l_banner_nav_right"> 

			</div><br><br>
	
				<div class="col-md-8 address_form_agile">
				<h3>ที่อยู่ในการจัดส่ง</h3><br>
				
					  <input type="radio" name="address"  value="เดิม" checked>ที่อยู่เดิม<br><br>
					  <input type="radio" name="address" value="ใหม่" onclick="if(document.getElementById('spoiler') .style.display=='none') {document.getElementById('spoiler') .style.display=''}else{document.getElementById('spoiler') .style.display='none'}"> ที่อยู่ใหม่<br><br>

				<div id="spoiler" style="display:none">
				<form action="#" method="GET" class="creditly-card-form agileinfo_form">
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
														    <input class="form-control" type="text" name = "phone" placeholder=เบอร์โทรศัพท์">
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">ที่อยู่: </label><br>
															<textarea name="newaddress" placeholder="ที่อยู่" cols="50" rows="3"></textarea>
													
														</div>
													
													</div>
													<div class="clear"> </div>
												</div>
												
													
											</div></div> 
										
										</div>
									</section>	
									<?php


						
								

							
								echo '<input name="q" type="hidden"  value = "'.$q.'"/>';
					echo '<input name="price" type="hidden"  value = "'.$price.'"/>';
							echo '<input name="id" type="hidden"  value = "'.$id.'"/>';
					echo '<input name="da" type="hidden"  value = "'.$da.'"/>';
					echo '<input name="qi" type="hidden"  value = "'.$qi.'"/>';
					echo '<input name="sum" type="hidden"  value = "'.$sum.'"/>';


					// echo '<input name="q" type="hidden"  value = "'.$q.'"/>';

					

									?>

									<button class="submit check_out" name = "save">บันทึก</button>
								</form>
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
			
				<div class="clearfix"> </div>
				
			</div>

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
<script src="js/jquery-1.11.1.min.js"></script>
							 <!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
							<script>$(document).ready(function(c) {
								$('.close2').on('click', function(c){
									$('.rem2').fadeOut('slow', function(c){
										$('.rem2').remove();
									});
									});	  
								});
						   </script>
						  	<script>$(document).ready(function(c) {
								$('.close3').on('click', function(c){
									$('.rem3').fadeOut('slow', function(c){
										$('.rem3').remove();
									});
									});	  
								});
						   </script>

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