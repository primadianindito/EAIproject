<!DOCTYPE html>
<!DOCTYPE html>
<?php
//Get videos from channel by YouTube Data API
$API_key    = 'AIzaSyBas41zZ6n4pLrma8pWtLZZ6VYB9UYZwu0';
$channelID  = 'UCnYpojRn6SsmGSPNgwdy_6Q';
$maxResults = 1;

$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));
?>
<html>
<head>
<title>Cabskuy</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script src="../layout/scripts/instafeed.min.js" type="text/javascript"></script>

</head>
<body id="top">
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    
    <div class="fl_left">
    <?php
          $queryss = @unserialize (file_get_contents('http://ip-api.com/php/'));
          if ($queryss && $queryss['status'] == 'success') {
          }
          $json = file_get_contents("https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22bandung%22)and%20u%3D%22c%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys");
                
          $data = json_decode($json);

          ?>
     <?php

              echo $data->query->results->channel->location->city . ", ";
              echo $data->query->results->channel->location->region. ", ";
              echo $data->query->results->channel->location->country. " -- ";

             ?>

            </td>
            <td style="padding-left: 8px;">
              Temperature :

              <?php
                echo $data->query->results->channel->item->condition->temp;
              ?>

              °
            </td>
            <td>
            Weather :

              <?php
                echo $data->query->results->channel->item->condition->text;
              ?>
            
    </div>
    <div class="fl_right">
      <ul>
        <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="login/login.php">Login</a></li>
        <li><a href="regist/daftar.php">Register</a></li>
      </ul>
    </div>
    
  </div>
</div>

<div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
      <li class="active"><a href="index.html">Home</a></li>
      <li><a href="resto.php">Cafe & Resto</a>
      </li>
      <li><a href="kunafe.php">Most Visited</a>
      </li>
      <li class="fl_right">  <p>
      <input class="btmspace-15" type="search" value="" placeholder=" Search...." style="font-size: 15px; border-radius: 10%">
          </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('http://www.tripcanvas.com/wp-content/uploads/2018/07/Post-19-Bandungs-Volcanic-lake-Img2.jpg'); height: 400px">
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h6 class="heading">Kawah Putih</h6>
    <!-- ################################################################################################ -->
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Destination</a></li>
      <li><a href="#">Bandung</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </div>
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <h1>Kawah Putih</h1>
      <img class="imgr borderedbox inspace-5" src="http://3.bp.blogspot.com/-CsJZ3u9oDpg/VmwH07ihrgI/AAAAAAAABlE/PNDkmpc9coc/s1600/Kawah%2BPutih%2BBandung.jpg" alt="" style="height: 250px">
      <p>
      <?php
      include('koneksi.php');
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM mytable";
      $result = mysqli_query($host, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($host).
           " - ".mysqli_error($host));
      }
      
      while($data = mysqli_fetch_assoc($result))
      {
        // mencetak / menampilkan data
        
        echo "<td>$data[deskripsi]</td><p>"; 
      }

      $query = "SELECT * FROM mytable LIMIT 1";
      $result = mysqli_query($host, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($host).
           " - ".mysqli_error($host));
      }
      
      while($data = mysqli_fetch_assoc($result))
      {
        
      echo"Alamat : $data[alamat] <br>";
      echo"Situs Resmi :<a> $data[situs_resmi]</a><br>";
      echo"Hari & Jam Operasional : $data[operasional] <br>";
      echo"Tiket Masuk Domestik : $data[domestik] <br>";
      echo"Tiket Masuk Mancanegara : $data[mancanegara] <br>";
      echo"Kapasitas : $data[kapasitas] <br>";
    }

      ?>


      <br>

      </div>
       <div id="googleMap" style="width:100%;height:500px;"></div>

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(-6.914744, 107.4022),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANUvaKs9WmrKVO6t7jGu6Ud1bS0VYTLR8&callback=myMap"></script>
</p>
<br>
        <h1>Comment</h1>
        <div id="disqus_thread"></div>
        <script type="text/javascript">
        (function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://https-127-0-0-1-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
    
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear">
      

    </div>
  </main>
</div>
</body>
</html>