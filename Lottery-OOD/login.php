<?php  

session_start();
$_SESSION["id_member"] = $_POST["Username"];

session_write_close();

 include 'class/member.class.php';  
 
 $data = new Member();  
 $message = '';  
 if(isset($_POST["login"]))  
 {  
 	$data->id_member = $_POST["Username"];
 	$data->password = $_POST["Password"];


     $t =  $data->login();

     if($t==1){
     	header("location:User.php");  
     }
      else {  
              $message = "รหัสผ่านผิด หรือ ไม่มีผู้ใช้งานนี้";  
           }  
                
           
 }  

 if(isset($_POST["regis"]))  
 {  

 	$data->id_member = $_POST["username"];
 	$data->password = $_POST["password"];
 	$data->fName = $_POST["fName"];
 	$data->lName = $_POST["lName"];
 	$data->phone = $_POST["phone"];
 	$data->address = $_POST["address"];

      // $field = array(  
      //      'id_member'     =>     $_POST["username"],  
      //      'password'     =>     $_POST["password"],  
      //       'fName' => $_POST["fName"], 
    		// 'lName' => $_POST["lName"],
    		// 'phone' => $_POST["phone"],
    		// 'address' => $_POST["address"]
      // );  
           $data->register() ;
           echo "สมัครสมาชิกเรียบร้อยแล้ว";

 
 } 

 ?>  

<!DOCTYPE html>
<html>
<head>
<title>เข้าสู่ระบบลูกค้า</title>
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
	<!-- <div class="agileits_header">
		<div class="w3l_offers">
			<a href="products.html">Today's special Offers !</a>
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		<div class="product_list_header">  
			<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
            </form>
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="login.html">Login</a></li> 
								<li><a href="login.html">Sign Up</a></li>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="mail.html">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div> -->
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
	<!-- <div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.html"><span>Grocery</span> Store</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="events.html">Events</a><i>/</i></li>
					<li><a href="about.html">About Us</a><i>/</i></li>
					<li><a href="products.html">Best Deals</a><i>/</i></li>
					<li><a href="services.html">Services</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> -->
<!-- //header -->
<!-- products-breadcrumb -->

<!-- //products-breadcrumb -->
<!-- banner -->
<!--  -->
<!-- login -->
		<div class="w3_login">
			<center><h3>ลงชื่อเข้าใช้&สร้างบัญชีลูกค้า</h3></center>

			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">สร้างบัญชีผู้ใช้ลูกค้า</div>
				  </div>
				  <div class="form">
				     <!--  -->
					<h2>เข้าสู่ระบบ</h2>
					<?php  
                if(isset($message))  
                {  
                     echo '<label ">'.$message.'</label><br>';  
                }  
                ?>
					<form action="#" method="post">
					  <input type="text" name="Username" placeholder="ชื่อผู้ใช้งาน" required=" ">
					  <input type="password" name="Password" placeholder="รหัสผ่าน" required=" ">
					  <input type="submit" value="เข้าสู่ระบบ" name="login">
					</form>
				  </div>
				  <div class="form">
					<h2>สร้างบัญชีผู้ใช้ใหม่</h2>
					<form action="#" method="post">
					 <input type="text" name="fName" placeholder="ชื่อ" required=" ">
					    <input type="text" name="lName" placeholder="นามสกุล" required=" ">
					  <input type="text" name="username" placeholder="ชื่อผุ้ใช้งาน" required=" ">
					  <input type="password" name="password" placeholder="รหัสผ่าน" required=" ">
					  <input type="password" name="rePassword" placeholder="ยืนยันรหัสผ่าน" required=" ">
					  
					  <input type="text" name="phone" placeholder="เบอร์โทรศัพท์" required=" ">
					  <input type="text" name="address" placeholder="ที่อยู่" required=" ">
					
					  <input type="submit" value="สมัครสมาชิก" name="regis">
					</form>
				  </div>

				   <div class="cta"><a href="Login_admin.php"></a></div>
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- newsletter-top-serv-btm -->
<!--  -->
<!-- //footer -->
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