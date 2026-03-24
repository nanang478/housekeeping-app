<?php
session_start();
include "config.php";

if(!isset($_SESSION['user'])){
header("Location:login.php");
exit;
}

$user_id = $_SESSION['user']['id'];

$q = mysqli_query($conn,"
SELECT cleaning_log.*, rooms.room_number
FROM cleaning_log
JOIN rooms ON rooms.id = cleaning_log.room_id
WHERE cleaning_log.user_id='$user_id'
ORDER BY cleaning_log.id DESC
");

?>

<!DOCTYPE html>
<html>
<head>

<title>History Cleaning</title>

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
padding:15px;
}

.card-clean{
background:white;
border-radius:12px;
padding:15px;
margin-bottom:15px;
box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.room{
font-weight:bold;
font-size:18px;
}

.date{
color:gray;
font-size:13px;
}

.progress{
height:8px;
margin-top:8px;
}

img{
width:100%;
border-radius:10px;
margin-top:10px;
}

</style>

</head>

<body>

<div class="container-mobile">

<h4 class="mb-3">History Cleaning</h4>

<?php while($d=mysqli_fetch_assoc($q)){ ?>

<div class="card-clean">

<div class="room">
Kamar <?php echo $d['room_number']; ?>
</div>

<div class="date">
<?php echo $d['date']; ?>
</div>

<div class="progress">
<div class="progress-bar bg-success"
style="width:<?php echo $d['progress']; ?>%">
</div>
</div>

<div style="margin-top:8px;font-size:14px;">
<?php echo $d['items']; ?>
</div>

<?php
if($d['foto'] != "" && file_exists("uploads/".$d['foto'])){
?>

<img src="uploads/<?php echo $d['foto']; ?>">

<?php } ?>

</div>

<?php } ?>

</div>

</body>
</html>