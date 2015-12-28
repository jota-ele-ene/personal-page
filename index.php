<?php
//include configuration file 
if(file_exists('custom.php'))
    include_once("custom.php");
else {
	if(file_exists('var.php'))
    	include_once("var.php");
	else
		echo "The var.php file does not exist. Please copy the var.origin.php file and mofify it to your environment";
		exit; 
}
//include tracking code. Use the file ga.php to include the code to embed for tracking purpose
if(file_exists('ga.php'))
    include_once("ga.php");
//include database connection details
include('db.php');

date_default_timezone_set($timezone);

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.

if (!empty($_GET['url'])) { 
    //	REtrieving target URL from url param containing shorten URL
	$result = mysql_query("SELECT url_link, url_hits FROM urls WHERE url_short = '".addslashes($_GET['url'])."'");
 
	if (!$result) {
		echo "Could not successfully run the shortener (" . mysql_error().")";
		exit; 
	} 

	if (mysql_num_rows($result) == 0) {
        //	No shorten URL found. Redirecting to home
		header('HTTP/1.1 301 Moved Permanently');  
		header("Location: ".$_SERVER['HTTP_HOST']);  
		exit;
	} 
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
//

//insert new url
if ($_POST['url']) {

//get random string for URL
$short = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5);

mysql_query("INSERT INTO urls (url_link, url_short, url_ip, url_date) VALUES

	(
	'".addslashes($_POST['url'])."',
	'".$short."',
	'".$_SERVER['REMOTE_ADDR']."',
	'".time()."'
	)

");

$redirect = "?s=$short";
header('Location: '.$redirect); die;

}
//


function getNewBackground()
{
	 return "https://unsplash.it/1280/720?random";
}


?> 
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title><?php echo $title;?></title> 

		<style> 
		body {    
			background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  -webkit-background-size: cover;
		      transition: background 1s linear;
		}	
		 
		*{
			margin:0;
			padding:0;
		}
		
		body{
			font-family:Arial;
			font-size:12px;
		}
		
		p.background--light {
		  color: black;
		}

		p.background--dark {
		  color: white;
		}

		p.background--complex {
		  color: gray;
		}

		#hello{
		   color: white;
			font-family: monospace;
			position: fixed;
			text-align: center;
			font-size: 8em;
			WIDTH: 100%;
			HEIGHT: 20%;
			TOP: 40%;
		}
	 	
/*
		:invalid { 
		  border-color: #e88;
		  -webkit-box-shadow: 0 0 5px rgba(255, 0, 0, .8);
		  -moz-box-shadow: 0 0 5px rbba(255, 0, 0, .8);
		  -o-box-shadow: 0 0 5px rbba(255, 0, 0, .8);
		  -ms-box-shadow: 0 0 5px rbba(255, 0, 0, .8);
		  box-shadow:0 0 5px rgba(255, 0, 0, .8);
		}
*/
		:required {
		  border-color: #88a;
		  -webkit-box-shadow: 0 0 5px rgba(0, 0, 255, .5);
		  -moz-box-shadow: 0 0 5px rgba(0, 0, 255, .5);
		  -o-box-shadow: 0 0 5px rgba(0, 0, 255, .5);
		  -ms-box-shadow: 0 0 5px rgba(0, 0, 255, .5);
		  box-shadow: 0 0 5px rgba(0, 0, 255, .5);
		}

		form {
		  width:300px;
		  margin: 20px auto;
		}

		input {
		  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		  border:1px solid #ccc;
		  font-size:20px;
		  width:300px;
		  min-height:30px;
		  display:block;
		  margin-bottom:15px;
		  margin-top:5px;
		  outline: none;

		  -webkit-border-radius:5px;
		  -moz-border-radius:5px;
		  -o-border-radius:5px;
		  -ms-border-radius:5px;
		  border-radius:5px;
		}

		input[type=submit] {
		  /*background:none;
		  padding:10px;*/
		}
		
		table {
			border-collapse:collapse; 
			table-layout:fixed; 
			width:410px;
		}
		
		table td { 
			border:solid 1px #fab; 
			width:100px; 
			word-wrap:break-word;
		}
		  
		.compare-select-wrapper { min-width: 60%; float: right; } 
  
		</style>
		<script type="text/javascript">
			function reloadBackground() {  
				var root = document.getElementsByTagName("body")[0];
				var now = new Date();
				var url = "https://unsplash.it/"+screen.width+"/"+screen.height+"?random&"+now.getTime();
				var img = new Image();
				img.onload = function() { root.style.background = "url("+url+") no-repeat center center fixed"; }
				img.src = url;
				if (img.complete) img.onload();
				setTimeout(reloadBackground,15000);  
			}
		</script> 

		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/jquery.ferro.ferroMenu.css" type="text/css">
		<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="js/jquery.ferro.ferroMenu-1.1.min.js" type="text/javascript"></script>
		<script src="js/bubbles.js" type="text/javascript"></script>
		
		
		<?php if (!empty($_GET['stats'])) { ?>
			<link rel="stylesheet" href="css/tablesorter.blue.css">
			<link rel="stylesheet" href="css/jquery-ui.min.css">
			<!-- filter formatter code -->
			<link rel="stylesheet" href="css/filter.formatter.css">
			<!-- jQuery UI for range slider -->
			<script src="js/jquery-ui-latest.min.js"></script>
			<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
			<script type="text/javascript" src="js/jquery.tablesorter.widgets.min.js"></script>
			<script type="text/javascript" src="js/jquery.tablesorter.widgets-filter-formatter.js"></script>
		<?php } ?>
		<script type="text/javascript">
		  window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var n=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(n?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var o=document.getElementsByTagName("script")[0];o.parentNode.insertBefore(a,o);for(var r=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["clearEventProperties","identify","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=r(p[c])};
		  heap.load("275512564");
		</script>
	
	</head> 
 
    <body class="target" onLoad="reloadBackground()">  
	
		<div id="hello"><?php echo $text;?></div>
		
		<div id="muzak">
			<audio autoplay loop>
  	    <source src="xmas.mp3">
			</audio>	
		</div>
		
		<div id="shortener" style="position: absolute; z-index: 100; height: 10px; display: none;top: 200px;left: 50%;margin-left: -150px;">
			<div id="shortenerResult"></div>
			<form id="form1" name="form1" method="post" action="">
				<input name="url" type="url" id="url" placeholder="Tell me the URL to short" size="75" required />
				<input type="submit" name="Submit" value="Short" />
			</form>
		</div>
 
		<?php if (!empty($_GET['stats'])) { ?>
			<div id="stats" style="position: absolute; z-index: 100; top: 200px;left: 50%;margin-left: -520px;"> 
				<table id="stats" class="tablesorter-blue">
				  <thead><strong><tr><th width="640px">URL</th><th width="60px">SHORT</th><th width="25px">HITS</th><th width="220px">DATE</th></tr></strong></thead>
				  <tbody>
				  <?php 
					$result = mysql_query("SELECT url_link, url_short, url_hits, url_date FROM urls ORDER BY url_date DESC");
					while ($row = mysql_fetch_assoc($result)) { ?> 
						<tr>
						  <td width="640px"><a target="_blank" href="<?php echo $row["url_link"];?>"><?php echo $row["url_link"];?></a></td>
						  <td width="60px"><?php echo $row["url_short"];?></td>
						  <td width="25px"><?php echo $row["url_hits"];?></td>
						  <td width="220px"><?php echo date("D, d M Y - H:i:s",$row["url_date"]);?></td>
						</tr>
					<?php }?>
				  </tbody>
				</table>
			</div>
		<?php } ?>

		<div id="canvasBubbles" style="position:relative; height:100%; width:100%"></div>
		<div id="ferroMenu">
			<ul id="nav"> 
			    <?php 
			    foreach ($profiles as $profile) {
                     echo '<li><a href="'.$profile[1].'" alt="'.$profile[0].'" target="_blank">'.$profile[2].'</a></li>';
			    }
			    ?>
			</ul>
		</div>
		
    	<script> 
	    	$(document).ready(function() {

            	<?php if ($bubbles = 'YES') {?>
			    	
				    bubblesMain(new Object({
						type : 'radial',
						revolve : 'center',
						minSpeed : 100,
						maxSpeed : 500,
						minSize : 50,
						maxSize : 150,
						num : 100,
						colors : new Array( "<?php echo $bubblesColor1;?>",
						                    "<?php echo $bubblesColor2;?>",
						                    "<?php echo $bubblesColor3;?>") 
					    })
    				);
    				
    			<?php } ?>
    			
	    		$("#nav").ferroMenu({ 
				       drag	    : false,
				       position    : "center-top",
				       radius	    : 100,
					   delay       : 0,
					   rotation    : 720,
				       margin      : 20
						}
		    	); 
			    $("a#ferromenu-controller").click( function() {
						$.fn.ferroMenu.toggleMenu("#nav"); 
				});
			    
			    $("div#canvasBubbles").click( function() {
					    $("div#shortener").toggle(); 
				});
				
			});

		</script> 

		<!--if form was just posted-->
		<?php if (!empty($_GET['s'])) { ?>
		<script>
			    $("div#shortenerResult").html('<h2>The short URL: <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo $_GET['s']; ?>" target="_blank"><?php echo "http://jln.bz/"; ?><?php echo $_GET['s']; ?></a></h2>').show();
				$("div#shortener").show();				
				$("div#hello").hide();				
		</script>
		<?php } ?>
		<!---->
		
	</body>

</html>