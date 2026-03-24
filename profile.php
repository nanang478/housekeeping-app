<?php
session_start();
include "config.php";

if(!isset($_SESSION['user'])){
header("Location:login.php");
exit;
}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html>
<head>

<title>Profile</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<style>

body{
background:#f1f3f6;
font-family:Arial;
}

.container-mobile{
max-width:420px;
margin:auto;
background:white;
min-height:100vh;
padding:20px;
}

.profile-box{
text-align:center;
}

.avatar{
width:90px;
height:90px;
border-radius:50%;
background:#0d6efd;
color:white;
display:flex;
align-items:center;
justify-content:center;
font-size:35px;
margin:auto;
margin-bottom:15px;
}

.info{
background:#f8f9fa;
padding:15px;
border-radius:10px;
margin-top:20px;
}

.logout{
margin-top:25px;
}

</style>

</head>

<body>

<div class="container-mobile">

<div class="profile-box">

<div class="avatar">
👤
</div>

<h4><?php echo $user['name']; ?></h4>

</div>

<div class="info">

<p><b>Nama :</b><br>
<?php echo $user['name']; ?>
</p>

<p><b>Username :</b><br>
<?php echo $user['username']; ?>
</p>

<p><b>Role :</b><br>
<?php echo $user['role']; ?>
</p>

</div>

<div class="logout">

<a href="logout.php"
class="btn btn-danger w-100">
Logout
</a>

</div>

</div>

</body>
</html>