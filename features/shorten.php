<?php 

//include configuration file 
if(file_exists('../setup/custom.php'))
    include_once("../setup/custom.php");
else {
	if(file_exists('../setup/var.php'))
    	include_once("../setup/var.php");
	else {
		echo "The var.php file does not exist. Please copy the var.origin.php file and mofify it to your environment";
		exit;
	}
}
//include database connection details
include('../setup/db.php');


//insert new url

//if (empty($url)) {
if (strpos($_SERVER['REQUEST_URI'], 'shorten.php') !== false) {
    $url = $_POST['url'];
    $server = $_SERVER['REMOTE_ADDR'];
}
else $server = "LOCALHOST";

//echo $url;

//get random string for URL
$short = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5);

$ret = mysql_query("INSERT INTO urls (url_link, url_short, url_ip, url_date) VALUES

	(
	'".addslashes($url)."',
	'".$short."',
	'".$server."',
	'".time()."'
	)

");

if ($ret == false) $ret = mysql_error().'('.$hostname.','.$username.','.$password.')';
		 
if (strpos($_SERVER['REQUEST_URI'], 'shorten.php') !== false) 
     echo json_encode(array('ret' => $ret, 'url' => addslashes($url),'short' => $short));




?>