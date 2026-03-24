<?php

// ==============================
// KONFIGURASI DATABASE
// ==============================

$host = "sql111.infinityfree.com"; 
$user = "if0_41453075";            
$pass = "Zj5TurmwFNAi";       
$db   = "if0_41453075_housekepping"; 

$conn = mysqli_connect($host,$user,$pass,$db);

// cek koneksi
if(!$conn){
    die("Koneksi database gagal : " . mysqli_connect_error());
}


// ==============================
// SESSION LOGIN
// ==============================

if(session_status() === PHP_SESSION_NONE){
    session_start();
}


// ==============================
// TIMEZONE PHP
// ==============================

date_default_timezone_set("Asia/Jakarta");


// ==============================
// TIMEZONE MYSQL
// ==============================
// agar tanggal database mengikuti waktu Indonesia

mysqli_query($conn,"SET time_zone='+07:00'");

?>