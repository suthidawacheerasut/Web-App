<?php
 session_start();

 include 'class/ordering.class.php'; 
 include 'class/lottery.class.php'; 


// $sumary = new ordering;
// $sumary->saleSumary();
 
?>

<!DOCTYPE html>
<html>
<head>
<title>รายงาน</title>
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

  <link rel="stylesheet" href="css/buttons.css">
    <script type="text/javascript" src="js/buttons.js"></script>
    <script src="http://code.jquery.com/jquery.min.js"></script>
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
			<a href="#"><?php echo 'ยินดีต้อนรับ'.$_SESSION["idadmin"];?></a>
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
			
					
							<!-- <div class="w3l_header_right"> -->
	</ul>
		</div>  

				
				</ul>
			</div>
		<!-- 	<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+092) 034 1814</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">stdwcrs@gmail.com</a></li>
				</ul>
			</div> -->
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
			<!-- <h3>ลอตเตอรี่ทั้งหมด</h3> -->
			<div class="agile_top_brands_grids">
			<form name="from" method="POST" action="#">

<center><select name="reports" class="btn btn-default">
<option value="choice" style="background-color: #F2A4F2;color: #000000;">รายงาน</option>
  <option value="รายงานสต็อก" name="stock" style="background-color: #F2A4F2;color: #000000;">รายงานสต็อก</option>
  <option value="รายงานสรุปรายได้" name="sumary" style="background-color: #F2A4F2;color: #000000;">รายงานสรุปรายได้</option></select>
  &nbsp;&nbsp;<input type="submit"  value="ดูรายงาน" name = "report" class="button button-pill button-flat-primary">
      


  
</select>
</form>
				
		

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<?php
if(isset($_POST['report'] )){
	
	// echo $_POST['reports'];
 	if($_POST['reports']=='รายงานสต็อก'){
 		$lottery = new lottery;
 		$data = $lottery->viewStock('bydate',' ');

?>
	<form name="from" method="POST" action="#">
		<table class="table table-hover" border = 1 align = 'center'>
		

	
						
 <tr align = 'center'> <td class="danger">วันที่ออกรางวัล(ปี/เดือน/วัน)</td>
 <td class="danger">จำนวนนำเข้า(ฉบับ)</td><td class="danger">คงเหลือ(ฉบับ)</td></tr>


<?php $sum = 0;
		$remain = 0;
 		foreach($data as $read){
 			
											
				
echo "<tr align = 'center'> <td class='warning'>
	<a href='Sumaryreport2.php?id=".$read["issue_date"]."' target = '_blank'>".$read["issue_date"]." </a></td>
 <td class='warning'>".(30*$read["count_"])."</td><td class='warning'>".$read["remain"]."</td></tr> ";

 	
 	$remain = $remain + $read['remain'];
 	$sum = $sum + $read['count_'];


  }  

	$sum = $sum * 30;
  ?> 
  <tr align = "center"><td  >จำนวนทั้งหมด</td>  <td><?php echo  $sum; ?></td> <td><?php echo $remain; ?></td></tr>



  </table> <?php
 		
 	}else if($_POST['reports']=='รายงานสรุปรายได้'){
 		
		 		$sumary = new ordering;
				$data =  $sumary->saleSumary();

?>
		<table class="table table-hover" border = 1 >
		

	
						
 		<tr align = 'center'> <td class="danger" >วันที่ออกรางวัล(ปี/เดือน/วัน)</td><td class="danger">ต้นทุน(บาท)</td>
 		<td class="danger">รายได้(บาท)</td><td class="danger">กำไร(บาท)</td></tr>


<?php
 		foreach($data as $read){


 			$totalq =  $read['totalq'] * 70.40;
 			$profit = $read['totalp'] -  $totalq;
 		

											
	
echo "<tr align = 'center'> <td class='warning'>".$read["date_"]."</td><td class='warning'>".$totalq."</td><td class='warning'>".$read["totalp"]."</td>
 <td class='warning'>".$profit."</td></tr> "; }  

  ?> </table> </form><?php
 	}
 }


 
 ?>
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

