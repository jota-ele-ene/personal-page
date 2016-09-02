<?php

//*******************************************************
//  Variables needed for customizing the home page styles
//*******************************************************

//My site page contents
$title = "Are you looking for me?";
$text = "Hello world!";

//Choose the colors you like to customize the final page
$bubbles = 'YES';
$bubblesColor1 = '#FFFF00';
$bubblesColor2 = '#AAAAAA';
$bubblesColor3 = '#444444'; 

//Profiles to link from the page
$profiles = array
  (
  // Each profile consists of alt,href,html. Insert as many profiles and you want. The icon is rendered from FontAwesome
  array("Twitter timeline","<insert here your own Twitter timeline URL>",'<i class="fa fa-twitter fa-2" style="font-size: x-large;margin-top: 0.4em;"></i>'),
  array("Medium page","<insert here your own Twitter timeline URL>",'<i class="fa fa-medium fa-2" style="font-size: x-large;margin-top: 0.4em;"></i>'),
  array("GitHub page","<insert here your own Github profile>",'<i class="fa fa-github fa-2" style="font-size: x-large;margin-top: 0.4em;"></i>'),
  );

// Keywords for retrieving Unsplash pictures  
$keywords = array ("fruits", "nature", "city", "night", "people", "sea", "beach","birds","desert");

//$muzak = <insert here an audio file>;

//Features to run if command
//$features = array
//  (
//   'short' => 'shortener.php',
//   'upload' => 'upload.php',
//  );

//*****************************************************
//  Variables needed for enabling the shortener feature
//*****************************************************

//Timezone for handle dates
$timezone = 'Europe/Madrid'; 

//mysql db connection information - this is only need for the shortener - update with your own data
$hostname = "127.0.0.1"; //your db host 
$database = "shortener"; //your database name
$username = "shortener"; //username for your database
$password = "00short00"; //password for your database



?>
