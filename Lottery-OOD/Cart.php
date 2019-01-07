
<?php
session_start();
 // require("class/Ordering.class.php");
 require("class/Lottery.class.php");
 require("class/Ordering.class.php");

 date_default_timezone_set('Asia/Bangkok');
 
    $date = date("Y-m-d");
    $time = date("H:i:s");
     
$_GET['q'] = $_SESSION['q'];
$_GET['strid'] = $_SESSION['strid'];
	$_GET['strd'] = $_SESSION['strd'];
	
if(isset($_SESSION['strid'])  ) {

	$strid = $_SESSION['strid'];
	$strd = $_SESSION['strd'];
	$quantity = $_SESSION['q'];
	

	// echo $_GET['arrid'];
	$arrid = explode(",", $strid);
	$arrd = explode(",", $strd);




}

if($_SESSION['q']<=0){

	 echo '<script>alert("ไม่มีสินค้าในตะกร้า")</script>';
	 	$strid = ' ';
	$strd = ' ';
	$quantity =' ';

	// echo $_GET['arrid'];
	$arrid = ' ';
	$arrd =' ';
 

}
if(isset($_GET['delete']) and $_SESSION['q'] > 0){


	$strid = $_GET['arrid'];
	$strd = $_GET['arrd'];
	$quantity = $_GET['q'];
	$n = $_GET['n'];
	

	// echo $_GET['arrid'];
	$arrid = explode(",", $strid);
	$arrd = explode(",", $strd);
	 	$quantity = $quantity-1;

	for($i=$n;$i<$quantity;$i++){
		$arrid[$i] = $arrid[$i+1];
		$arrd[$i] = $arrd[$i+1];
		

	}
	 $strid = implode(",", $arrid);
        $strd = implode(",", $arrd);
	
	
	
		$_SESSION["strid"] = $strid;
		$_SESSION["strd"] = $strd ;
	

    
        // echo $_GET['id']."<br>".$_GET['d']."<br>".$_GET['q'];
  

	$_SESSION["q"] = $quantity ;	

		session_write_close();

	// echo $quantity;



	
}
?>
<!DOCTYPE html>
<html>
<head>
<title>ตะกร้า</title>
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
				<input type="text" name="num" minlength="1" maxlength="6" value="ค้นหาลอตเตอรี่" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ค้นหาลอตเตอรี่';}" required="">
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

		<?php
		echo '<form action="Cart.php?q=0" method="post" class="last">';
		?>
			
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
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
		<div class="privacy about">

		<?php
		if($_GET['q'] > 0){
				echo "<h3>สินค้า<span>ในตะกร้า</span></h3>";
		}
		else{
				echo "<h3>ไม่มี<span>สินค้าในตะกร้า</span></h3>";

			}
		?>
			
			

	      <div class="checkout-right">

			<?php
				if($_GET['q'] > 0){
					echo "<h4>คุณมีลอตเตอรี่ <span>$quantity หมายเลข</span></h4>";	
				}

			


				 ?>
			<form id="f1" href  = 'cart.php'>
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
					<tbody>


					<?php 
					// echo $quantity;
					for($i=0;$i<$quantity;$i++){
						$num = $i+1;
						// echo "string";

							$lot = new Lottery;
							
							$id = $arrid[$i];
							$d = $arrd[$i];

 							$photo =  $lot->manageLottery('select',$id,$d);
 							// echo $strid;




						foreach($photo as $read){
 

					echo "<tr class='rem1'>";
					echo "<td class='invert'>$num</td>";	
					echo "<td class='invert-image'>";

					 echo '<img src="images/'.$read['photo'].'" height = "100" width = "200"/>';
					
					echo "</td>"; ?>	
					<?php


					echo "<td class='invert'>";	
					echo "<div class='quantity'> ";		 
					echo "<div class='quantity-select'> ";			                          
					// echo "<div class='entry value-minus'>&nbsp;</div>";				
					// echo "<div class='entry value'><span>2</span></div>";	
					echo '<input name="'.$i.'" type="text" id="'.$i.'" size="2" value = "1" maxlength="2"/> ฉบับ';	
					echo '<input name="q" type="hidden"  value = "'.$quantity.'"/> ';
					echo '<input name="arrid" type="hidden"  value = "'.$strid.'"/> ';	
					echo '<input name="arrd" type="hidden"  value = "'.$strd.'"/> ';	
					echo '<input name="n" type="hidden"  value = "'.$i.'"/> ';	






						// echo "<div class='entry value-plus active'>&nbsp;</div>";			
						echo "</div>";		
						echo "</div>";	
					echo "</td>";	
					echo "<td class='invert'> หมายเลข : ".$arrid[$i]."
					งวด: ".$read['period']."<br> วันที่ออกรางวัล : ".$arrd[$i]."

					</td>";	
						
					echo "<td class='invert'>80.00</td>";	
					echo "<td class='invert'>";	
					echo "<a href='cart.php?n=$i&q=$quantity&arrid=$strid&arrd=$strd'>
					<input type = 'submit' class = 'btn btn-danger' name = 'delete' value = 'ลบ'></a>";
					// echo "<div class='rem'>";		
					// echo "<div class='close1'> </div>";			
					echo "</div>";		

					echo "</td>";	
					echo "</tr>";
				}
				
				}
				echo "</tbody></table>";
			
?>
<?php
					
					

				if($_SESSION['q'] > 0){
	


				echo "<br><br>

				<a href='Cart.php?'><button class = 'submit check_out' name = 'sum' style='width:300px;height:50px'>คำนวณราคา</button></a>";
				}
						
			
				
?>
				</form>
			</div>
	<?php
	if(isset($_GET['sum'])){
		$sum = 0;
		$q = $_GET['q'];
	

		
	
		for($i=0;$i<$q;$i++){
			$qa[$i] = $_GET[$i];
			$sum = $sum + $qa[$i];
			$j = $_GET[$i];
			echo '<script type="text/javascript">';
     
   echo 'var txt = document.getElementById("'.$i.'").value = '.$j.''; 
   
    echo "</script>";
   }
		$o = new Ordering;
	$price = $o->calTotal($sum);

	
		$total = $price+32; 
		 $qi = implode(",", $qa);
       


		// echo $_POST['num1'];
		echo '<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					   
					<ul>
						<li>ราคาสินค้า <i>-</i> <span>'.$price.' บาท </span></li>
						<li>ค่าขนส่ง <i>-</i> <span>32.00    บาท</span></li>
					
				
						<li>ราคาสุทธิ <i>-</i> <span>'.$total.' บาท</span></li>
					</ul>


					<a href="Deliveryinfo.php?q='.$q.'&price='.$total.'&id='.$strid.'&da='.$strd.'&qi='.$qi.'&sum='.$sum.'&s=0"><button  name = "cforder" class="submit check_out">ยืนยันการสั่งซื้อ</button></a>
				</div>';

		
	}

	?>


	
							
			
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

							document.getElementById('t1').value = 'newVal';
										
									});
								</script>

									<!--  -->

<!-- //js -->

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

</body>
</html>