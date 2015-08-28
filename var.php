<?php

//Timezone for handle dates
$timezone = 'Europe/Madrid'; 

//mysql db connection information
$hostname = "127.0.0.1"; //your db host 
$database = "shortener"; //your database name
$username = "shortener"; //username for your database
$password = "00short00"; //password for your database

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
  array("Linkedin profile","http://www.linkedin.com/in/jotaeleene",'<i class="fa fa-linkedin fa-2" style="font-size: x-large;margin-top: 0.3em;"></i>'),
  array("Twitter timeline","https://twitter.com/jota_ele_ene",'<i class="fa fa-twitter fa-2" style="font-size: x-large;margin-top: 0.4em;"></i>'),
  array("Klout profile","http://klout.com/#/jota_ele_ene",'<span style="font-size: 1.6em;font-weight: bold;">K</span>'),
  array("Medium page","https://medium.com/@jota_ele_ene",'<img src="icons/M.gif" style="height: 20px;margin: 10px 5px;">'),
  array("GitHub page","https://github.com/jota-ele-ene",'<i class="fa fa-github fa-2" style="font-size: x-large;margin-top: 0.4em;"></i>'),
  array("Clarity page","https://clarity.fm/jota.ele.ene",'<img src="icons/C.gif" style="height: 20px;margin: 10px 5px;">'),
  );

?>
