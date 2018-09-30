<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '668333685560-9105rgsr3jgi1l6801fvculrd1jsv7rq.apps.googleusercontent.com'; //Google client ID
$clientSecret = '4GXvvh-dILryeEU6QhZfTcw_'; //Google client secret
$redirectURL = 'http://www.w3tweaks.com/googlelogin'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to W3tweaks.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>