<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE>Login - SaleProject</TITLE>
		<link rel="stylesheet" type="text/css" href="login.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<script src="login.js"></script>
	</HEAD>
	<BODY>
		<?php
			$usn = $pass = "";
			if ($_SERVER["REQUEST_METHOD"]  == "POST") {
				$usn = test_input($_POST["usn"]);
				$pass = test_input($_POST["pass"]);

				$servername = "localhost";
				$username = "root";
				$password = "1234";
				$dbname = "sale_project";

				$conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				if (!filter_var($usn, FILTER_VALIDATE_EMAIL) === false) {
					$sql = "SELECT id_user, username, password FROM user WHERE email = '$usn'";
				} else {
					$sql = "SELECT id_user, username, password FROM user WHERE username = '$usn'";
				}

				$result = mysqli_query($conn, $sql);
				if (!(mysqli_num_rows($result) <= 0)) {
					$row = mysqli_fetch_assoc($result);
					$cek = $row['password'];
					if (strcmp($cek, $pass) == 0) {
						$idus = $row['id_user'];
						header("Location: catalog.php?id_user=$idus");
						die();
					} else {
						$error = "Invalid Password";
					}
				} else {
					$error = "Invalid Email or Username"
				}
				mysqli_close($conn);
			}

			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>

		<h1>
			<span class="sale">Sale</span><span class="project">Project</span>
		</h1>
		<div class="box">
			<h2>Please login</h2>
			<hr>
			<form name="loginForm" action="login.php" method="post">
				Email or Username<br>
				<input type="text" name="usn" onkeypress="return limitText()"><br>
				Password<br>
				<input type="password" name="pass" onkeypress="return limitPass()"><br>
				<input type="submit" value="LOGIN">
			</form>
			<br>
			<p>Don't have an account yet? Register <a href="register.php">here</a> </p>
		</div>
	</BODY>
</HTML>