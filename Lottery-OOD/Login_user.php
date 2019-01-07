<?php  

session_start();
if(isset($_POST["Username"])){
$_SESSION["id_member"] = $_POST["Username"];
     $_SESSION["strid"] = ' ';
	$_SESSION["strd"] = ' ';
	$_SESSION["q"] = 0 ;
}
session_write_close();

 include 'class/member.class.php';  
 
 $member = new Member();  
 $message = '';  
 if(isset($_POST["login"]))  
 {  
 	$id = $_POST["Username"];
 	$pw = $_POST["Password"];


     $t =  $member->loginMember($id,$pw);


     if($t==1){
     	 echo '<script>alert("ยืนยันการสมัครสมาชิก")</script>'; 
     	header("location:User.php");  
     }
     else {  
              $message = "รหัสผ่านผิด หรือ ไม่มีผู้ใช้งานนี้";  
           }  
                
           
 }  



             
 if(isset($_POST["regis"]))  
 {  

 	$id = $_POST["username"];
 	$pw = $_POST["password"];
 	$repw = $_POST["repassword"];
 	$fn = $_POST["fName"];
 	$ln  = $_POST["lName"];
 	$phone = $_POST["phone"];
 	$address  = $_POST["address"];
 	if($repw == $pw){
 		$member->setMember($id,$pw,$fn,$ln,$phone,$address) ;
           $re =  $member->register() ;
    
            if($re == 1){
     	 echo '<script>alert("ยืนยันการสมัครสมาชิก")</script>'; 
   
           }
           else {  
              echo '<script>alert("ชื่อผู้ใช้งานนี้มีผู้ใช้แล้ว")</script>';
           } 
     
  	} else{
        echo '<script>alert("รหัสผ่านไม่ตรงกัน")</script>';
          


      }
    
 
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

		<div class="w3_login">
			<center><h3>ลงชื่อเข้าใช้&สร้างบัญชีลูกค้า</h3></center>

			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">สร้างบัญชีผู้ใช้</div>
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

						 <div class="group">
                            <label for="user" class="label">ชื่อผู้ใช้งาน</label>
                            <!-- validate -->
                            <input id="username" type="text" name="Username" class="input" pattern=".{3,}" required title="ชื่อผู้ใช้งาน" placeholder="ชื่อผู้ใช้งาน"
                            oninvalid="setCustomValidity('กรุณากรอกชื่อผู้ใช้งานให้ถูกต้อง')"
                            onchange="try{setCustomValidity('')}catch(e){}"
                            >
                        </div>
                        <div class="group">
                       
                            <input id="password" name="Password" type="password" class="input" data-type="password"  pattern=".{6,}" required title="รหัสผ่าน" placeholder="รหัสผ่าน"
                            oninvalid="setCustomValidity('กรุณากรอกรหัสผ่านให้ถูกต้อง')"
                            onchange="try{setCustomValidity('')}catch(e){}"
                           >
                        </div>


					
					  <input type="submit" value="เข้าสู่ระบบ" name="login">
					</form>
				  </div>
				  <div class="form">
					<h2>สร้างบัญชีผู้ใช้ใหม่</h2>
					<form action="#" method="post">

					 <div class="group">
                      
                            <input id="fName" name="fName" type="text" class="input" 
                              title="ชื่อ" placeholder="ชื่อ" maxlength="32"  minlength="2" required>
                                        
                        </div>
                         <div class="group">
                      
                            <input id="lName" name="lName" type="text" class="input" 
                              title="นามสกุล" placeholder="นามสกุล" maxlength="32"  minlength="2" required>
                                        
                        </div>
                         <div class="group">
                      
                            <input id="username" name="username" type="text" class="input" 
                              title="ชื่อผู้ใช้งาน" placeholder="ชื่อผู้ใช้งาน" maxlength="32"  minlength="6" required>
                                        
                        </div>
                            <div class="group">
                      
                            <input id="repassword" name="repassword" type="password" class="input" data-type="M_password"
                              title="รหัสผ่าน" placeholder="  รหัสผ่าน" maxlength="50"  minlength="6" required>
                                        
                        </div>


					 <!-- <input type="text" name="fName" placeholder="ชื่อ" required=" "> -->
				

					  <div class="group">
              
                            <input id="password" name="password" type="password" class="input" data-type="M_password"
                              title="ยืนยันรหัสผ่าน" placeholder=" ยืนยันรหัสผ่าน" maxlength="50"  minlength="6" required>
                                        
                        </div>
                    

                        <div class="group">
                             
                                 <input id="phone" name="phone" type="text" class="input" title="เบอร์โทรศัพท์" placeholder="เบอร์โทรศัพท์" minlength="10" maxlength="10" required>
                                            
                                   </div>



					  
					  <!-- <input type="text" name="phone" placeholder="เบอร์โทรศัพท์" required=" "> -->
					  
					  <input type="text" name="address" placeholder="ที่อยู่"  required=" ">
					
					  <input type="submit" value="สมัครสมาชิก" name="regis">
					</form>
				  </div>

				   <div class="cta"><a href="Login_admin.php">ลงชื่อเข้าใช้งานผู้ดูแลระบบ</a></div>
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

<script type="text/javascript">
function compare_valid(field, field2) {
    fld_val = document.getElementById(field).value;
    fld2_val = document.getElementById(field2).value;
    if (fld_val == fld2_val) {
     	 alert("ยืนยันการสมัครสมาชิก"); 
   
    } else {
        update_css_class(field2, 1);
        p_valid_r = 0;
    }
    return p_valid_r;
}
	

</script>

</body>
</html>