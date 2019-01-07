
<?php


// echo 'ยินดีต้อนรับ คุณ '.$_SESSION['id_member'];
 include 'class/lottery.class.php'; 
session_start();

$l = new lottery;


$obj = $l->getPop();
	
$p = 0;

//         echo '<script>alert("ยืนยันเพิ่มสินค้าลงตะกร้า")</script>';

if(isset($_SESSION['strid'])  ) {

	$strid = $_SESSION['strid'];
	$strd = $_SESSION['strd'];
	$q = $_SESSION['q'];



}
if(isset($_POST['add'])){



        


       $id =  $_GET['id'];
      $d =  $_GET['d'];


       $s = $_GET['s'];

    
    $arr_id = explode(",", $strid);
       $arr_d = explode(",", $strd);
       for($i=0;$i<$q;$i++){
       	if($id == $arr_id[$i]){
 	echo '<script>alert("คุณมีหมายเลขลอตเตอรี่นี้ในตะกร้าแล้ว")</script>';
 		$p = 1;


       	}
       }
       if($s == 'พร้อมขาย' and $p != 1){


 	echo '<script>alert("ยืนยันเพิ่มสินค้าลงตะกร้า")</script>';

   

  
       

        $arr_id[$q] = $id;
        $arr_d[$q] = $d;

        // echo $arr[$q];
        $strid = implode(",", $arr_id);
        $strd = implode(",", $arr_d);
        // echo $strid;
        $_SESSION["strid"] = $strid;
		$_SESSION["strd"] = $strd ;
	

    
        // echo $_GET['id']."<br>".$_GET['d']."<br>".$_GET['q'];
   
     	 $q = $q +1;

	$_SESSION["q"] = $q ;



		session_write_close();

       }else{
       	if($p !=1){
       		 	echo '<script>alert("สินค้าหมดไม่สามารถใส่ลงตะกร้าได้")</script>';
       	}

 	   
     


       }
      
       

       // echo $sd;
      



}else{
	$q = 0;
	$strid = ' ';
	$strd = ' ';


}
// if($q==0){
// 	$strid = ' ';
// 	$strd = ' ';

// }



// if($_POST['search']){}

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
	<!-- banner -->

<body>
<!-- header -->


	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="#"><?php echo 'ยินดีต้อนรับ คุณ '.$_SESSION['id_member'];?></a>
		</div>
		<div class="w3l_search">
			<form action="Search.php" method="get">
				<input type="text" name="num" minlength="1" maxlength="6" value="ค้นหาลอตเตอรี่" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ค้นหาลอตเตอรี่';}" required="">
			
				<input type="submit" name = "search" value=" ">
			</form>
		</div>
	<!-- 	<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="events.html">หน้าหลัก</a><i>/</i></li>
					<li><a href="products.html">สถานะการสั่งซื้อ</a><i>/</i></li>
		
					
				
				</ul>
			</div> -->
		<div class="product_list_header">  
		<?php
		// echo $strid;
		echo "<form action='cart.php?arrid=$strid&arrd=$strd&q=$q' method='post' class='last'>";
		
		?>
		
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
			<h3>ลอตเตอรี่ที่ได้รับความนิยม</h3>
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

											echo $read["issue_date"]."<br> งวดที่ : ".$read["period"]."  <br>ราคา : ".$read["price"]. " บาท<br>สถานะ : ".$read['status']."<br>";

        									?>
										</div>
										<div class="snipcart-details top_brand_home_details">

								<?php 
												$id = $read['lottery_number'];
													$d = $read['issue_date'];

													$s = $read['status'];



													if($q==0){
														$strid = $id;
												$strd = $d;

													}
												

									

												
									 
								echo "<form action='user.php?strid=$strid&strd=$strd&q=$q&id=$id&d=$d&s=$s' method='post' id = 'f1'>";	?>		
												<fieldset>
									
					 											
											
													<?php 
									
				




													echo "<input type='submit' name='add'

													 value='ใส่ลงตะกร้า' class='button'  /> "; ?>
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


</body>

</html>
