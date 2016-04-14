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
//include tracking code. Use the file ga.php to include the code to embed for tracking purpose
if(file_exists('../setup/ga.php'))
    include_once("../setup/ga.php");
//include database connection details
include('../setup/db.php');

date_default_timezone_set($timezone);

header('Cache-Control: max-age=0, no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.

$home = $_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);

if (!empty($_GET['url'])) { 
    //	REtrieving target URL from url param containing shorten URL
	$result = mysql_query("SELECT url_link, url_hits FROM urls WHERE url_short = '".addslashes($_GET['url'])."'");
 
	if (!$result) {
		echo "Could not successfully run the shortener (" . mysql_error().")";
		exit; 
	} 

	if (mysql_num_rows($result) == 0) {
        //	No shorten URL found. Redirecting to home
		echo "No shorten URL found for url=".$_GET['url']." Redirecting to home (" . $home .")";
		$command = "?cmd=".$_GET['url'];
		//header('HTTP/1.1 301 Moved Permanently');  
		//header("Location: ".$home);  
		//exit;
	}
	else {
    	while ($row = mysql_fetch_assoc($result)) {
    		//Shorten URL found - Forwarding
    		$redirect = $row["url_link"];
    		$hits = $row["url_hits"]+1; 
    	}
    	echo $hits.','.$redirect;
    	mysql_query("UPDATE urls SET url_hits=".$hits." WHERE url_short = '".addslashes($_GET['url'])."'");
    	header('HTTP/1.1 301 Moved Permanently');  
    	header("Location: ".$redirect);  
	}
}
else {
    echo "No url param";
}

header('HTTP/1.1 301 Moved Permanently');  
header("Location: http://".$home.$command);  

?> 

