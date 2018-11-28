<!DOCTYPE html>
<html>
<?php
require ("../login/Facebook/autoload.php");
session_start();

?>
<head>
<title>Food And Drinks</title>
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
      <li ><a href="index.html">Home</a></li>
      <li class="active"><a href="#">Cafe & Resto</a>
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
<div class="bgded overlay" style="background-image:url('https://stmed.net/sites/default/files/food-wallpapers-28249-8282567.jpg'); height: 400px">
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h1 class="heading">Food and Drinks Location</h1>
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
			curl_setopt($ch, CURLOPT_URL, "https://developers.zomato.com/api/v2.1/search?q=Bandung&start=0&count=10");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			$headers = array(
			  "Accept: application/json",
			  "User-Key: f0baf53bd8c31d3c625e9d9c0d379379"
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
			  echo "<h3>".@$restaurant->restaurant->name."</h3>";
			  echo "Restaurant ID: ".@$restaurant->restaurant->id."<br/>";
			  echo "User rating: ".@$restaurant->restaurant->user_rating->rating_text."( ".@$restaurant->restaurant->user_rating->aggregate_rating."/5 ) Depending upon ".@$restaurant->restaurant->user_rating->votes." votes<br/>";
			
			  echo @$restaurant->restaurant->location->address.", ".@$restaurant->restaurant->location->city." <p> <a href='".@$restaurant->restaurant->url."'>Visit restaurant page</a><br/>";
			  echo "<br/><hr>";
			  //echo "<pre>"; print_r($restaurant->restaurant); echo "</pre>";
			}
			?>
			
			</ul>
			</main>
			
			<div class="center">
			<div class="pagination">
			  <a href="#">&laquo;</a>
			  <a href="#">1</a>
			  <a href="#" class="active">2</a>
			  <a href="#">3</a>
			  <a href="#">4</a>
			  <a href="#">5</a>
			  <a href="#">6</a>
			  <a href="#">&raquo;</a>
			</div>
			</div>






















</body>
<style type="text/css">
			.center {
				    text-align: center;
				}

				.pagination {
				    display: inline-block;
				}

				.pagination a {
				    color: black;
				    float: left;
				    padding: 8px 16px;
				    text-decoration: none;
				    transition: background-color .3s;
				   
				    margin: 0 4px;
				}

				.pagination a.active {
				    background-color: #8888;
				    color: white;
				}

				.pagination a:hover:not(.active) {background-color: #ddd;}
			
			

			</style>

</html>









