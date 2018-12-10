<?php

include "koneksi.php";
//cek button    
    $nr    = $_POST['nr'];
    $rid    = $_POST['rid'];
    $ur   = $_POST['ur'];
    $alamat    = $_POST['alamat'];

    $check_data = mysqli_query($conn, "SELECT * from data_restoran where restoran_id = '$rid'");
    if($check_data->num_rows < 1){
    	$query_input = mysqli_query($conn, "INSERT INTO data_restoran (nama_restoran,restoran_id,rating,alamat) VALUES ('$nr','$rid','$ur','$alamat')");
    	header("Location: kunafe.php?id=$rid");
    } else {
    	header("Location: kunafe.php?id=$rid");
    }

?>
