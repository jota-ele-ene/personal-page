<?php 

//include configuration file 
require_once('../setup/init.php');

//insert new url

//if (empty($url)) {
if (strpos($_SERVER['REQUEST_URI'], 'fshorten.php') !== false) {
    $url = $_POST['url'];
    $server = $_SERVER['REMOTE_ADDR'];
}
else $server = "LOCALHOST";

//get random string for URL
$short = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5);

$handler = fopen($_SERVER['DOCUMENT_ROOT']."/features/fdb/".$short, "w+");
fwrite($handler,addslashes($url)." ".$server." ".time()." 00000"); 
fclose($handler);
		 
if (strpos($_SERVER['REQUEST_URI'], 'fshorten.php') !== false) 
     echo json_encode(array('ret' => '0', 'url' => addslashes($url),'short' => $short));

?>