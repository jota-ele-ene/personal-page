<html><head>
		<title> Upsss! Something unexpected happened </title>

		<!-- META -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Upsss! Something unexpected happened">
		<!--<meta http-equiv="refresh" content="12;url=http://<?php echo $_SERVER['HTTP_HOST'];?>" />-->


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
			
			a#detail {
        font-family: 'Josefin Slab', 'Times';
		    margin: 40px 0;
				position: absolute;
				width: 100%;
				text-align: center;
				text-decoration: none;
				color: grey;
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
			
			/* Tooltip */
			#detail + .tooltip {
					background: grey;
    			border-radius: 8px;
					margin-top:5px;
			}
			#detail + .tooltip > .tooltip-arrow {
					border-top-color: grey!important;
			    margin-bottom: -5px;
			}			
			#detail + .tooltip > .tooltip-head > .glyphicon {
					color: white;
					font-size: xx-large;
					float: left;
					margin: 5px;
			}
			#detail + .tooltip > .tooltip-head > #errfile {
			    float: left;
    			width: 60%;
					font-style:italic;
					font-size:smaller;
					margin:15px 5px;
					color:white;
			}
			#detail + .tooltip > .tooltip-inner {
					/*background-color: #73AD21;*/
					background-color: grey;
					color: #FFFFFF;
					/*border: 1px solid green;*/
					padding: 0 10px 5px;
					font-size: 10px;
					text-align:left;
					font-family:monospace;
					clear: both;
			}
			/* Tooltip on top */		
/*			#detail + .tooltip.top > .tooltip-arrow {
					border-top: 5px solid green;
			}
			/* Tooltip on bottom */
/*			#detail + .tooltip.bottom > .tooltip-arrow {
					border-bottom: 5px solid blue;
			}
			/* Tooltip on left */
/*			#detail + .tooltip.left > .tooltip-arrow {
					border-left: 5px solid red;
			}
			/* Tooltip on right */
/*			#detail + .tooltip.right > .tooltip-arrow {
					border-right: 5px solid black;
			}
					
    </style>

	
		<!-- MISC -->
		<script type="text/javascript">

			var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-52910819-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

			$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip({
							delay: {show: 0, hide: 5},
			        template : '<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-head"><div class="glyphicon glyphicon-info-sign"></div><div id="errfile"><?php echo $errfile.'('.$errline.')'; ?></div></div><div class="tooltip-inner"></div></div>'
					});
			});

		</script>

	<body>

		<hgroup>
			<h1> Upssss! </h1>
			<h3> something </h3>
			<h4> happened </h4>
			<a id="detail" href="#" <?php if (!empty($mymsg)) {?>data-toggle="tooltip" title="<?php echo $mymsg;?>"<?php }?>>You really want to know what?</a>
		</hgroup>

  </body>
  
</html>
<?php die();?>