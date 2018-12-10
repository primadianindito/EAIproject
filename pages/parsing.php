<?php
include'koneksi.php';
$query = mysqli_query($conn, "SELECT * from komen");
$data = array();
while($get = mysqli_fetch_assoc($query)){
$json = array();
$json["nama"]=$get["nama"];
$json["email"]=$get["email"];
$json["komen"]=$get["komen"];
$json["rating"]=$get["rating"];
$json["nama_restoran"]=$get["nama_restoran"];
$json["restoran_id"]=$get["restoran_id"];
$json["id"]=$get["id"];
array_push($data, $json);
}
echo json_encode($data)
?>