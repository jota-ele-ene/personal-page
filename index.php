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

        <!-- Bootstrap styles -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!-- Generic page styles -->
        <link rel="stylesheet" href="//blueimp.github.io/jQuery-File-Upload/css/style.css">
        <!-- blueimp Gallery styles -->
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="//blueimp.github.io/jQuery-File-Upload/css/jquery.fileupload.css">
        <link rel="stylesheet" href="//blueimp.github.io/jQuery-File-Upload/css/jquery.fileupload-ui.css">
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript><link rel="stylesheet" href="//blueimp.github.io/jQuery-File-Upload/css/jquery.fileupload-noscript.css"></noscript>
        <noscript><link rel="stylesheet" href="//blueimp.github.io/jQuery-File-Upload/css/jquery.fileupload-ui-noscript.css"></noscript>
		
	</head> 
 
    <body class="target" onLoad="loadBackgrounds()">  

		<div id="canvasBubbles" style="position: fixed;height:100%;width:100%;z-index: 100;top: 0;"></div>

        <img src="" class="fullbg active" alt="" id="background" />
        <img src="" class="fullbg inactive" alt="" id="background" />

        <div id="maincontent" style="position:static;">

    		<div id="hello"><?php echo $text;?></div>
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

		<div id="bgdownload">
		    <a class="bgdownload" href="" download="background" style="z-index:200; position: fixed; bottom: 0; right: 0; color: white; text-decoration: none; padding-bottom: 10px;">
		        <span>Download background</span>
                <i class="fa fa-download fa-2" style="font-size: larger;margin-top: 0.4em;"></i>
            </a>
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

            function convertImgToDataURLviaCanvas(url, callback, outputFormat){
                var img = new Image();
                img.crossOrigin = 'Anonymous';
                img.onload = function(){
                    var canvas = document.createElement('CANVAS');
                    var ctx = canvas.getContext('2d');
                    var dataURL;
                    canvas.height = this.height;
                    canvas.width = this.width;
                    ctx.drawImage(this, 0, 0);
                    dataURL = canvas.toDataURL(outputFormat);
                    callback(dataURL);
                    canvas = null; 
                };
                img.src = url;
            }

			function loadBackgrounds() {  

                convertImgToDataURLviaCanvas("https://source.unsplash.com/random?=" + new Date().getTime(), function(base64Img){
                        $('img.active')
                                .attr('src', base64Img)
                                .end();
                    	$("img.active").fullBg();
	         	        $(".bgdownload").attr('href', $("img.active").attr("src"));
	         	        $("img.active").fadeToggle(1200);
                    });
                convertImgToDataURLviaCanvas("https://source.unsplash.com/random?=" + new Date().getTime(), function(base64Img){
                        $('img.inactive')
                                .attr('src', base64Img)
                                .end();
                    	$("img.inactive").fullBg();
                    });
                //setTimeout(reloadBackground,3000);  
			} 

			function reloadBackground() {  

                var keywords = [];

                $("img.fullbg").fadeToggle(3000);
                setTimeout(function(){ 
         	        $("img.fullbg").toggleClass("active");
         	        $("img.fullbg").toggleClass("inactive");
         	        $(".bgdownload").attr('href', $("img.active").attr("src"));    	
    
                    convertImgToDataURLviaCanvas("https://source.unsplash.com/random?=" + new Date().getTime(), function(base64Img){
                          $('img.inactive')
                                .attr('src', base64Img)
                                .end();
                    });
                    
                    //event.preventDefault();

                    $("img.inactive").fullBg();
                    setTimeout(reloadBackground,3000);  
                }, 3000);
			}

		</script> 

	</body>

</html>