<?php 
session_start();
require_once 'db.php';

if (isset($_POST['delete'])) {
	mysqli_query($link, "DELETE FROM reviews WHERE id={$_POST['delete']}");}
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
					<li class="nav-item flex-fill">
						<a class="nav-link" href="user.php">Користувачі</a>
					</li>
					<li class="nav-item active flex-fill">
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
			<?php 
			$reviews = mysqli_query($link, "SELECT * FROM reviews");
			while ($row = mysqli_fetch_array($reviews)) {
				echo "<div class='card mt-5'>";
				echo "<div class='card-header'><span>{$row[1]}</span> <span style='float:right'>{$row[4]}</span></div>";
				echo "<div class='card-body'>";
				echo "<h5 class='card-title text-center my-3'>{$row[2]}</h5>";
				echo "<p class='card-text text-center my-3'>{$row[3]}</p>";
				echo "<form method='POST'>";
				echo "<button type='submit' name='delete' value='{$row[0]}' class='btn btn-dark'>Видалити</button>";
				echo "</form>";
				echo "</div>";
				echo "</div>";
			}
			?>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>
</html>