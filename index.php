<?php
include 'config.php';

session_start();

error_reporting(0);

if(isset($_SESSION['username'])){
header("Location: home.php");
}

if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
$row=mysqli_fetch_assoc($result);
$_SESSION['username']=$row['username'];
header("Location: home.php");
}
else{
echo"<script>alert('Email or Password is wrong.')</script>";
}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--<link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" />-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Login Form - OBring Smile</title>
</head>

<body>
<div class="container">
<p class="login-text" > Login with social media</p>
<div class="login-social">
<a href="#" class="facebook"><i class="fa fa-facebook"></i> Facebook</a>
<a href="#" class="twitter"><i class="fa fa-twitter"></i> Twitter</a>
<a href="#" class="google-plus"><i class="fa fa-google-plus"></i>Google Plus</a>
<a href="#" class="linkedin"><i class="fa fa-linkedin"></i>Linkedin</a>
</div>
<form action="" method="post" class="login-email">
<p class="login-text style="font-size:2rem; font-weight:700;">Login email</p>
<div class="input-group">
<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required />
</div>
<div class="input-group">
<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required />
</div>
<div class="input-group">
<button name="submit" class="btn">Login</button>
</div>
<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
</form>
</div>
</body>
</html>
