<?php
session_start();
include "config.php";

if(!isset($_SESSION['user'])){
header("Location:login.php");
exit;
}

$user = $_SESSION['user']['name'];
?>

<!DOCTYPE html>
<html>
<head>

<title>Home</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>

body{
background:#f1f3f6;
font-family:Arial;
margin:0;
}

/* HEADER */
.app-header{
background:#1e88e5;
color:white;
padding:15px;
display:flex;
justify-content:space-between;
align-items:center;
font-size:18px;
}

/* CONTAINER MOBILE */
.mobile-wrapper{
max-width:420px;
margin:auto;
min-height:100vh;
background:white;
}

/* MENU BESAR */
.menu-card{
border-radius:14px;
margin:15px;
background:#0d6efd;
color:white;
padding:40px 20px;
text-align:center;
box-shadow:0 6px 15px rgba(0,0,0,0.15);
}

.menu-icon{
font-size:50px;
margin-bottom:10px;
}

.menu-text{
font-size:22px;
font-weight:bold;
}

/* GRID MENU */
.menu-grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:15px;
padding:0 15px 20px 15px;
}

.small-menu{
background:white;
border-radius:14px;
padding:25px 10px;
text-align:center;
box-shadow:0 4px 12px rgba(0,0,0,0.12);
}

.small-icon{
font-size:35px;
color:#0d6efd;
margin-bottom:5px;
}

.small-title{
font-weight:600;
font-size:16px;
}

a{
text-decoration:none;
color:black;
}

</style>

</head>

<body>

<div class="mobile-wrapper">

<!-- HEADER -->
<div class="app-header">

<div>
<?php echo $user; ?>
</div>

<div>
<i class="bi bi-arrow-clockwise"></i>
</div>

</div>

<!-- MENU UTAMA -->

<a href="housekeeper/scan_kamar.php">

<div class="menu-card">

<div class="menu-icon">
<i class="bi bi-qr-code-scan"></i>
</div>

<div class="menu-text">
Mulai Cleaning
</div>

</div>

</a>


<div class="menu-grid">

<!-- HISTORY -->

<a href="history.php">

<div class="small-menu">

<div class="small-icon">
<i class="bi bi-clock-history"></i>
</div>

<div class="small-title">
History Cleaning
</div>

</div>

</a>


<!-- PROFILE -->

<a href="profile.php">

<div class="small-menu">

<div class="small-icon">
<i class="bi bi-person-circle"></i>
</div>

<div class="small-title">
Profile
</div>

</div>

</a>

</div>

</div>

</body>
</html>
```
