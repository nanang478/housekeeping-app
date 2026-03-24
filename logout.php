<?php
session_start();

// hapus semua session
session_unset();
session_destroy();

// kembali ke halaman login
header("Location: login.php");
exit;
?>