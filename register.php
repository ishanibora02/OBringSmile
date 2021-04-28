<?php
include 'config.php';

error_reporting(0);
session_start();
if(isset($_SESSION['username'])){
header("Location: index.php");
}

if(isset($_POST['submit'])){
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = md5($_POST['password']);
$confirm = md5($_POST['confirm']);

if($password==$confirm){
$sql="SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($conn,$sql);
if(!$result->num_rows>0){
$sql="INSERT INTO users (name,username,email,contact,password)VALUES('$name','$username','$email','$contact','$password')";
$result=mysqli_query($conn,$sql);
if($result){
echo"<script>alert('Wow ! User register successfully.')</script>";
$name="";
$username="";
$email="";
$_POST['password']="";
$_POST['confirm']="";
}
else{
echo"<script>alert('Woops! Something went wrong.')</script>";
}
}
else{
echo "<script>alert('Woops! Email already exists.')</script>";
}
}
else{
echo"<script>alert('Password not matched.')</script>";
}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Login Form - OBring Smile</title>
</head>

<body>
<div class="container">
<form action="" method="post" class="login-email">
<p class="login-text" style="font-size:2rem; font-weight:800;"> Register</p>
<div class="input-group">
<input type="text" placeholder="Name" name="name" value="<?php echo $name; ?>" required />
</div>
<div class="input-group">
<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required />
</div>
<div class="input-group">
<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required />
</div>
<div class="input-group">
<input type="text" placeholder="Contact" name="contact" value="<?php echo $contact; ?>" required />
</div>
<div class="input-group">
<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required />
</div>
<div class="input-group">
<input type="password" placeholder="Confirm Password" name="confirm" value="<?php echo $_POST['confirm']; ?>" required />
</div>
<div class="input-group">
<button class="btn" name="submit">Register</button>
</div>
<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
</form>
</div>
</body>
</html>
