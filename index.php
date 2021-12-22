<?php 
session_start();
require_once 'db.php';

if (isset($_POST['add'])) {
	mysqli_query($link, "INSERT INTO visit VALUES(NULL, '{$_POST['name']}','{$_POST['email']}', '{$_POST['spec']}', '{$_POST['time']}','{$_POST['date']}')");
}

if (isset($_POST['s'])) {
	mysqli_query($link, "INSERT INTO first_visit VALUES(NULL, '{$_POST['n']}', '{$_POST['p']}' , '{$_POST['e']}')");
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
		font-size: 1.5em;
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
			<a class="navbar-brand text-white" href="index.php" style="font-size: 3em;padding: 15px 40px!important;">Адре<span style="color:#ED1C24">налин</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" style="margin-left: 1%; padding-right: 0px!important;" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item active" style="margin-right:7%;">
						<a class="nav-link act hov" href="index.php">Головна</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white hov" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
						<a class="nav-link text-white hov" href="rew.php">Відгуки</a>
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
					<li><h1 style="font-size:7.5em;">Адреналін <br>Каховка</h1></li>
					<li><h1 style="font-size:7.5em;">Розпочинай <br>Зараз</h1></li>	
					<li><h1 style="font-size:7.5em;">Всі види<br> тренування</h1></li>
				</ul>	
				<h4 style="font-size:2em;">Все щоб створити твоє ідеальне тіло</h4>
				<button type="button" class="btn btn-light mt-5" data-toggle="modal" data-target="#exampleModal" style="color:#ED1C24;font-weight:bold;font-size: 20px">Записатись на тренування</button>
			</div>
		</div>
	</div>			 
</div>
<!--//banner-->

<div class="row mx-4 my-4 d-flex justify-content-center">
	<div style="width:342px!important;height: 350px!important; position: relative;">
		<div class="card" style="top:0;left: 0;">
			<div class="card-body" style="height: 350px!important;">
				<h5 class="card-title text-center" style="top:4%;position: absolute; left: 47%;"><img src="https://skyfitness.ua/wp-content/uploads/2019/03/gym.png.pagespeed.ce.TYWmhLu9X6.png" alt="Тренажерный зал"></h5>
				<h2 class="card-text text-center my-3" style="font-weight: bold;top:12%;position: absolute; left: 7%;">ТРЕНАЖЕРНИЙ ЗАЛ</h2>
				<h3 class="card-text text-center my-3" style="top:23%;position: absolute;">НАЙКРАЩЕ МІСЦЕ ДЛЯ ВДОСКОНАЛЕННЯ СВОГО ТІЛА</h3>
				<h4 class="card-text text-center my-4" style="top:46%;position: absolute;">Ми створили сучасний тренажерний зал, в якому є все необхідне для эфективних та комфортних тренувань с новітнім обладнанням</h4>
				<a href="#" class="fang btn btn-dark my-3" style="margin-left: 27%!important;top:81%;position: absolute;">Дізнатись більше</a>
			</div>
		</div>
	</div>
	<div style="width:342px!important;height: 350px!important; position: relative;">
		<div class="card">
			<div class="card-body" style="height: 350px!important;">
				<h5 class="card-title text-center" style="top:4%;position: absolute; left: 47%;"><img src="https://skyfitness.ua/wp-content/uploads/2019/03/swimming.png.pagespeed.ce.ApdLLB7UNp.png" alt="Бассейн"></h5>
				<h2 class="card-text text-center my-3" style="font-weight: bold;top:12%;position: absolute; left: 30%;">БАССЕЙН</h2>
				<h3 class="card-text text-center my-3" style="top:23%;position: absolute;">ВИ НЕОДМІННО ПОВИННІ ЗВЕРНУТИ УВАГУ НА ВОДНІ ВПРАВИ</h3>
				<h4 class="card-text text-center mt-3 mb-3" style="top:47%;position: absolute;">Вправи в воді мають ряд переваг, які все оцінили більшість наших клієнтів. Наш бассейн - це 25м задоволення та заряду енергії в чистій воді</h4>
				<a href="pool.php" class="fang btn btn-dark mb-3" style="margin-left: 27%!important;top:84%;position: absolute;">Дізнатись більше</a>
			</div>
		</div>
	</div>
	<div style="width:342px!important;height: 350px!important; position: relative;">
		<div class="card">
			<div class="card-body" style="height: 350px!important;">
				<h5 class="card-title text-center" style="top:4%;position: absolute; left: 47%;"><img src="https://skyfitness.ua/wp-content/uploads/2019/03/fighting.png.pagespeed.ce.7Z0zAZjVZ0.png" alt="Единоборства"></h5>
				<h2 class="card-text text-center my-3" style="font-weight: bold;top:12%;position: absolute; left: 14%;">ЄДИНОБОРСТВА</h2>
				<h3 class="card-text text-center mt-3 mb-5" style="top:23%;position: absolute;">ЦЕ УНІВЕРСАЛЬНИЙ ВИД ТРЕНУВАНЬ</h3>
				<h4 class="card-text text-center mt-5 mb-5" style="top:41%;position: absolute;">Спортивне єдиноборство являє собою комплексне тренування, задача якої — навчання ведення боя й розуміння філософії переможця</h4>
				<a href="#" class="fang btn btn-dark mb-3 mt-2" style="margin-left: 27%!important;top:83%;position: absolute;">Дізнатись більше</a>
			</div>
		</div>
	</div>
</div>

<div style="overflow: hidden; width: 100%; height: 200px;position: relative;">
	<img src="https://skyfitness.ua/wp-content/uploads/2019/03/background-girl-dumbbells.jpg" style="object-fit: cover;width: 100%;z-index: -100;">
	<div class="text-white col-sm-8 text-center" style="position: absolute;z-index: 999;top: 20%;left:16.5%">
		<h2>КЛУБНА КАРТКА</h2>
		<h4 class="mt-4">ВАША ІМЕННА КЛУБНА КАРТКА ВІДКРИВАЄ ДОСТУП ДО ВСІХ ЗОН КЛУБА ТА РОЗШИРЮЄ МОЖЛИВОСТІ ДЛЯ РІЗНОМАНІТНИХ ТРЕНУВАНЬ КОЖЕН ДЕНЬ</h4>
		<a href="card.php" class="btn text-white mt-4" style="background-color: #ED1C24!important;">Оформити</a>
	</div>
</div>
<div class="container my-4">
	<form method="POST">
		<div class="row text-center">
			<h2 class="mb-3">ГОСТЬОВИЙ ВІЗИТ</h2>
			<h4>Перший гостьовий візит до клубу Адреналін безкоштовний</h4>
			<div class="row mx-auto">
				<div class="col-md-5 mx-auto my-4 d-block">
					<input type="text" name="n" class="form-control" placeholder="Прізвище Ім'я По батькові" aria-label="Username" aria-describedby="basic-addon1" style="font-size: 1.2em;">
				</div>
			</div>
			<div class="row mx-auto">
				<div class="col-md-5 mx-auto">
					<div class="col-sm-5 px-0 float-left" style="margin-right: 70px!important;">
						<input type="email" name="e" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Електронна Пошта" style="font-size: 1.2em;">
					</div>
					<div class="col-sm-5 px-0">
						<input type="text" name="p" class="form-control" placeholder="Телефон" aria-label="Username" aria-describedby="basic-addon1" style="font-size: 1.2em;">
					</div>
				</div>
			</div>
			<div class="row mx-auto mt-4">
				<div class="col-md-5 mx-auto">
					<button type="submit" id='first' name="s" class="btn text-white" style="font-size: 1.2em;width:100%;height:100%;background-color: #ED1C24!important;">Відправити заявку</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!--banner-bottom-->
<div class="bnr-about">
	<div class="bnr-about-left mx-0">	
		<h3 style="font-size: 2em!important">Тренажерний зал – один з ефективних способів зміцнити здоров'я, адже м'язове навантаження нормалізує обмін речовин і роботу гормональної системи.</h3>
		<ul style="margin-top: 5em!important;">
			<li>
				<img src="images/icon3.png" alt=""/>
				<p>Тренування дарує самопочуття</p>
			</li>
			<li>
				<img src="images/icon4.png" alt=""/>
				<p>Новітні, зручні тренажери</p>
			</li>
			<li>
				<img src="images/icon5.png" alt=""/>
				<p>Все для вашого розвитку</p>
			</li>
		</ul>
	</div>
	<div class="bnr-about-right float-right">	
		<img src="images/img1.jpg" alt="" />
	</div>
	<div class="clearfix"></div>
</div>
<!--//banner-bottom-->
<!--events-->
<script type="text/javascript">
	document.getElementById('guest').onclick = function(){
		alert("Ваша заявка оброблюэться, очікуйте відповіді на пошту");
	}
	document.getElementById('first').onclick = function(){
		alert("Ваша заявка оброблюэться, очікуйте відповіді на пошту");
	}
</script>
<!--//events-->
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
		<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/bootstrap.js"> </script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

	</body>
	</html>