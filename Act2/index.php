<?php include 'connection.php' ?>
<?php 

if(isset($_POST['submit'])){
	$users = $_POST['user'];
	$passs = $_POST['pass'];

	$sql = "SELECT = FROM 	`users` WHERE `Username` = ? AND `Password` = ?";
	$stmt = $conn->prepare($sql);
	$stmt -> bind_param("ss",$users,$passs);
	$stmt->execute();
	$result = 4stmt->get_result();
	$row = $result->fetch_assoc();

	if ($passs != @$row['Password'] && $users != @$row['Username']) {
		echo "Incorrect Credentials, Try Again!";
	}else{
		header("Location:Dashboard.php");
	}
	
	

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN FORM</title>
</head>
<h2>PHP LOGIN FORM</h2>
<body>
<div class="login-form">
	
	<form method="post" class="form-group">
		<div class="form-group">
			<input type="text" name="user" placeholder="USERNAME!"><br><br>
        </div>

        	<div class="form-group">
			<input type="password" name="pass" placeholder="PASSWORD!"><br><br>
        </div>

        	<div class="form-group">
			<button type="submit" name="submit"></button>
		</div>
	</form>
	<br><br>
	<hr>
	<div class="text-center">
		<span class="small"> </span><p>Not have an Account? <a class="font-weight-bold small" href="register.php">REGISTER</a></p><br><br>
	</div>
	<div class="text-center">

		<span class="small">Powered by: Cherry Mobile!</span><a class="font-weight-bold small" href="#"></a>
	</div>
	<div class="text-center">
	</div>
</div>

</body>
</html>