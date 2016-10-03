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
			<form name="loginForm" method="post">
				Email or Username<br>
				<input type="text" name="usn" onkeypress="return limitText()" onkeyup="return limitText()"><br>
				Password<br>
				<input type="password" name="pass" onkeypress="return limitPass()" onkeyup="return limitPass()"><br>
				<?php
					if ($_SERVER["REQUEST_METHOD"]  == "POST") {

						$usn = $pass = $idus = "";
						$usn = test_input($_POST["usn"]);
						$pass = test_input($_POST["pass"]);

						$servername = "localhost";
						$username = "wbd";
						$password = "6696";
						$dbname = "sale_project";

						$conn = mysqli_connect($servername, $username, $password, $dbname);
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						if (!filter_var($usn, FILTER_VALIDATE_EMAIL) === false) {
							$sql = "SELECT id_user, email, password FROM user WHERE email = '$usn' and password = '$pass'";		
						} else {
							$sql = "SELECT id_user, username, password FROM user WHERE username = '$usn' and password = '$pass'";				
						}
						$result = mysqli_query($conn, $sql);
						$count = mysqli_num_rows($result);
						if ($count == 1) {
							$row = mysqli_fetch_assoc($result);
							$idus = $row['id_user'];

							header("Location: catalog.php?id_user=$idus");
							die();
						} else {
							echo "
								<div class=\"inv\">Invalid Username or Password
								</div>";
						}
						mysqli_close($conn);
					}
				?>
				<input type="submit" value="LOGIN">
			</form>
			<br>
			<p>Don't have an account yet? Register <a href="register.php">here</a> </p>
		</div>
	</BODY>
</HTML>