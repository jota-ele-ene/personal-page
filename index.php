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

header('Cache-Control: max-age=0, no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.
?> 
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title><?php echo $title;?></title> 

		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		
		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/jquery.ferro.ferroMenu.css" type="text/css">
		<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="js/jquery.ferro.ferroMenu-1.1.min.js" type="text/javascript"></script>
		<script src="js/bubbles.js" type="text/javascript"></script>
		<script src="js/jquery.fullbg.js" type="text/javascript"></script>
		
	</head> 
 
    <body class="target" onLoad="loadBackgrounds()">  

        <img src="https://source.unsplash.com/random?nature=9149174914" class="fullbg active" alt="" id="background" />
        <img src="https://source.unsplash.com/random?people=he8q8e9q09" class="fullbg hidden" alt="" id="background" />

        <div id="maincontent">

    		<div id="hello"><?php echo $text;?></div>
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
    		
		<?php if (!empty($_GET['cmd'])) { 
		    $cmd = $_GET['cmd'];
            if (array_key_exists($cmd, $features)) {
                if(file_exists('features/'.$features[$cmd]))
                    include_once('features/'.$features[$cmd]);
            }
        } ?>

        
        </div>

		<?php if (!empty($muzak)) { ?>
		<div id="muzak">
			<audio autoplay loop>
  	    <source src="<?php echo $muzak;?>">
			</audio>	
		</div>
		<?php } ?>

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

			function loadBackgrounds() {  

            	$("img.active").fullBg();
            	$("img.hidden").fullBg();
                setTimeout($("img.active").fadeToggle(3000),3000);
                setTimeout(reloadBackground,9000);  
			}

			function reloadBackground() {  

                var keywords = [];

                $("img.fullbg").fadeToggle(3000);
                setTimeout(function(){ 
         	        $("img.fullbg").toggleClass("active");
         	        $("img.fullbg").toggleClass("hidden");
                    $("img.hidden").attr('src', "https://source.unsplash.com/random?<?php echo $keywords[array_rand($keywords)];?>=" + new Date().getTime());
                    $("img.hidden").fullBg();
                    setTimeout(reloadBackground,3000);  
                }, 3000);
			}

		</script> 

	</body>

</html>