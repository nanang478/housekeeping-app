<?php
include "../config.php";

$user = $_SESSION['user'];

$room = $_POST['room_id'];

$items = $_POST['items'];

$total = 5;
$done = count($items);
$progress = ($done/$total)*100;

$list = implode(",", $items);


$folder = "../uploads/";

if(!is_dir($folder)){
mkdir($folder);
}

$foto = $_FILES['foto_cleaning']['name'];
$tmp  = $_FILES['foto_cleaning']['tmp_name'];

$nama_file = time()."_".$foto;

move_uploaded_file($tmp,$folder.$nama_file);


mysqli_query($conn,"INSERT INTO cleaning_log
(room_id,user_id,date,status,progress,items,foto)

VALUES
('$room',
'".$user['id']."',
CURDATE(),
'Cleaning',
'$progress',
'$list',
'$nama_file')
");

header("Location:scan_kamar.php");