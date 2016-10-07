<!DOCTYPE html>
<html>
	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Register - SaleProject</title>
		<link rel="stylesheet" type="text/css" href="register.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<script src="register.js" type="text/javascript"></script>
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
			<h2>Please register</h2>
			<hr>
			<div>
				<form name="register" method="POST" onsubmit="return validate()">
					Full Name<br>
					<div id = "errfn" class="err-msg"> </div>
					<input type="text" name="fullname">
					<br>
					Username<br>
					<div id = "errun" class="err-msg"> </div>
					<input type="text" name="username">
					<br>
					Email<br>
					<div id = "errmail" class="err-msg"> </div>
					<input type="email" name="mail">
					<br>
					Password<br>
					<div id = "errpass" class="err-msg"> </div>
					<input type="password" name="pass">
					<br>
					Confirm Password<br>
					<div id = "errcpass" class="err-msg"> </div>
					<input type="password" name="confpass">
					<br>
					Full Address<br>
					<div id = "erraddr" class="err-msg"> </div>
					<textarea name="address"></textarea>
					<br>	
					Postal Code<br>
					<div id = "errpc" class="err-msg"> </div>
					<input type="text" name="postcode">
					<br>	
					Phone Number<br>
					<div id = "errpn" class="err-msg"> </div>
					<input type="tel" name="phone">
					<br><br>
					
		    	<?php
					if ($_SERVER["REQUEST_METHOD"]  == "POST") {
						$fullname = test_input($_POST["fullname"]);
						$username = test_input($_POST["username"]);
						$pass = test_input($_POST["pass"]);
						$address = test_input($_POST["address"]);
						$postcode = test_input($_POST["postcode"]);
						$phone = test_input($_POST["phone"]);
						$mail = test_input($_POST["mail"]);
						
						$servername = "localhost";
						$usrn = "wbd";
						$password = "6696";
						$dbname = "sale_project";
						$conn = mysqli_connect($servername, $usrn, $password, $dbname);
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}
						$sql1 = "SELECT * from user WHERE username = '$username'";
						$sql2 = "SELECT * from user WHERE email = '$mail'";
						$result = mysqli_query($conn, $sql1);
						$result2 = mysqli_query($conn, $sql2);
						$count = mysqli_num_rows($result);
						$count2 = mysqli_num_rows($result2);
						if (($count < 1) && ($count2 < 1)) {
							$sql = "INSERT INTO user (full_name, username, password, full_address, postal_code, phone_number, email)
							VALUES ('$fullname', '$username', '$pass', '$address', '$postcode', '$phone', '$mail')";
							if (mysqli_query($conn, $sql)) {
								$sql3 = "SELECT id_user FROM user where username = '$username'";
								$result3 = mysqli_query($conn, $sql3);
								$id_user = mysqli_fetch_assoc($result3)['id_user'];
								header("Location: catalog.php?id_user=$id_user");
								die();
							} else {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
						else {
							$errun = "Username already exists";
						}
						mysqli_close($conn);
					}
				?>
				<input class="button" type="submit" value="REGISTER">
			</form>
		</div>
	</body>
</html>