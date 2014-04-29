<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
		<title>UP-PMS: Inventory</title>
		<link rel="shortcut icon" href="../favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/searchbar.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="js/jquery-1.9.1.js"></script>
	</head>
	<body class="cbp-spmenu-push">
	<? 
			session_start();
			if(! isset($_SESSION['logged_in'])) $_SESSION['logged_in'] = false;

			if ( $_SESSION['logged_in'] == true ) {
					header ("Location: http://localhost/uppms3/");
			}

	?> 
		<div class="container">
			<header>
				<h1 id="theTitle">University of the Philippines<br/>Property Management System</h1>
			</header>
				<div class="login">
					<form method="POST" action="sql/confirmLogin.php">
						<input name="username" class="typeField" id="username" placeholder="Username" autofocus/ required>
						<input name="password" class="typeField" id="password" placeholder="Password" type="password" required>
						<button class="formbtn" id="loginBtn">Log In</button>
						<h4 class="alert" id="incorrect_login"><strong>Oops!</strong> Wrong username or password.</h4>
					</form>
				</div>
		</div>

		<script type="text/javascript">

			$('#incorrect_login').hide();

			<? if (isset($_GET['error'])) { ?>
				$('#incorrect_login').show();
			<? } ?>


		</script>

	</body>
</html>