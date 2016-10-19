<?php

//include configuration file 
require_once('../setup/init.php');

header('Cache-Control: max-age=0, no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.

$command = str_replace('/', '', $_GET['url']);

if (strcmp(__FILE__, $command) == 0) {
	header('HTTP/1.1 301 Moved Permanently');  
	header("Location: ".$home);  
 	header("Result:  No command to forward");  
	exit;
}
else if (array_key_exists($command, $features)) {
	header('HTTP/1.1 301 Moved Permanently');  
	header("Location: ".$home."?cmd=".$command);  
 	header("Command: ".$command);  
	exit;
	
}


if (empty($site)) {
		error_found ( E_USER_ERROR, "No data base available and '/".$command."' is not a valid path", "fwd.php", 13);
}

if (!empty($command)) { 
    //	REtrieving target URL from url param containing shorten URL
	$result = mysql_query("SELECT url_link, url_hits FROM urls WHERE url_short = '".addslashes($command)."'");
 
	if (!$result) {
		error_found ( E_USER_ERROR, "Could not successfully run the shortener (" . mysql_error().")"); // Proxies.
	} 

	if (mysql_num_rows($result) == 0) {
		//	No shorten URL found. Redirecting to home
		error_found ( E_USER_ERROR, "No shorten URL found for url=".$command." Redirecting to home (" . $home .")","fwd.php",27);
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
    	header("Result: Redirect to ".$redirect);  
    	exit;
	}
}
else {
		error_found ( E_USER_ERROR, "Empty command"); // Proxies.
}

header('HTTP/1.1 301 Moved Permanently');  
header("Location: http://".$home."/".$command);  
header("Result: Exiting http://".$home."/".$command);  

?> 

