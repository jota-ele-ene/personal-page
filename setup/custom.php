<?php

//mysql db connection information
$hostname = "127.0.0.1"; //your db host 
$database = "shortener"; //your database name
$username = "shortener"; //username for your database
$password = ""; //password for your database

//My site page contents
$title = "Are you looking for me?";
$text = "Hello world!";

$bubbles = 'YES';
$bubblesColor1 = '#FFFF00';
$bubblesColor2 = '#AAAAAA';
$bubblesColor3 = '#444444'; 

//Profiles to link
$profiles = array
  (
  // Each profile consists of alt,href,html
  array("Twitter timeline","https://twitter.com/jota_ele_ene",'<i class="fa fa-twitter fa-2" style="font-size: x-large;margin-top:8px;"></i>'),
//  array("Medium page","https://medium.com/@jota_ele_ene",'<img src="icons/M.gif" style="height: 20px;margin: 10px 5px;">'),
  array("Medium page","https://medium.com/@jota_ele_ene",'<i class="fa fa-medium fa-2" style="font-size: x-large;margin-top:8px;"></i>'),
  array("GitHub page","https://github.com/jota-ele-ene",'<i class="fa fa-github fa-2" style="font-size: x-large;margin-top:8px;"></i>'),
  array("Linkedin profile","https://es.linkedin.com/in/jotaeleene",'<i class="fa fa-linkedin fa-2" style="font-size: x-large;margin-top:8px;"></i>'),
  array("Bitcoin Address","https://blockchain.info/es/address/1BUTbrpKTo3f4P2SmkWqQooZxptRysobjr",'<i class="fa fa-btc fa-2" style="font-size: x-large;margin-top: 8px;"></i>'),
  array("PGP Key","https://keybase.io/jota_ele_ene/key.asc",'<i class="fa fa-key fa-2" style="font-size: x-large;margin-top: 8px;"></i>'),
  );

// Keywords for retrieving Unsplash pictures  
$keywords = array ("fruits", "nature", "city", "night", "people", "sea", "beach","mountain","water");


?>
