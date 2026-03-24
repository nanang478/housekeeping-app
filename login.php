<?php
session_start();
include "config.php";

if(isset($_POST['login'])){

$user = $_POST['username'];
$pass = md5($_POST['password']);

$q = mysqli_query($conn,"SELECT * FROM users 
WHERE username='$user' AND password='$pass'");

if(mysqli_num_rows($q)>0){

$data = mysqli_fetch_assoc($q);

$_SESSION['user']=$data;

if($data['role']=="housekeeper"){
header("Location:https://housekeeping-app-two.vercel.app/home.html");
}else{
header("Location:https://housekeeping-app-two.vercel.app/dashboard.html");
}

exit;

}

}
?>

<!DOCTYPE html>
<html>
<head>
    
<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#1e88e5">
<link rel="apple-touch-icon" href="/icon.png">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<style>

body{
margin:0;
font-family:Segoe UI;
background:#f4f4f4;
}

/* header biru */
.top{
background:#2f86da;
color:white;
padding:60px 30px 120px 30px;
border-bottom-left-radius:60px;
border-bottom-right-radius:60px;
}

/* form */
.login-box{
margin-top:-80px;
background:white;
border-radius:20px;
padding:30px;
box-shadow:0 10px 30px rgba(0,0,0,0.15);
}

input{
border:none;
border-bottom:1px solid #ddd;
border-radius:0;
}

input:focus{
box-shadow:none;
border-bottom:2px solid #2f86da;
}

.login-btn{
background:#2f86da;
color:white;
width:100%;
border-radius:5px;
padding:12px;
border:none;
}

.login-btn:hover{
background:#1f6fb8;
}

.small-text{
color:#ccc;
font-size:13px;
}

@media(min-width:768px){

.phone{
width:400px;
margin:auto;
}

}

</style>

</head>

<body>

<div class="phone">

<div class="top">

<h3><b>Smart Housekepping</b></h3>
<h5>Cleaning Service APP</h5>

<p class="small-text">
Welcome, Login First to Continue
</p>

</div>

<div class="login-box">

<form method="POST">

<label>User Name</label>
<input type="text"
name="username"
class="form-control mb-3"
placeholder="Insert NRP"
required>

<label>Password</label>

<div class="d-flex justify-content-between">
<label></label>
<a href="#" style="font-size:12px">Forgot Password?</a>
</div>

<input type="password"
name="password"
class="form-control mb-4"
required>

<button name="login"
class="login-btn">
LOGIN
</button>

</form>

</div>

</div>

<script>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function () {
    navigator.serviceWorker.register('/sw.js')
    .then(function(reg){
      console.log("Service Worker Registered:", reg.scope);
    })
    .catch(function(err){
      console.log("Service Worker Failed:", err);
    });
  });
}
</script>

</body>
</html>
