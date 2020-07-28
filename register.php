<!DOCTYPE html>
<html>
<head>
	<title> Register Form </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link  href="register1.css" rel="stylesheet" type="text/css">

	<script src="//cdn.muicss.com/mui-0.9.39/extra/mui-combined.js"></script>
  <script src="//cdn.muicss.com/mui-0.9.39/extra/mui-combined.min.js"></script>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <link href="//cdn.muicss.com/mui-0.9.39/css/mui.min.css" rel="stylesheet" type="text/css" />
  <script src="//cdn.muicss.com/mui-0.9.39/js/mui.min.js"></script>

  <script>
    function checkForm(form)
    {
      re = /^\w+$/;
      if(!re.test(form.nama.value)) {
        alert("Username must contain only letters, numbers and underscores");
        form.nama.focus();
        return false;
      }
      re = /[a-z]/;
      re2 = /[0-9]/;
      if(!re.test(form.password.value) || !re2.test(form.password.value) ) {
        alert("Passwords at least 6 characters and combination of numbers and letters");
        form.password.focus();
        return false;
      }
      re=/[a-z]/;
      re1=/[A-Z]/;
      re1 = /^\w+$/;
      if(re.test(form.telepon.value) || re.test(form.telepon.value) || re.test(form.telepon.value)){
       alert("Phone number must be a number");
       form.telepon.focus();
       return false;
     }
     re=/[0-9]/;
     re1=/[a-z]/;
     re2=/[A-Z]/;
     if(re.test(form.alamat.value) && !(re2.test(form.alamat.value) || re1.test(form.alamat.value))){
       alert("Address can not be just numbers");
       form.alamat.focus();
       return false;
     }
     if(form.password.value != "" && form.password.value == form.cpassword.value) {
      if(form.password.value.length < 6) {
        alert("Password must contain at least six characters");
        form.password.focus();
        return false;
      }
    } 
    else {
      alert("Password does not match");
      form.password.focus();
      return false;
    }
    return true;
  }
  function myFunction() {
   var x = document.getElementById("myInput");
   if (x.type === "password") {
     x.type = "text";
   } else {
     x.type = "password";
   }
 }

 function ceksama(){
  var x = document.getElementById("myInput");
  var y = document.getElementById("myConfirm");
  if(x.value == y.value){
    var x1 = document.getElementById("demo");
    document.getElementById('demo').innerHTML="Password Match";
    document.getElementById('demo').style.fontWeight="bold";

  }
  else if(x.value != y.value && (x.value!="" && y.value!="")){
  var x1 = document.getElementById("demo");
    document.getElementById('demo').innerHTML="Password Not Match";
    document.getElementById('demo').style.fontWeight="bold";    
  }
 }

</script>



</head>


<body> 
	<?php 
	require ('navbar_pelanggan.php');
	?>

  <div class="register" style="width: 640px; height: 460px;">
   <img src="img/profile3.png" class="profile">
   <h1 style="font-size: 25px; margin: 0; text-align: center;padding: 0 0 20px;"> Register Here </h1>

   <div class="mui-container-fluid">
    <div class="mui-row">
     <form class="mui-form" method="POST" onsubmit="return checkForm(this)">
       <div class="mui-col-md-6">
        <div class="mui-textfield mui-textfield--float-label" style="margin-top: -8px;">
          <input type="text" name="nama" required>
          <label style="color: black; font-weight: bold;">Username</label>
        </div>

        <div class="mui-textfield mui-textfield--float-label">
          <input type="email" name="email" required style="border-bottom: 1px solid black; margin-top: 8px;">
          <label style="color: black; font-weight: bold;">Email</label>
        </div>

        <div class="mui-textfield mui-textfield--float-label">
          <input type="password" name="password" id="myInput" onchange="ceksama()" required style="border-bottom: 1px solid black; margin-top: 5px;">
          <label style="color: black; font-weight: bold; margin-top: -5px;">Password</label>
        </div>
      </div>

      <div class="mui-col-md-6" style="margin-top: -8px;">
        <div class="mui-textfield mui-textfield--float-label">
          <input type="text" name="alamat" required>
          <label style="color: black; font-weight: bold;">Address</label>
        </div>

        <div class="mui-textfield mui-textfield--float-label">
          <input type="text" name="telepon" required>
          <label style="color: black; font-weight: bold;">Phone Number</label>
        </div>

        <div class="mui-textfield mui-textfield--float-label">
          <input type="password" name="cpassword" id="myConfirm" onchange="ceksama()" required style="border-bottom: 1px solid black; margin-top: 5px;" >
          <label style="color: black; font-weight: bold;">Confirm Password</label>
        </div>
        <p id="demo"></p>
        <input type="checkbox" onclick="myFunction()" style="margin-left: -410px;margin-right: -115px;">Show Password	
      </div>
      <input type="submit" value="Register" name="register" style="margin-top: 30px; margin-bottom: 12px;">
    </form>
  </div>
  
</div>
</div>
</body>
</html>

<?php 
include 'koneksi.php';
if (isset($_POST['register'])){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];

  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
  $yangcocok = $ambil->num_rows;
  if($yangcocok == 1){
   echo "<script> alert('Email sudah pernah ada'); </script>";
   echo "<script> location='register.php'; </script>";

 }else{
   $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$email', '$password', '$nama', '$telepon', '$alamat')");

   echo "<script> alert('Register Success, Please Login'); </script>";
   echo "<script> location='login.php'; </script>";
 }
}
?>