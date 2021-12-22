<?php 
	session_start();
	require_once 'db.php';

function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}

if (isset($_POST['log'])) {

	$user = $_POST['login'];
	$password = $_POST['password'];

	if ($_POST['login']=='admin' && $_POST['password']='admin') {

		$_SESSION['admin'] = 0;
		$_SESSION['username'] = '';
		redirect("admin.php"); exit();
	}

	$query = "SELECT * FROM users WHERE login='".$user."'AND password='".$password."'";

	$result = mysqli_query($link, $query) or die (mysqli_error($link));
	$u = mysqli_fetch_row($result);

	if ($u[0] != NULL) {
		$_SESSION['username'] = $user;
		$_SESSION['admin'] = '';
		redirect("index.php"); exit();
	}
}

if(isset($_POST['reg'])) {
	$err = [];
	
	if(strlen($_POST['login']) < 3 or strlen($_POST['login'] > 30))
	{
		$err[] = "Ім'я користувача не може бути менш ніж 3 символи або більше ніж 30 символів";
	}
	$query = mysqli_query($link, "SELECT id FROM users WHERE login='".mysqli_real_escape_string($link, $_POST['login'])."'") or die(mysqli_error($link));
	
	if(mysqli_num_rows($query) > 0){
		$err[] = "User Exist!!!!";
	}
	if (count($err) == 0) {
		$username = $_POST['login'];
		$password = $_POST['password'];

		mysqli_query($link,"INSERT INTO users SET login='".$username."', password='".$password."', name='".$_POST['name']."', mail='{$_POST['mail']}', number='{$_POST['phone']}', has_card='0'") or die(mysqli_error($link));
		
		$query = "SELECT * FROM users WHERE login='".$username."'AND password=".$password."";

		$result = mysqli_query($link, $query) or die (mysqli_error($link));
		$u = mysqli_fetch_row($result);

		if ($u[0] != NULL) {
			$_SESSION['username'] = $user;
			$_SESSION['admin'] = $u[0];
			redirect("index.php"); exit();
		}	
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
	background: linear-gradient(to right, #FF4B2B, #FF416C);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}
button{
	cursor: pointer;
}
</style>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST">
			<h2 style="margin-bottom: 10px;">Створіть аккаунт</h2>
			<input type="text" name="name" placeholder="Прізвище Ім'я По батькові" />
			<input type="text" name="phone" placeholder="Телефон" />
			<input type="text" name='login' placeholder="Логін" />
			<input type="email" name='mail' placeholder="Пошта" />
			<input type="password" name='password' placeholder="Пароль" />
			<button style="margin-top:10px;" type="submit" name="reg">Зареєструватись</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST">
			<h1>Логін</h1>
			<input type="text" name='login' placeholder="Логін" />
			<input type="password" name='password' placeholder="Пароль" />
			<button type="submit" name="log">Ввійти</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>З поверненням!</h1>
				<p>Для отримання персональних данних, будь ласка, увійдіть</p>
				<button class="ghost" id="signIn">Ввійти</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Добрий день!</h1>
				<p>Зареєструйтесь, щоб бачити розклад занять та отримати доступ до додаткових функцій</p>
				<button class="ghost" id="signUp">Зареєструватись</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</body>
</html>
