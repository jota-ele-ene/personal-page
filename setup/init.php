<?php

// Run the common initialization tasks
//include configuration file 
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/setup/custom.php'))
{
  include_once($_SERVER['DOCUMENT_ROOT']."/setup/custom.php");
}
else 
{
		error_found ( E_USER_ERROR, "The custom.php file does not exist. Please copy the default.php file and mofify it to your environment", "init.php", 8);
}

function error_found($level,$mymsg, $errfile, $errline){
  //header("Location: upss1.php");
	global $allowedErrors,$allowingErrors;
	if ($allowingErrors && in_array($mymsg,$allowedErrors)) return true;
  include_once($_SERVER['DOCUMENT_ROOT'].'/upss.php');
	exit;
}

set_error_handler('error_found');

//include database connection details
include($_SERVER['DOCUMENT_ROOT'].'/setup/db.php');

date_default_timezone_set($timezone);

$home = $_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/features') + 1);
$service = "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1).'features/fshorten.php';

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
		<script type="text/javascript">

			var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-35944549-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>

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
