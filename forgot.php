<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Forgot Form </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="forgot.css">
	<script src="//cdn.muicss.com/mui-0.9.39/extra/mui-combined.js"></script>
<script src="//cdn.muicss.com/mui-0.9.39/extra/mui-combined.min.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link href="//cdn.muicss.com/mui-0.9.39/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.9.39/js/mui.min.js"></script>
</head>
<body>

	<?php 
	require ('navbar_pelanggan.php');
	?>

	<div class="forgot">
		<img src="img/profile2.png" class="profile">
		<h1 style="font-size: 25px; margin: 0; text-align: center;padding: 0 0 20px;">Forgot Form</h1>

		<form class="mui-form" method="POST">
			<div class="mui-textfield mui-textfield--float-label" style="margin-top: -5px;">
				<input type="email" name="email" required>
				<label style="color: black; font-weight: bold;">Email</label>
			</div>
			<input type="submit" value="Check" name="check"><br><br>
		</form>
	</div>

</body>
</html>

<?php 
session_start();
if(isset($_POST['check'])){

	$db = mysqli_connect("localhost","root","","proyek_tekweb");

	$email = $_POST['email'];

	$sql = "SELECT * FROM pelanggan WHERE email_pelanggan = '$email'";
	$query = $db->query($sql);
	$hasil = $query->fetch_assoc();

	if($query->num_rows == 0) {
		echo "<script> alert('Email doesn't exist'); </script>";
		echo "<script> location='forgot.php'; </script>";
	} 

	else if ($email == 'Admin@gmail.com'){
		echo "<script> alert('Email is forbidden'); </script>";
		echo "<script> location='forgot.php'; </script>";
	}

	else {
		$_SESSION['email'] = $hasil['email_pelanggan'];
		$password = $hasil['email_pelanggan'];
		/*$to = $hasil['email_pelanggan'];
		$subject = "Your recovered password ";
		$message = "Please use this password to login " . $password;
		$headers .= 'From: houseofpastry <@locahost>' . "\r\n";
		// $headers = "From: password@studentstutorial.com";
		$our_server = 'mail.mucglobal.com';
		ini_set('SMTP', $our_server);

		if(mail($to, $subject, $message, $headers)){
			echo "<script> alert('Your password has been sent to your email') </script>";
		}
		else{
			echo "<script> alert('Failed to recover your password, try again') </script>";
		}*/
		echo "<script> alert('Your Password: " .$hasil['password_pelanggan']."'); </script>";
		echo "<script> location='login.php'; </script>";
	}
}
?>