<?php 

//include database connection details
include('db.php');

//insert new url

$url = $_POST['url'];

//echo $url;

//get random string for URL
$short = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5);

mysql_query("INSERT INTO urls (url_link, url_short, url_ip, url_date) VALUES

	(
	'".addslashes($url)."',
	'".$short."',
	'".$_SERVER['REMOTE_ADDR']."',
	'".time()."'
	)

");

		 
echo json_encode(array('url' => $_POST['url'],'short' => $short));




?>