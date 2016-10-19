<?php

function locate($pattern) {
	$iti = new RecursiveDirectoryIterator($_SERVER['DOCUMENT_ROOT']);
    foreach(new RecursiveIteratorIterator($iti) as $file){
         if(strpos($file , $pattern) !== false){
					 return $file;
         }
    }
    return false;
}

function locate_and_include($pattern) {
	$filepath = locate($pattern);
	if ($filepath==false) return false;
	include_once($filepath); return true;
}

// Run the common initialization tasks
//include configuration file 
$custom_path = locate('custom.php');
if( $custom_path==false )
{
		error_found ( E_USER_ERROR, "The custom.php file does not exist. Please copy the default.php file and mofify it to your environment", "init.php", 8);
} 
include_once($custom_path);


function error_found($level,$mymsg, $errfile, $errline){
 // header("Location: upss1.php");
  header("Message: ".$mymsg.' - '.$errfile.'('.$errline.')');
	global $allowedErrors,$allowingErrors;
	if ($allowingErrors && in_array($mymsg,$allowedErrors)) return true;
  include_once(locate('upss.php'));
	exit;
}

set_error_handler('error_found');

//include database connection details
locate_and_include('db.php');

date_default_timezone_set($timezone);

$home = sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME']
  );
// Get the shortener service
$service = $home.substr(locate(($site)?'/shorten.php':"fshorten.php"),strlen($_SERVER['DOCUMENT_ROOT']));

// invoking this file in the URL
if (strpos($_SERVER['REQUEST_URI'],substr(strrchr(__FILE__, "/"), 1))) {
?><html><head>
		<title> Nothing here </title>

		<!-- META -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Everything is working right here">
		<meta http-equiv="refresh" content="12;url=http://<?php echo $_SERVER['HTTP_HOST'];?>" />


  	<link href="http://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- CSS -->
    <style>
      
      html, body {
        padding: 0px;
        margin: 0px;
      }

      html {
        background: #ffffff!important;
        background: -moz-radial-gradient(center, ellipse cover,  #ffffff 0%, #f2f2f2 100%);
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,#ffffff), color-stop(100%,#f2f2f2));
        background: -webkit-radial-gradient(center, ellipse cover,  #ffffff 0%,#f2f2f2 100%);
        background: -o-radial-gradient(center, ellipse cover,  #ffffff 0%,#f2f2f2 100%);
        background: -ms-radial-gradient(center, ellipse cover,  #ffffff 0%,#f2f2f2 100%);
        background: radial-gradient(ellipse at center,  #ffffff 0%,#f2f2f2 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f2f2f2',GradientType=1 );
        height: 100%;
        min-height: 460px;
      }

      body {
      }

      hgroup {
        margin: 10% auto;
      }

      h1, h2, h3, h4, h5 {
        font-family: 'Josefin Slab', 'Times';
        text-shadow: 2px 2px 4px #999;
        text-align: center;
        margin: auto;
        color: #333;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      h1 {
        font-size: 68px;
      }

      h2 {
        margin-bottom: 7px;
        font-size: 30px;
      }

      h3 {
        font-size: 78px;
      }

      h4 {
        font-size: 72px;
      }

      h5 {
        font-size: 45px;
      }
			
      .text {
        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
          font-weight: 300;
        top: -9px;
        position: relative;
        font-size: 13px;
        color: #fff;
        top: 7px;
      }

      .small {
        font-size: 12px;
      }

      @media only screen and (max-width : 980px) {

        .text {
          width: 100%;
          text-align: center;
          position: absolute;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
          padding-right: 25px;
        }

      }

      @media only screen and (max-width : 650px) {

        h1 {
          font-size: 56px;
        }

				h2 {
					margin-bottom: 7px;
					font-size: 21px;
				}

				h3 {
					font-size: 69px;
				}

				h4 {
					font-size: 63px;
				}

				h5 {
					font-size: 36px;
				}


        hgroup {
          margin: 30% auto;
        }

      }  
								
    </style>

	
		<!-- MISC -->
<?php  locate_and_include('ga.php');?>


	<body>

		<hgroup>
			<h1> Congrats! </h1>
			<h3> Everything </h3>
			<h4> working right </h4>
		</hgroup>

  </body>
  
</html>
<?php	exit; 
}
?>
