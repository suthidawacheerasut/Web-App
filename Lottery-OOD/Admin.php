
<?php
 include 'class/lottery.class.php'; 
 
 session_start();
$l = new lottery;
$obj = $l->viewLottery('normal');


?>

<!DOCTYPE html>
<html>
<head>
<title>หน้าหลัก</title>
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
			<a href="#">
<?php echo 'ยินดีต้อนรับ '.$_SESSION["idadmin"];?></a>
		</div>


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
				<h1><a href="Admin.php"><span>Lottery</span> Store</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="Admin.php">หน้าหลัก</a><i> </i></li>
					<li><a href="Order.php">คำขอสั่งซื้อ</a><i> </i></li>
		<li><a href="Report.php">รายงาน</a><i> </i></li>

				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">จัดการ<i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="Managelottery.php">จัดการลอตเตอรี่</a></li> 
								<li><a href="Manageuser.php">จัดการผู้ใช้งาน</a></li>

							</ul>
						</div>                  
					</div>	
				</li>
			
					
	</ul>
		</div>  

				
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
			<h3>ลอตเตอรี่ทั้งหมด</h3>
			<div class="agile_top_brands_grids">
				
										

											<?php 
											 foreach($obj as $read){
 

											// $obj->viewLottery();
											
												?>
												<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
													
											<?php 
											    echo '<img src="images/'.$read['photo'].'" height = "100" width = "200"/>';

											echo "<br><center><b>".$read["lottery_number"]."</b><center><br>";

											echo $read["issue_date"]."<br> งวดที่ : ".$read["period"]."  <br>ราคา : ".$read["price"]. " บาท<br>";
        									?>
										</div>
										<div class="snipcart-details top_brand_home_details">
										<?php 
										echo '<form action="edit.php?no=$read["lottery_number"]&d=$read["issue_date"]&c=$read["count"]" method="GET">'; 

										echo '<input name="no" type="hidden"  value = "'.$read["lottery_number"].'"/> ';	
										echo '<input name="d" type="hidden"  value = "'.$read["issue_date"].'"/> ';
										echo '<input name="c" type="hidden"  value = "'.$read["count"].'"/> ';



										?>
											
												<fieldset>
											<input type="submit" name="submit" value="แก้ไข" class="button"	
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div> 

				<?php  }  ?>
				
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="container">
	
		
			<div class="clearfix"> </div>
			<div class="agile_footer_grids">
	
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
