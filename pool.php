<?php 
session_start();
require_once 'db.php';

if (isset($_POST['add'])) {
	mysqli_query($link, "INSERT INTO visit VALUES(NULL, '{$_POST['name']}','{$_POST['email']}', '{$_POST['spec']}', '{$_POST['time']}','{$_POST['date']}')");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Адреналін</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/pool.css" type="text/css" rel="stylesheet" media="all">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<!-- grid-slider -->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<!-- //grid-slider -->
<!---calender-style---->
<link rel="stylesheet" href="css/jquery-ui.css" />

	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Custom Theme files -->
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script> 
	<script src="js/modernizr.custom.js"></script>
	<!-- //js -->
	<!-- start-smoth-scrolling-->
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
	<!--//end-smoth-scrolling-->
	<!--menu js-->
	<script type="text/javascript" src="js/flexy-menu.js"></script>
	<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400, indicator: true});});</script>
	<!--//menu js-->
</head>
<style>
	body{
		font-family: 'Roboto-Regular' !important;
	}
	.act{
		color:#ED1C24!important;
	}
	.fang:hover{
		color:#ED1C24!important;
		box-shadow: rgba(0, 0, 0, 1) 0px 5px 15px;
	}
	.fang{
		box-shadow: rgba(0, 0, 0, 0.5) 0px 5px 15px;
	}
	.nav-item{
		font-weight: bold;
		font-size: 1.2em;
	}
	.hov:hover{
		color:#ED1C24!important;
	}
	.dropdown-item:hover{
		color: #ED1C24!important;
		background-color: #212529;
	}
	.navbar-nav > li > a {
		padding-top: 15px;
		padding-bottom: 2px;
	}
</style>
<body>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form method="POST">
				<div class="modal-content">
					<div class="modal-header bg-dark text-white">
						<h5 class="modal-title" id="exampleModalLabel" style="text-align: center!important;width:100%;">Запис на тренування</h5>
					</div>
					<div class="modal-body bg-dark text-white">
						<?php 
						$user = mysqli_query($link, "SELECT * FROM users WHERE login='{$_SESSION['username']}'");
						$u= mysqli_fetch_row($user);
					?>
					<div class="modal-body bg-dark text-white">
						<input type="text" <?php echo "value='{$u[1]}'"; ?> name="name" class="form-control" placeholder="Прізвище Ім'я По батькові" aria-label="Username" aria-describedby="basic-addon1"/>
						<input type="email" name="email" <?php echo "value='{$u[5]}'"; ?> class="form-control mt-3" placeholder="Телефон" aria-label="Phone" aria-describedby="basic-addon1"/>
						<input type="date" name="date" class="form-control my-3 pb-2" style="line-height: 14px;" />
						<input type="time" name="time" class="form-control my-3 pb-2" style="line-height: 14px;" min="16:00" max="22:00" value="16:00"/>
						<div class="form-group my-3 ml-3 text-center">
							<select class="form-control name='spec' col-sm-10" id="inputGroupSelect01" name='spec'>
								<option selected='true'>Тренування</option>
								<?php 
								$spec = mysqli_query($link, "SELECT * FROM spec");
								while ($row=mysqli_fetch_array($spec)) {
									echo "<option value='$row[0]'>$row[1]</option>";
								}
								?>
							</select>
						</div>

					</div>
					<div class="modal-footer bg-dark text-white">
						<button type="button" class="btn btn-light" data-dismiss="modal">Закрити</button>
						<button id='guest' type="submit" class="btn text-white" name="add" style="background-color: #ED1C24!important;">Записатись</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<!--banner-->
<div class="banner">	
	<script src="js/responsiveslides.min.js"></script>
	<script>  
		$(function () {
			$("#slider").responsiveSlides({
				auto: true,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				pager: true,
			});
		});
	</script>
	<nav class="navbar navbar-expand-lg" style="padding: 4% 0 0 10%">
		<div class="container" style="background-color: rgba(0, 0, 0,0.8)">
			<a class="navbar-brand text-white" href="index.php" style="font-size: 2.63em;padding: 15px 40px!important;">Адре<span style="color:#ED1C24">налин</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" style="padding-right: 0px!important;" id="navbarNavDropdown">
				<ul class="navbar-nav" style="font-size: 1.1em;">
					<li class="nav-item active" style="margin-right:7%;">
						<a class="nav-link text-white hov" href="index.php">Головна</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link act dropdown-toggle text-white hov px-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Тренування
						</a>
						<div class="dropdown-menu bg-dark text-center" style="font-size: .8em" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item text-white" href="calculator.php">Калькулятор ваги</a>
							<a class="dropdown-item text-white" href="pool.php">Басейн</a>
							<a class="dropdown-item text-white" href="gym.php">Тренажерний зал</a>
							<a class="dropdown-item text-white" href="fight.php">Эдиноборства</a>
							<a class="dropdown-item text-white" href="shedule.php">Розклад</a>
						</div>
					</li>
					<li class="nav-item" style="margin-left:7%;">
						<a class="nav-link text-white hov px-0" href="rew.php">Відгуки</a>
					</li>
					<li class="nav-item" style="margin-left:7%;">
						<a class="nav-link text-white hov" href="gallery.php">Галерея</a>
					</li>
					<li class="nav-item" style="margin-left:7%;">
						<a class="nav-link text-white hov" href="contact.php">Контакти</a>
					</li>
					<li class="nav-item" style="margin-left:7%;">
						<a class="nav-link text-white hov" href="login.php">Логін</a>
					</li>
				</ul>
			</div>
		</div>
	</nav> 
	<div class="slider">
		<div class="caption" style="left:10%;">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<li><h1 style="font-size:6.5em;">Адреналін <br>Каховка</h1></li>
					<li><h1 style="font-size:6.5em;">Розпочинай <br>Зараз</h1></li>	
					<li><h1 style="font-size:6.5em;">Всі види<br> тренування</h1></li>
				</ul>	
				<h4 style="font-size:1.75em;">Все щоб створити твоє ідеальне тіло</h4>
				<button type="button" class="btn btn-light mt-4" data-toggle="modal" data-target="#exampleModal" style="color:#ED1C24;font-weight:bold;font-size: 20px">Записатись на тренування</button>
			</div>
		</div>
	</div>			 
</div>
<!--//banner-->
	
    <div class="main">
		 <div class="border"> </div> 
		  <div class="container">
		   <div class="row single-top">
				<div class="col-md-8">
				 <div class="single_class-left">
				  <img src="https://www.goldsgym.ru/upload/medialibrary/730/73049a029180b5148d2260507737d11b.jpg" alt=""/>
				  <div class="singe_desc">
				    <p>Плавання сприяє підвищенню сили дихальних м’язів і збільшення їх тонусу, підсилює вентиляцію легенів, сприяє збільшенню життєвого об’єму легенів.Дихання плавця погоджено з рухами його кінцівок. Один цикл рухів руками як правило виконується за один вдих і видих. Так як при плаванні витрачається багато енергії, потреба в кисні зростає. Саме тому плавець прагне максимально повно використовувати кожен вдих. Більш повному видиху сприяє тиск води на грудну клітку, воно ж сприяє розвитку м’язів, які розширюють грудну клітку.</p>
				    <ul class=single_grid>
				    	<li class="grid1">
				    	  <h3 class="m_13">Тренер</h3>
				    	  <img src="https://st3.depositphotos.com/9880800/17207/i/600/depositphotos_172076068-stock-photo-trainer-with-stopwatch-at-swimming.jpg" class="img-responsive" alt=""/>
						  <h4>Гаврилюк Кирил Михайлович<br><span class="m_text"> КМС</span></h4>
						  <p>У 2017 році підготував бронзового призера чемпіонату Києва.</p>
				    	</li>
				    	<li class="grid2">
				    	   <h3 class="m_13">Переваги</h3>
				    	   <ul class="list1_class">
				    	   	 <li><a>Працює все ваше тіло</a></li>
				    	   	 <li><a>Підвищує настрій</a></li>
				    	   	 <li><a>Допомагає заспокоїтись </a></li>
				    	     <li><a>Безпечно для вагітних</a></li>
				    	     <li><a>Факел калорій</a></li>
				    	     <li><a>Покращує ваш сон</a></li>
				    	   </ul>
				    	</li>
				    	<li class="grid3">
				    	   <h3 class="m_13">Розцінки</h3>
				    	   <ul class="list2_class">
							 <li><a href="#">3 дня вправ<p class="price">$ &nbsp;&nbsp;19,90 </p></a><div class="clear"></div></li>
							 <li><a href="#">7 днів вправ<p class="price">$ &nbsp;&nbsp;15,90 </p></a><div class="clear"></div></li>
							 <li><a href="#">15 днів вправ<p class="price">$ &nbsp;&nbsp;27,90 </p></a><div class="clear"></div></li>
							 <li><a href="#">30 днів вправ<p class="price">$ &nbsp;&nbsp;45,90 </p></a><div class="clear"></div></li>
							 <li><a href="#">60 days вправ<p class="price">$ &nbsp;&nbsp;65,90 </p></a><div class="clear"></div></li>
						   </ul>
				    	</li>
				    	<div class="clear"></div>
				    </ul>
				  </div>
			     </div>
			     </div>
			     <div class="col-md-4 single_class-right">
			        <ul class="single_times">
					 	<h3>Години Роботи</h3>
					 	<li><i class="calender"> </i><span class="week_class">Понеділок</span><div class="hours_class">16:00-22:00</div>  <div class="clear"></div></li>
					 	<li><i class="calender"> </i><span class="week_class">Вівторок</span><div class="hours_class">16:00-22:00</div>  <div class="clear"></div></li>
					 	<li><i class="calender"> </i><span class="week_class">Середа</span><div class="hours_class">16:00-22:00</div>  <div class="clear"></div></li>
					 	<li><i class="calender"> </i><span class="week_class">Четверг</span><div class="hours_class">16:00-22:00</div>  <div class="clear"></div></li>
					 	<li><i class="calender"> </i><span class="week_class">П'ятниця</span><div class="hours_class">16:00-22:00</div>  <div class="clear"></div></li>
					 	<li><i class="calender"> </i><span class="week_class">Субота</span><div class="hours_class">8:00-16:00</div>  <div class="clear"></div></li>
					 	<li><i class="calender"> </i><span class="week_class">Неділя</span><div class="hours_class">8:00-16:00</div>  <div class="clear"></div></li>
					 </ul>
		         </div>
				<div class="clear"></div>
			</div>
		  </div>
	    </div>

	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>
<script type="text/javascript">
	document.getElementById('guest').onclick = function(){
		alert("Ваша заявка оброблюэться, очікуйте відповіді на пошту");
	}
	document.getElementById('first').onclick = function(){
		alert("Ваша заявка оброблюэться, очікуйте відповіді на пошту");
	}
</script>
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
		</script><script type="text/javascript">javascript:(function(){var s,i,x;x=document.getElementsByTagName('link');for(i=0;i<x.length;i++){x[i].href=x[i].href+'?'+new Date().getTime();}})();</script>

		<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/bootstrap.js"> </script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
