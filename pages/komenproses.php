<?php

include "koneksi.php";
//cek button    
    $name    = $_POST['name'];
    $email    = $_POST['email'];
    $nr    = $_POST['nr'];
    $ri    = $_POST['ri'];
    $komen   = $_POST['komen'];
    $rating    = $_POST['rating'];

    $query_input = mysqli_query($conn, "INSERT INTO komen (nama,email,komen,rating,nama_restoran,restoran_id) VALUES ('$name','$email','$komen','$rating','$nr','$ri')");
    header("Location: kunafe.php?id=$ri");

?>
