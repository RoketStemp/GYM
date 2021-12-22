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
		<div class="container bg-white mt-3">
			<div class="row">
				<div class="col-md-12">
					<div class="single_class-left">
						<div class="singe_desc">
							<blockquote class="blockquote text-center">
								<p class="mb-0">Головне завдання бойових мистецтв - виховання людини. Якщо використовувати їх правильно, можна отримати мудрого керівника, який бачить крізь туман і розуміє волю богів. Бойові мистецтва служать не тільки військовим цілям.</p>
								<footer class="blockquote-footer mt-2">Ребекка Куанг</footer>
							</blockquote>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h1 class="text-center">Бокс</h1>
					<h2 class="text-center my-3">Тренера</h2>
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<img src="https://i.pinimg.com/originals/04/25/c7/0425c74bf45f9827c0dd1c8cdd15a982.jpg" class="card-img-top" alt="...">

								<div class="card-body">
									<h4 class="card-title text-center" style="font-weight: bold;">Корольов Микола Володимирович</h4>
									<p class="card-text">Вийграв чемпіонат европи у піввіжкій вазі в 2009р.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<img src="https://ireland.apollo.olxcdn.com/v1/files/bnd5zek0dnau3-UA/image;s=644x461" style="height: 260px;" alt="...">
								<div class="card-body">
									<h4 class="card-title text-center" style="font-weight: bold;">Мішутін Валентин Ігорович</h4>
									<p class="card-text">Срібна медаль першості Кубка Світу 2010р.</p>
								</div>
							</div>
						</div>
					</div>
					<p class="my-3" style="text-align: justify;">У нашому клубі можна займатися боксом хлопчикам і дівчаткам з 6 років. Є можливість займатися дорослим в готельних групах та індивідуально. Зміцнити дух і тіло можна тренуючись тричі на тиждень, якщо ж спортсмен хоче виступати на змаганнях і домагатися високих результатів, то потрібно не пропускати тренування з боксу і займатися частіше. Так само при бажанні можна тренуватися боксом вранці, сформувавшись в мінігрупах або один на один з тренером. Такі тренування допомагають підбадьоритися і провести весь день в активному стані. Також можна скористатися послугою спаринг-партнера, якщо підібрати обоюдноудобное час.</p>
				</div>
				<div class="col-md-6">
				<h1 class="text-center">Боротьба</h1>
				<h2 class="text-center my-3">Тренера</h2>
				<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<img src="http://rs.img.com.ua/crop?v2=1&w=600&h=0&url=http%3A%2F%2Fsport.img.com.ua%2Fb%2Forig%2Fc%2Fa8%2F64b7ac67bf07147c853224eee1213a8c.jpg" class="card-img-top" style="height: 260px;"alt="...">

								<div class="card-body">
									<h4 class="card-title text-center" style="font-weight: bold;">Пилиенко Василь Іванович</h4>
									<p class="card-text">Чемпіон світу з греко-римської боротби в 2000р.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<img src="https://sportdonoda.gov.ua/_img/news/f1b548b130abae59/images/Khotsyanivskyi_Oleksandr.jpg" style="height: 260px;" alt="...">
								<div class="card-body">
									<h4 class="card-title text-center" style="font-weight: bold;">Цитченко Олександр Леонідович</h4>
									<p class="card-text">Бронзовий призер ЧС з вільної боротьби 2008р.</p>
								</div>
							</div>
						</div>
					</div>
					<p class="my-3" style="text-align: justify;">Греко-римська боротьба перебуває на перетині багатьох видів спорту, тому що вимагає від спортсмена атлетично розвиненого тіла. В програму греко-римської боротьби входить розвиток сили м'язів, що досягається вправами, взятими з важкої атлетики: жими штанги лежачи та стоячи, присідання і ін .; роботою на снарядах: бруси, перекладина, інші силові тренування: наприклад, віджимання, робота зі джгутом... Для греко-римської боротьби потрібні гнучкість, в тому числі і для суглобів, для цього розучуються елементи акробатики, такі як сальто вперед та назад, перекиди і ін . Витривалість, дихальну та серцево-судинну системи тренує біг на довгі дистанції, рухливі ігри..</p>
			</div>
			</div>
			
		</div>
	</div>
</div>
</div>
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
