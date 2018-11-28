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
          $json = file_get_contents("https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22".$queryss['city']."%22)and%20u%3D%22c%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys");
                
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
<div class="bgded overlay" style="background-image:url('https://www.liburankebandung.com/wp-content/uploads/2018/05/Gedung-Sate-Bandung.jpg'); height: 400px">
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h6 class="heading">Bandung</h6>
    <!-- ################################################################################################ -->
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Destination</a></li>
      <li><a href="#">Bandung</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <h1>Bandung</h1>
      <img class="imgr borderedbox inspace-5" src="https://4.bp.blogspot.com/-Z9ASJdsjjIs/WHJj6uEOXjI/AAAAAAAADX8/h1wGF75YxG4W92SrhPREZeasp5IDKQUfgCLcB/s1600/braga_malam.jpg" alt="" style="height: 250px">
      <p>Bandung is the capital city of West Java, and the third largest city in Indonesia after Jakarta and Surabaya. Nicknamed Parijs van Java (Paris of Java) by the Dutch for its resemblance to Paris and European atmosphere back in colonial times, Bandung also earned another nickname as Kota Kembang,
      literally meaning the Flower City since Bandung used to have a lot of flowers.
      Being located at the altitude of 768m and surrounded by the lush and beautiful Parahyangan mountains makes the climate mild and pleasant. The city has been well known for its universities, fashionable clothing and as a great place for gastronomic adventure. Nowadays, Bandung has become a very popular weekend escape for Jakartans, who would crowd the city on weekends and national holidays.
      <p>
      Bandung, the capital of West Java province, located about 180 kilometres (110 mi) southeast of Jakarta, is the third largest city in Indonesia. Its elevation is 768 metres (2,520 ft) above sea level and is surrounded by up to 2,400 metres (7,900 feet) high Late Tertiary and Quaternary volcanic terrain.[7] The 400 km2 flat of central Bandung plain is situated in the middle of 2,340.88 square kilometres (903.82 sq mi) wide of the Bandung Basin; the basin comprises Bandung, the Cimahi city, part of Bandung Regency, part of West Bandung Regency, and part of Sumedang Regency.[8] The basin's main river is the Citarum; one of its branches, the Cikapundung, divides Bandung from north to south before it merges with Citarum again in Dayeuhkolot. The Bandung Basin is an important source of water for potable water, irrigation, and fisheries, with its 6,147 million m3 (217.1 billion cu ft) of groundwater being a major reservoir for the city.[8] The northern section of Bandung is hillier than other parts of the city, and the distinguished truncated flat-peak shape of the Tangkuban Perahu volcano (Tangkuban Perahu literally means 'upside-down boat') can be seen from the city to the north. Long-term volcanic activity has created fertile andisol soil in the north, suitable for intensive rice, fruit, tea, tobacco, and coffee plantations. In the south and east, alluvial soils deposited by the Cikapundung river predominate.


      <br>

      </div>
      <div>
        <?php
        foreach($videoList->items as $item){
    //Embed video
    if(isset($item->id->videoId)){
        echo '<h1>Videos Of Bandung</h1>
              <div class="youtube-video">
                <iframe width="100%" height="450" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                
            </div>';
          }
      }
?>
      </div>
      <br>
      <div id="gallery">
        <figure>
          <header class="heading">Gallery of Bandung</header>
          <ul class="nospace clear">
            <li class="one_quarter first"><a href="#"><img src="https://media-cdn.tripadvisor.com/media/photo-s/0e/8c/e9/6a/alun-alun-kota-bandung.jpg" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="http://www.infobdg.com/v2/wp-content/uploads/2016/09/alun-alun-1024x683.jpg" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="https://www.liburankebandung.com/wp-content/uploads/2018/05/Gedung-Sate-Bandung.jpg" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="https://media.travelingyuk.com/wp-content/uploads/2018/07/bandung-streetfood.jpg" alt=""></a></li>
            <li class="one_quarter first"><a href="#"><img src="https://cdn.sindonews.net/dyn/620/jabar/news/2018/08/23/1/851/atasi-kemacetan-wacana-tol-dalam-kota-bandung-dibahas-vwf.jpg" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="https://infobandung.co.id/wp-content/uploads/2016/10/WELCOME-BANDUNG.jpg" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="https://cdn-images-1.medium.com/max/1600/1*fXUw6pguZX79zzU4KFJpGg.jpeg" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="http://ayobandung.com/images-bandung/post/articles/2016/02/01/6924/1.-2_-balai-kota-bandung.jpg" alt=""></a></li>
            <li class="one_quarter first"><a href="#"><img src="https://2.bp.blogspot.com/-LqpKO0o4Idk/WZnLLE2KcxI/AAAAAAAAFLc/7dLz-GiTg2MDjJ_F2Cp2ibi4vKMHidM-gCLcBGAs/s1600/Chinatown%2BJalan%2BKelenteng%2BBandung.jpg" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="https://cdns.klimg.com/merdeka.com/i/w/news/2015/09/30/602229/670x335/4-julukan-bagi-kota-bandung-dari-yang-keren-sampai-jorok.jpg" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="https://media.travelingyuk.com/wp-content/uploads/2017/02/Taman-Film-Bandung.jpg" alt=""></a></li>
            <li class="one_quarter"><a href="#"><img src="https://travelnesia.xyz/wp-content/uploads/2018/07/Tiket-Masuk-Kota-Mini-Lembang-Bandung.png" alt=""></a></li>
          </ul>
          <figcaption>Gallery Description Goes Here</figcaption>
        </figure>
      </div>
      <div id="googleMap" style="width:100%;height:500px;"></div>

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(-6.914744, 107.609810),
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
<script>


(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://https-127-0-0-1-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<div>
  <script>
    (function(){
      // Query the TourCMS API
    $result = $tourcms->list_channels();

    // Loop through each channel
    foreach($result as $channel) {
      // Print out the channel name
      print $channel->channel_name.'<br />';
    }
  </script>
</div>
<div>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="heading">Our Location</h6>
      <ul class="nospace btmspace-30 linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Perumahan Permata Buah Batu, Blok C64, Bandung, Jawa Barat
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +62822 1834 7960</li>
        <li><i class="fa fa-envelope-o"></i> cabskuy@gmail.com</li>
      </ul>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul>
    </div>
    <div class="one_third">
      
    </div>
    <div class="one_third">
      <h6 class="heading">Call Us</h6>
      <p class="nospace btmspace-30">Enter your email address and your name to receive our information</p>
      <form method="post" action="#">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="" placeholder="Name">
          <input class="btmspace-15" type="text" value="" placeholder="Email">
          <button type="submit" value="submit">Submit</button>
        </fieldset>
      </form>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
<script src="../layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>