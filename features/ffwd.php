<?php

//include configuration file 
require_once('../setup/init.php');

header('Cache-Control: max-age=0, no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.

$command = str_replace('/', '', $_GET['url']);

if (strcmp(__FILE__, $command) == 0) {
	header('HTTP/1.1 301 Moved Permanently');  
	header("Location: http://".$home);  
 	header("Result:  No command to forward");  
	exit;
}
else if (array_key_exists($command, $features)) {
	header('HTTP/1.1 301 Moved Permanently');  
	header("Location: http://".$home."?cmd=".$command);  
 	header("Command: ".$command);  
	exit;
	
}

if (!empty($command)) { 
    //	REtrieving target URL from url param containing shorten URL
	$handler = fopen($_SERVER['DOCUMENT_ROOT']."/features/fdb/".$command, "r+");
	if ($handler) {
		$linkinfo = fscanf($handler, "%s %s %s %s\n");
		fseek($handler, -5, SEEK_END);
 		$redirect = $linkinfo[0];
 		$hits = sprintf('%05d', intval($linkinfo[3])+1);
   	echo $hits.','.$redirect;
		fwrite($handler,$hits); 
		fclose($handler);
    header('HTTP/1.1 301 Moved Permanently');  
    header("Location: ".$redirect);  
    header("Result: Redirect to ".$redirect);  
    exit;
	}
	else {
		error_found ( E_USER_ERROR, "No shorten URL found for url=".$command." Redirecting to home (" . $home .")","ffwd.php",27);
	}
}
else {
		error_found ( E_USER_ERROR, "Empty command"); // Proxies.
}

header('HTTP/1.1 301 Moved Permanently');  
header("Location: http://".$home."/".$command);  
header("Result: Exiting http://".$home."/".$command);  

?> 

