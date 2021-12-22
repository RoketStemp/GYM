<?php 
session_start();
require_once 'db.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Jim Guide a Sports Category Flat bootstrap Responsive website Template | Home :: w3layouts</title>
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
       	<div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Всі</span></li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Бокс</span></li>
				  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Боротьба</span></li>
				  <div class="clear"></div>
			  </ul>				  	 
				<div class="resp-tabs-container">
				      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						<div class="facts">
							<ul class="tab-left">
								<table class="timetable">
				<thead>
					<tr>
						<th></th>	<th>Понеділок</th>	<th>Вівторок</th>	<th>Середа</th>	<th>Четверг</th>	<th>П'ятниця</th>	<th>Субота</th>	<th>Неділя</th>	</tr>
				</thead>
				<tbody><tr class="row_1 row_gray">
						<td>
							05.00 - 06.00
						</td><td class="event"><a href="#" title="Боротьба">Боротьба</a>05.00 - 06.00</td><td class="event"><a href="#" title="Боротьба">Боротьба</a>05.00 - 06.00</td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_2">
						<td>
							06.00 - 07.00
						</td><td class="event"><a href="#" title="Бокс">Бокс</a>06.00 - 07.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>06.00 - 07.00</td><td class="event" rowspan="3"><a href="#">Бокс</a>06.00 - 08.30<br><br><a href="#" title="Боротьба">Боротьба</a>06.00 - 08.30</td><td class="event" rowspan="3"><a href="#" title="Бокс">Бокс</a>06.00 - 08.30<br><br><a href="#" title="Боротьба">Боротьба</a>06.00 - 08.30</td><td class="event" rowspan="3"><a href="#" title="Бокс">Бокс</a>06.00 - 08.30<br><br><a href="#" title="Боротьба">Боротьба</a>06.00 - 08.30</td><td></td><td></td></tr><tr class="row_3 row_gray">
						<td>
							07.00 - 08.00
						</td><td class="event"><a href="#" title="Боротьба">Боротьба</a>07.00 - 08.00</td><td class="event"><a href="#" title="Боротьба">Боротьба</a>07.00 - 08.00</td><td></td><td></td></tr><tr class="row_4">
						<td>
							08.00 - 09.00
						</td><td></td><td></td><td class="event" rowspan="2"><a href="#" title="Бокс">Бокс</a>08.00 - 09.30</td><td class="event" rowspan="2"><a href="#" title="Бокс">Бокс</a>08.00 - 09.30</td></tr><tr class="row_5 row_gray">
						<td>
							09.00 - 10.00
						</td><td class="event" rowspan="3"><a href="#" title="Бокс">Бокс</a>09.00 - 11.25</td><td class="event" rowspan="3"><a href="#" title="Бокс">Бокс</a>09.00 - 11.25</td><td></td><td class="event"><a href="#" title="Бокс">Бокс</a>09.00 - 10.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>09.00 - 10.00</td></tr><tr class="row_6">
						<td>
							10.00 - 11.00
						</td><td></td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>10.00 - 11.30</td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>10.00 - 11.30</td><td class="event"><a href="#" title="Бокс">Бокс</a>10.00 - 11.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>10.00 - 11.00</td></tr><tr class="row_7 row_gray">
						<td>
							11.00 - 12.00
						</td><td></td><td class="event"><a href="#" title="Бокс">Бокс</a>11.00 - 12.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>11.00 - 12.00</td></tr><tr class="row_8">
						<td>
							12.00 - 13.00
						</td><td></td><td></td><td class="event"><a href="#" title="Бокс">Бокс</a>12.00 - 13.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>12.00 - 13.00</td><td class="event" rowspan="4"><a href="#" title="Боротьба">Боротьба</a>12.00 - 15.45</td><td class="event" rowspan="4"><a href="#" title="Бокс">Бокс</a>12.00 - 13.00<br><br><a href="#" title="Боротьба">Боротьба</a>12.00 - 15.45<br><br><a href="#" title="Боротьба">Боротьба</a>14.00 - 16.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>12.00 - 13.00</td></tr><tr class="row_9 row_gray">
						<td>
							13.00 - 14.00
						</td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_10">
						<td>
							14.00 - 15.00
						</td><td class="event" rowspan="4"><a href="#" title="Бокс">Бокс</a>14.00 - 16.15<br><br><a href="#" title="Бокс">Бокс</a>16.00 - 17.30</td><td class="event" rowspan="4"><a href="#" title="Бокс">Бокс</a>14.00 - 16.15<br><br><a href="#" title="Бокс">Бокс</a>16.00 - 17.30</td><td></td><td></td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>14.00 - 16.00</td></tr><tr class="row_11 row_gray">
						<td>
							15.00 - 16.00
						</td><td></td><td></td></tr><tr class="row_12">
						<td>
							16.00 - 17.00
						</td><td></td><td class="event" rowspan="2"><a href="#" title="Бокс">Бокс</a>16.00 - 17.30</td><td class="event" rowspan="4"><a href="#" title="Бокс">Бокс</a>16.00 - 17.30<br><br><a href="#" title="Бокс">Бокс</a>17.30 - 20.00<br><br><a href="#" title="Боротьба">Боротьба</a>18.00 - 20.00</td><td></td><td></td></tr><tr class="row_13 row_gray">
						<td>
							17.00 - 18.00
						</td><td></td><td class="event"><a href="#" title="Бокс">Бокс</a>17.00 - 18.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>17.00 - 18.00</td></tr><tr class="row_14">
						<td>
							18.00 - 19.00
						</td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>18.00 - 19.00<br><br><a href="#" title="Боротьба">Боротьба</a>18.30 - 20.00</td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>18.00 - 19.00<br><br><a href="#" title="Боротьба">Боротьба</a>18.30 - 20.00</td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>18.00 - 20.00<br><br><a href="#" title="Боротьба">Боротьба</a>18.30 - 20.00</td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>18.00 - 20.00<br><br><a href="#" title="Боротьба">Боротьба</a>18.30 - 20.00</td><td></td><td></td></tr><tr class="row_15 row_gray">
						<td>
							19.00 - 20.00
						</td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>19.00 - 20.30</td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>19.00 - 20.30</td></tr><tr class="row_16">
						<td>
							20.00 - 21.00
						</td><td></td><td></td><td></td><td></td><td></td></tr>	
				</tbody>
			   </table>
			   <div class="timetable_small">
			   	  <ul class="items_list"><h3>Понеділок</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	   <ul class="items_list"><h3>Вівторок</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	  <ul class="items_list"><h3>Середа</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	   <ul class="items_list"><h3>Thrusday</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	  <ul class="items_list"><h3>П'ятниця</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	  <ul class="items_list"><h3>Субота</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	   <ul class="items_list"><h3>Неділя</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	 </div>
			   </ul>	
			 </div>
		    </div>	
			<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
			  <div class="facts">
				<ul class="tab-left">
				  <table class="timetable">
				<thead>
					<tr>
						<th></th>	<th>Понеділок</th>	<th>Вівторок</th>	<th>Середа</th>	<th>Четверг</th>	<th>П'ятниця</th>	<th>Субота</th>	<th>Неділя</th>	</tr>
				</thead>
				<tbody><tr class="row_1 row_gray">
						<td>
							06.00 - 07.00
						</td><td class="event"><a href="#" title="Бокс">Бокс</a>06.00 - 07.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>06.00 - 07.00</td><td class="event" rowspan="3"><a href="#" title="Бокс">Бокс</a>06.00 - 08.30</td><td class="event" rowspan="3"><a href="#" title="Бокс">Бокс</a>06.00 - 08.30</td><td class="event" rowspan="3"><a href="#" title="Бокс">Бокс</a>06.00 - 08.30</td><td></td><td></td></tr><tr class="row_2">
						<td>
							07.00 - 08.00
						</td><td></td><td></td><td></td><td></td></tr><tr class="row_3 row_gray">
						<td>
							08.00 - 09.00
						</td><td></td><td></td><td></td><td></td></tr><tr class="row_4">
						<td>
							09.00 - 10.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_5 row_gray">
						<td>
							10.00 - 11.00
						</td><td></td><td></td><td></td><td></td><td></td><td class="event"><a href="#" title="Бокс">Бокс</a>10.00 - 11.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>10.00 - 11.00</td></tr><tr class="row_6">
						<td>
							11.00 - 12.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_7 row_gray">
						<td>
							12.00 - 13.00
						</td><td></td><td></td><td class="event"><a href="#" title="Бокс">Бокс</a>12.00 - 13.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>12.00 - 13.00</td><td></td><td class="event"><a href="#" title="Бокс">Бокс</a>12.00 - 13.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>12.00 - 13.00</td></tr><tr class="row_8">
						<td>
							13.00 - 14.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_9 row_gray">
						<td>
							14.00 - 15.00
						</td><td class="event" rowspan="3"><a href="#" title="Бокс">Бокс</a>14.00 - 16.15</td><td class="event" rowspan="3"><a href="#" title="Бокс">Бокс</a>14.00 - 16.15</td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_10">
						<td>
							15.00 - 16.00
						</td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_11 row_gray">
						<td>
							16.00 - 17.00
						</td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_12">
						<td>
							17.00 - 18.00
						</td><td></td><td></td><td></td><td></td><td class="event" rowspan="3"><a href="#" title="Бокс">Бокс</a>17.30 - 20.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>17.00 - 18.00</td><td class="event"><a href="#" title="Бокс">Бокс</a>17.00 - 18.00</td></tr><tr class="row_13 row_gray">
						<td>
							18.00 - 19.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_14">
						<td>
							19.00 - 20.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>	
				</tbody>
			</table>
			<div class="timetable_small">
			   	  <ul class="items_list"><h3>Понеділок</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	   <ul class="items_list"><h3>Вівторок</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	  <ul class="items_list"><h3>Середа</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	   <ul class="items_list"><h3>Thrusday</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	  <ul class="items_list"><h3>П'ятниця</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	  <ul class="items_list"><h3>Субота</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	   <ul class="items_list"><h3>Неділя</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	 </div>
			  </ul>	
			 </div>
			</div>				        					 
		    <div class="tab-3 resp-tab-content" aria-labelledby="tab_item-2">
			   <div class="facts">
			     <ul class="tab-left">
					<table class="timetable">
				<thead>
					<tr>
						<th></th>	<th>Понеділок</th>	<th>Вівторок</th>	<th>Середа</th>	<th>Четверг</th>	<th>П'ятниця</th>	<th>Субота</th>	<th>Неділя</th>	</tr>
				</thead>
				<tbody><tr class="row_1 row_gray">
						<td>
							05.00 - 06.00
						</td><td class="event"><a href="#" title="Боротьба">Боротьба</a>05.00 - 06.00</td><td class="event"><a href="#" title="Боротьба">Боротьба</a>05.00 - 06.00</td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_2">
						<td>
							06.00 - 07.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_3 row_gray">
						<td>
							07.00 - 08.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_4">
						<td>
							08.00 - 09.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_5 row_gray">
						<td>
							09.00 - 10.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_6">
						<td>
							10.00 - 11.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_7 row_gray">
						<td>
							11.00 - 12.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_8">
						<td>
							12.00 - 13.00
						</td><td></td><td></td><td></td><td></td><td class="event" rowspan="4"><a href="#" title="Боротьба">Боротьба</a>12.00 - 15.45</td><td class="event" rowspan="4"><a href="#" title="Боротьба">Боротьба</a>12.00 - 15.45</td><td></td></tr><tr class="row_9 row_gray">
						<td>
							13.00 - 14.00
						</td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_10">
						<td>
							14.00 - 15.00
						</td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_11 row_gray">
						<td>
							15.00 - 16.00
						</td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_12">
						<td>
							16.00 - 17.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_13 row_gray">
						<td>
							17.00 - 18.00
						</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr class="row_14">
						<td>
							18.00 - 19.00
						</td><td class="event"><a href="#" title="Боротьба">Боротьба</a>18.00 - 19.00</td><td class="event"><a href="#" title="Боротьба">Боротьба</a>18.00 - 19.00</td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>18.00 - 20.00</td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>18.00 - 20.00</td><td class="event" rowspan="2"><a href="#" title="Боротьба">Боротьба</a>18.00 - 20.00</td><td></td><td></td></tr><tr class="row_15 row_gray">
						<td>
							19.00 - 20.00
						</td><td></td><td></td><td></td><td></td></tr>	
				</tbody>
			    </table>
			    <div class="timetable_small">
			   	  <ul class="items_list"><h3>Понеділок</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	   <ul class="items_list"><h3>Вівторок</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	  <ul class="items_list"><h3>Середа</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	   <ul class="items_list"><h3>Thrusday</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	  <ul class="items_list"><h3>П'ятниця</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	  <ul class="items_list"><h3>Субота</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	   <ul class="items_list"><h3>Неділя</h3>
			   		<li><p><a href>Бокс</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cardio Fittness</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Yoga</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Боротьба</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   		<li><p><a href>Cycling</a></p><span class="m_31">10.00 - 20.00</span><div class="clear"></div></li>
			   	  </ul>
			   	 </div>
					</ul>	
				  </div>           	      
			     </div>	
				</div>	
		       </div>
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
