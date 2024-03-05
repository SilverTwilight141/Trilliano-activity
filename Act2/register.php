<?php include 'connection.php' ?>
<?php

if (isset($_POST['submit'])) {
	$users = $_POST['user'];
	$passs = $_POST['pass'];
	$fnames = $_POST['fname'];
	$mnames = $_POST['mname'];
	$lnames = $_POST['lname'];
	$pos = 'Employee';

	$query = "SELECT * FROM `users` WHERE `username` = '$users'";
	$stmts = $conn->prepare($query);
	$stmts->execute();
	$result = $stmts->get_result();
	$row = $result->fetch_assoc();

	if ($users == @$row['Username']) {
		echo "User is Already Exist";

	}else{

		$sql = "INSERT INTO `users`(`username`, `passoword`, `Fname`, `Mname`, `Lname`, `Position`) VALUES (?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt -> bind_param("ssssss",$users,$passs,$fnames,$lnames,$pos);
		$stmt->execute();
		echo "Registered Succesfully";
	}
	}
?>
<!DOCTYPE html>
<html>
<head>

	<style>
		.required-label {
			color: red;
		}
		.required-indicator {
			color: red;
			margin-left: 10px;
		}
	</style>
</head>
	<body>

	<div class="login-form">
		<form action="" method="post" class="form-group">
			<div class="form-group">
				<label for="user">Username <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
				<input type="text" name="user" id="user">required<br><br>
			</div>

				<div class="form-group">
				<label for="pass">Password <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
				<input type="password" name="pass" id="pass">required<br><br>
			</div>

			<div class="form-group">
				<label for="fname">First Name <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
				<input type="text" name="fname" id="fname">required<br><br>
			</div>

			<div class="form-group">
				<label for="mname">Middle Name <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
				<input type="text" name="mname" id="mname">required<br><br>
			</div>

			<div class="form-group">
				<label for="mname">Middle Name <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
				<input type="text" name="mname" id="mname">required<br><br>
			</div>

			<div class="form-group">
				<label for="lname">Last Name <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
				<input type="text" name="lname" id="lname">required<br><br>
			</div>

			<div class="form-group">
				<button type="submit" name="submit">Register</button><br><br>
		</div>
	</div>
</form>
</div>

<p>Already Have an Account? <a href="I=index.php"> Login Here</a></p>

<br><br>
</body>
</html>
