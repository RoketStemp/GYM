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
	<title>Андреналін</title>
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
			<a class="navbar-brand text-white" href="index.php" style="font-size: 3em;padding: 15px 40px!important;">Адре<span style="color:#ED1C24">налин</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" style="margin-left: 1%; padding-right: 0px!important;" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item" style="margin-right:7%;">
						<a class="nav-link hov text-white" href="index.php">Головна</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link act dropdown-toggle text-white hov" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

	<div class="contact">
		<div class="container" style="font-size: 1.3em;text-align: justify;">		
			<p><span style="margin-left: 50px;">Кожна<span> людина яка хоче мати гарне тіло повинна слідкувати за кількістю калорій яку вона їсть на день. Якщо людина бажає скинути вагу або навпаки набрати її це можна зробити лище завдяки правильному харчуванню. Фізичні тренування лище прискорюють цей процес. Данний калькулятор був створенний на основі формули "Міффліна - Сан-Жеора".</p>
			<p><span style="margin-left: 50px;">У<span> 1919 році американський вчений Френсіс Бенедикт і його співавтор Джеймс Харріс опублікували наукову працю про базальном метаболізмі людини - кількості енергії, яка необхідна організму в стані спокою для нормального функціонування. У цій праці ними була приведена формула розрахунку кількості калорій, яка враховувала вага, зріст, вік і стать людини.</p>		
			<div class=" contact-form" style="margin-top: 3em;margin-bottom: 4em;">
				<h3 class="">Калькулятор ваги</h3>
				<form method="POST">
					<div class="col-md-6 form-grids">
						<input type="text" placeholder="Вага" class="mb-3" name='weight' style="border-radius: 0; border:1px solid #8D8D8D;background:none;color:#8D8D8D;height:44px;line-height: 20px;cursor: pointer;padding: 10px;">
						<div class="form-group mb-3 ml-3 text-center">
							<select class="form-control col-sm-10" id="inputGroupSelect01" name='spec' style="border-radius: 0; border:1px solid #8D8D8D;background:none;color:#8D8D8D;height:44px;line-height: 20px;cursor: pointer;padding: 10px;">
								<option value="5">Чоловік</option>
								<option value="161">Жінка</option>
							</select>
						</div>
						<input type="text" placeholder="Рост" class="mt-3" name="height" style="border-radius: 0; border:1px solid #8D8D8D;background:none;color:#8D8D8D;height:44px;line-height: 20px;cursor: pointer;padding: 10px;">
					</div>
					<div class="col-md-6 form-grids">
						<input type="text" placeholder="Вік" class="mb-3" name="age" style="border-radius: 0; border:1px solid #8D8D8D;background:none;color:#8D8D8D;height:44px;line-height: 20px;cursor: pointer;padding: 10px;">
						<div class="form-group mb-3 ml-3 text-center">
							<select class="form-control col-sm-10" id="inputGroupSelect01" name='phys' style="border-radius: 0; border:1px solid #8D8D8D;background:none;color:#8D8D8D;height:44px;line-height: 20px;cursor: pointer;padding: 10px;">
								<option value="1.2">Немає фізичного навантаження</option>
								<option value="1.375">Спорт 3 рази на тиждень</option>
								<option value="1.55">Спорт 5 разів на тиждень</option>
								<option value="1.55">Інтенсивні тренування 5 разів на тиждень</option>
								<option value="1.725">Щоденні заняття спортом</option>
								<option value="1.9">Інтенсивні заняння сортом 2 рази на день</option>
								<option value="1.9">Фізичний труд з щоденним інтенсивним заняттям спортом</option>
							</select>
						</div>
						<input type="submit" value="Ввести" class="mt-3" name="calc" style="font-size: 0.9em">
					</div>
					<div class="clearfix"> </div>					
				</form>
			</div>
			<div>
				<?php 
				$sum=0;
				if (isset($_POST['calc'])) {
					if ($_POST['spec']=='161') {
						echo "<p class='mb-3'>Тим, хто планує повільну, а значить, не небезпечну для здоров'я втрату ваги, отриманий результат потрібно зменшити приблизно на 250 ккал. Якщо ж ви плануєте худнути швидше, знижуйте 'калораж' на 500 одиниць. Але пам'ятайте, що не можна знижувати кількість споживаних калорій нижче 1 200 для жінок і 1 400 для чоловіків. Для того щоб набрати вагу необхідно збільшити результат на 300 ккал та тренуатись хочаб 3 рази на тиждень.";
						echo "<p class='mb-3'>Кількість калорій необхідня для організма на день: <b>".(10*intval($_POST['weight'])+(6.25*intval($_POST['height']))-(5*intval($_POST['age']))-161)."</b></p>";
						echo "<p class='mb-3'>Для повільного збросу ваги ваша дення норма калорій: <b>".(10*intval($_POST['weight'])+(6.25*intval($_POST['height']))-(5*intval($_POST['age']))-161-250)."</b></p>";
						echo "<p class='mb-3'>Для швидкого збросу ваги ваша дення норма калорій не менша ніж: <b>".(10*intval($_POST['weight'])+(6.25*intval($_POST['height']))-(5*intval($_POST['age']))-161-1000)."</b></p>";
						echo "<p>Для набору ваги ваша дення норма калорій: <b>".(10*intval($_POST['weight'])+(6.25*intval($_POST['height']))-(5*intval($_POST['age']))-161+300)."</b></p>";
					}else{
						echo "<p class='mb-3'>Тим, хто планує повільну, а значить, не небезпечну для здоров'я втрату ваги, отриманий результат потрібно зменшити приблизно на 250 ккал. Якщо ж ви плануєте худнути швидше, знижуйте 'калораж' на 500 одиниць. Але пам'ятайте, що не можна знижувати кількість споживаних калорій нижче 1 200 для жінок і 1 400 для чоловіків. Для того щоб набрати вагу необхідно збільшити результат на 300 ккал та тренуатись хочаб 3 рази на тиждень.";
						echo "<p class='mb-3'>Кількість калорій необхідня для організма на день: ".(10*intval($_POST['weight'])+(6.25*intval($_POST['height']))-(5*intval($_POST['age']))+5)."</p>";
						echo "<p class='mb-3'>Для повільного збросу ваги ваша дення норма калорій: ".(10*intval($_POST['weight'])+(6.25*intval($_POST['height']))-(5*intval($_POST['age']))+5-250)."</p>";
						echo "<p class='mb-3'>Для швидкого збросу ваги ваша дення норма калорій не менша ніж: ".(10*intval($_POST['weight'])+(6.25*intval($_POST['height']))-(5*intval($_POST['age']))+5-1000)."</p>";
						echo "<p>Для набору ваги ваша дення норма калорій: ".(10*intval($_POST['weight'])+(6.25*intval($_POST['height']))-(5*intval($_POST['age']))+5+300)."</p>";
					}
				}
				?>
			</div>
		</div>		
	</div>
	<!--//events-->
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