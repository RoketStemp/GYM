<?php 
session_start();
require_once 'db.php';

if (isset($_POST['card'])) {
	$card = mysqli_query($link, "SELECT has_card from users WHERE id={$_POST['card']}");
	$card_info = mysqli_fetch_row($card);

	if ($card_info[0] =='0') {
		mysqli_query($link, "UPDATE users SET has_card='1' WHERE id={$_POST['card']}");
	}else{
		mysqli_query($link, "UPDATE users SET has_card='0' WHERE id={$_POST['card']}");
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	
</head>
<body>
	<div class="container mt-5">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav row text-center d-flex" style="width:100%">
					<li class="nav-item flex-fill">
						<a class="nav-link" href="admin.php">Записи</a>
					</li>
					<li class="nav-item flex-fill">
						<a class="nav-link" href="first.php">Перший візит</a>
					</li>
					<li class="nav-item active flex-fill">
						<a class="nav-link" href="user.php">Користувачі</a>
					</li>
					<li class="nav-item flex-fill">
						<a class="nav-link" href="review.php">Відгуки</a>
					</li>
					<li class="nav-item flex-fill">
						<a class="nav-link" href="club.php">Клубна карта</a>
					</li>
					<li class="nav-item flex-fill">
						<a class="nav-link" href="index.php">Вийти</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>

	<div class="container mt-5">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">№</th>
					<th scope="col">Ім'я</th>
					<th scope="col">Логін</th>
					<th scope="col">Пароль</th>
					<th scope="col">Номер</th>
					<th scope="col">Пошта</th>
					<th scope="col">Наявність картки</th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$visits = mysqli_query($link, "SELECT * FROM users");

				while ($row = mysqli_fetch_array($visits)) {
					echo "<tr>";
					echo "<th scope='row'>{$row[0]}</th>";
					echo "<td>{$row[1]}</td>";
					echo "<td>{$row[2]}</td>";
					echo "<td>{$row[3]}</td>";
					echo "<td>{$row[4]}</td>";
					echo "<td>{$row[5]}</td>";
					if ($row[6]=='0') {
						echo "<td>Ні</td>";
					}else
					{
						echo "<td>Так</td>";
					}
					
					echo "<form method='POST'>";
					echo "<td><button class='btn btn-dark'type='submit' name='card' value='{$row[0]}'>Змінити статус картки</button></td>";
					echo "<td><button class='btn btn-dark'type='submit' name='reject' value='{$row[0]}'>Видалити</button></td>";
					echo "</form>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>
</html>