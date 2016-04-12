<?php
//include configuration file 
if(file_exists('setup/custom.php'))
    include_once("setup/custom.php");
else {
	if(file_exists('setup/var.php'))
    	include_once("setup/var.php");
	else {
		echo "The var.php file does not exist. Please copy the var.origin.php file and mofify it to your environment";
		exit;
	}
}
//include tracking code. Use the file ga.php to include the code to embed for tracking purpose
if(file_exists('setup/ga.php'))
    include_once("setup/ga.php");
//include database connection details
include('setup/db.php');

date_default_timezone_set($timezone);

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.
?> 
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title><?php echo $title;?></title> 

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
		
		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/jquery.ferro.ferroMenu.css" type="text/css">
		<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="js/jquery.ferro.ferroMenu-1.1.min.js" type="text/javascript"></script>
		<script src="js/bubbles.js" type="text/javascript"></script>
		
		<script type="text/javascript">
		  window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var n=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(n?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var o=document.getElementsByTagName("script")[0];o.parentNode.insertBefore(a,o);for(var r=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["clearEventProperties","identify","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=r(p[c])};
		  heap.load("275512564");
		</script>
	</head> 
 
    <body class="target" onLoad="reloadBackground()">  
	
		<div id="hello"><?php echo $text;?></div>
		
		<?php if (!empty($muzak)) { ?>
		<div id="muzak">
			<audio autoplay loop>
  	    <source src="<?php echo $muzak;?>">
			</audio>	
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

	</body>

</html>