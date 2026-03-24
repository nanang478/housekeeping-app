<?php
include "../config.php";

$kode = $_GET['kode'] ?? '';
if(empty($kode)){
    echo json_encode(['status' => 'error']);
    exit;
}

$kode = mysqli_real_escape_string($conn, $kode);

$query = mysqli_query($conn, "
    SELECT id, room_number, room_code 
    FROM rooms 
    WHERE room_number='$kode' OR room_code='$kode' 
    LIMIT 1
");

$data = mysqli_fetch_assoc($query);

if($data){
    echo json_encode([
        'status'=>'success',
        'id'=> (int)$data['id'],
        'room_number'=> $data['room_number']
    ]);
}else{
    echo json_encode(['status'=>'not_found']);
}
?>