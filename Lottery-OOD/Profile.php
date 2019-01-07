
<?php  


session_start();

$key = $_SESSION['id_member'];
// echo 'ยินดีต้อนรับ คุณ '.$_SESSION['id_member'];

 include 'class/member.class.php';  
 // session_start();  
 $m = new Member();  
 $message = '';  

 

	   $data =  $m->showProfile($key);

	       foreach($data as $read){
          // echo $read["id_member"]."<br/>";

         $message[0]=  $read["fName"];
         $message[1] =  $read["lName"];
           $message[2]=  $read["phone"];
          $message[3]=  $read["address"];
          $message[4]= $read["password"];
      



    	}

   
 if(isset($_GET['m']))  
                {  
                     // echo '<center><label ">'.$message.'</label></center><br>'; 
                	
        			echo '<script>alert("ยืนยันการแก้ไข")</script>'; 

                }  
   

 if(isset($_POST["save"]))  
 {  
// echo "yes";

      // $field = array(  
         	$fn = $_POST["fName"]; 
    		$ln = $_POST["lName"];
           $pw=  $_POST["password"];
    		$phone = $_POST["phone"];
    		$ad = $_POST["address"];

    
      // );  

    
     $m->setMember($key,$pw,$fn,$ln,$phone,$ad);
       $re =  $m->editProfile() ;
       echo $re;
     if($re == 1)  
      {  
        // echo '<script>alert("ยืนยันการแก้ไข")</script>'; 
        // echo '<script>alert("แก้ไขเรียบร้อย")</script>'; 
        $message = 'แก้ไขเรียบร้อย'; 
     header("location:profile.php?m='แก้ไขเรียบร้อย'");  
        // echo '<script>alert("แก้ไขเรียบร้อย")</script>';




      } else{
        echo '<script>alert("ไม่สามารถแก้ไขได้")</script>';
          


      }

               
               
 
 } 

 ?>


<!DOCTYPE html>
<html>
<head>
<title>ข้อมูลส่วนตัว</title>
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
			<form action="Search.php" method="get">
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
             
                    <input type="submit" name="submit" value="ดูสินค้าในตะกร้า" class="button" />
                </fieldset>
            </form>
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
			<!-- <h3>รายการสั่งซื้อ</h3> -->
			<div class="agile_top_brands_grids">


			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">แก้ไขข้อมูลส่วนตัว</div>
				  </div>
			
				  <div class="form">
					<center><h1>ข้อมูลส่วนตัว</h1></center><br><br>


					<?php  

					$name =  array(  
           			'0'     =>     "ชื่อ",  
           			'1'     =>     "นามสกุล",  
           			'2'     =>     "เบอร์โทรศัพท์",  
           			'3'     =>     "ที่อยู่",
           			'4'     =>     "รหัสผ่าน"
           	
           		  
  
      				);  


 
					for($i=0;$i<4;$i++){
						    if(isset($message[$i])){  
                			  
                     		echo '<label ">'.$name[$i].' : '.$message[$i].'</label><br><br>';  
                			}  			
                	}

                ?>
	



				
				
					</form></div>
				 <div class="form">
					<h1>แก้ไขข้อมูลส่วนตัว</h1><br>
					<form action="Profile.php" method="post">
					<?php
					 echo "ชื่อ <input type='text' name='fName' value = $message[0]  maxlength='32'  minlength='2' required>";
					 echo "นามสกุล <input type='text' name='lName' value = $message[1] maxlength='32'  minlength='2' required>";
					 echo "รหัสผ่าน <input type='password' name='password' value = '".$message[4] ."'maxlength='50'  minlength='6' required>
					 ยืนยันรหัสผ่าน <input type='password' name='repassword' value = '".$message[4] ."'maxlength='50'  minlength='6' required>
					  
					  เบอร์โทรศัพท์ <input type='text' name='phone' value = $message[2] maxlength='10'  minlength='10' required>
					  ที่อยู่<input type='text' name='address' value = '".$message[3]."' maxlength='32'  minlength='15' required>
					";

					 ?>
					 
					     
					  <!-- <input type="text" name="Username" placeholder="ชื่อผุ้ใช้งาน" required=" "> -->
					  
					  <input type="submit" value="บันทึก" name = "save" >
					 
					</form>
				  </div>

				   <div class="cta"><a href="Login_admin.php"></a></div>
				</div>
			</div>
		<!-- 	<div class="cta"><a href="Login_admin.php">ลงชื่อเข้าใช้งานผู้ดูแลระบบ</a></div> -->
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
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //top-brands -->


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

 <script type="text/javascript">
	function confirm(){
	
			alert('ยืนยันการบันทึก');
		
	}				  	
					  	
					  </script>
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
