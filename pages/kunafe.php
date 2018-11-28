<!DOCTYPE html>
<?php
//Get videos from channel by YouTube Data API
$API_key    = 'AIzaSyBas41zZ6n4pLrma8pWtLZZ6VYB9UYZwu0';
$channelID  = 'UCWuE-Km7b2jl8e22Z2Y0nzw';
$maxResults = 1;

$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));
?>
<html>
<?php
require ("../login/Facebook/autoload.php");
session_start();

?>
<head>
<title>Cabskuy Food</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
  <div class="bgded overlay" style="background-image:url('https://i.ytimg.com/vi/Cqbh426neXQ/maxresdefault_live.jpg'); height: 400px">
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h1 class="heading">Bandung Kunafe</h1>
    <p> Bandung Kunafe berbahan dasar Japanese Cheese cake diolah menjadi filling berbagai rasa di antaranya: Kunafe Cheese, Kunafe Greentea, Kunafe Chocolate, Kunafe Tiramisu, Kunafe Nutella, dan Kunafe Durian. Sehingga memudahkan kamu untuk memilih rasa sesuai selera yang dapat menemani di berbagai situasi.</p>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
  </div>

</div>
<div class="wrapper row3" style="background-image: url('https://www.desktopbackground.org/download/o/2013/06/15/592513_download-plain-white-backgrounds-8193-2560x1600-px-high-resolution_2560x1600_h.jpg'); color: ">
  <main class="hoc container clear"> 
    <ul class="nospace group services">
      <div class="txtwrap">
		      <?php
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://developers.zomato.com/api/v2.1/search?q=BandungKunafe&start=0&count=1");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		$headers = array(
		  "Accept: application/json",
		  "User-Key: 7e65f6409e8d39fa84c0a49a5c77fc06"
		  );
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
   		$zomdata = json_decode($result);
			$zomrestaurants = $zomdata->restaurants;
			//echo "<pre>"; print_r($zomrestaurants); echo "</pre>";
			    
			foreach ($zomrestaurants as $restaurant) {
			  echo "<h1>".@$restaurant->restaurant->name."</h1><p>";
			  echo "<h3>".@$restaurant->restaurant->location->address. "</h3><p>";
			  echo "<h6> Category : ".@$restaurant->restaurant->cuisines."</h6><br><hr>";
		?>
			<div class="w3-content w3-display-container" style="padding-bottom: 30px">
			  <img class="mySlides" src="https://i.ytimg.com/vi/Cqbh426neXQ/maxresdefault_live.jpg" style="width:100%">
			  <img class="mySlides" src="https://bandungkunafe.com/wp-content/uploads/2017/03/kunafe-product-info-bg-2.jpg" style="width:100%">
			  <img class="mySlides" src="https://bandungkunafe.com/wp-content/uploads/2018/01/titles-2.png" style="width:100%">
			</div>
			<h2>
			<div style="width: 100%; text-align: center; border-radius: 4px; border:none;">
		<?php
			echo "Prices Range : ".@$restaurant->restaurant->average_cost_for_two ." average for ".@$restaurant->restaurant->price_range." peoples<br>";
			echo "Operational Hour : 07.00 AM - 10.00 PM <hr><p> </h2>";
			echo "<h4>Another Services : ".@$restaurant->restaurant->opentable_support."<p></div>"; 
		?>
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
      </div>
      <?php
        foreach($videoList->items as $item){
    //Embed video
    if(isset($item->id->videoId)){
        echo '<h1>Bandung Kunafe Videos</h1>
              <div class="youtube-video">
                <iframe width="100%" height="450" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                
            </div><hr>';
          }
      }
?>
      </div>
		
		<?php
			}
		
		?>      
      </div>
      <center>
      <h2> Customer Review </h2> </center>
      <div class="wrapper row4">

      <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
      <?php
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://developers.zomato.com/api/v2.1/reviews?res_id=18597581&start=0&count=5");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		$headers = array(
		  "Accept: application/json",
		  "User-Key: 7e65f6409e8d39fa84c0a49a5c77fc06"
		  );
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
   		$zomdata = json_decode($result);
			$zomrestaurants = $zomdata->user_reviews;
			//echo "<pre>"; print_r($zomrestaurants); echo "</pre>";
			    
			foreach ($zomrestaurants as $user_reviews) { ?>
			<table style="border-radius: 4px">
				<tr>
				<td><?php echo "<img style='border-radius:5px' src='".@$user_reviews->review->user->profile_image."'>"; ?></td>
				<?php echo "<h3>".@$user_reviews->review->user->name."</h3> Rating ".@$user_reviews->review->rating." of 5 ".@$user_reviews->review->rating_text; ?> <br>

				Likes <?php  echo @$user_reviews->review->likes; ?>
					<td> <?php echo "<h6>".@$user_reviews->review->review_text."</h6> ";?></td></tr>
				
				<?php
			}


				?>
				</table>	
			<form>
			<h2> Leave a Comment </h2> <br>
			<table>
			<tr>
			<td>
			    
			    <input type="text" name="name" maxlength="100" placeholder="Enter Your Full Name Here" style="padding: 5px">
			</td></tr>
			<tr>
			<td>
			    <input type="text" name="email" maxlength="100" placeholder="Enter Your Email Here">
			</td></tr>
			<tr>
			<td>
			    <input type="text" name="komen" maxlength="500" placeholder="Enter your comment here" style="height: 100px; word-wrap: all;"></input>
			</td></tr>
			</table>
				<input type="submit" value="Send" style="width: 300px; float: right;" />
				
			
			
			
			


			
      </div>






		

</div>
</body>
			<script>
			var myIndex = 0;
			carousel();

			function carousel() {
			    var i;
			    var x = document.getElementsByClassName("mySlides");
			    for (i = 0; i < x.length; i++) {
			       x[i].style.display = "none";  
			    }
			    myIndex++;
			    if (myIndex > x.length) {myIndex = 1}    
			    x[myIndex-1].style.display = "block";  
			    setTimeout(carousel, 9000);    
}
</script>
</html>
