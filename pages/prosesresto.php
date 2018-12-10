<?php
include_once "koneksi.php";
//var_dump($_POST);
if(isset($_POST)){
    $nama = $_POST['nama'];
    $rate = $_POST['rate'];
    $alamat = $_POST['alamat'];

//    var_dump($host);
    if (!$host){
        echo "gagal konek ke db";
    }else {
        $result = mysqli_query($host, "INSERT INTO input_resto(nama, rate, alamat) VALUES ('$nama', '$rate', '$alamat')");
//        var_dump($host);
    }

    if (!$result){
        echo "failed create post";
    }
    header("location:userInput.html");
}
?>