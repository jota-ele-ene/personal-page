<?php 
if (strpos($_SERVER['REQUEST_URI'],substr(strrchr(__FILE__, "/"), 1))) {
	header('HTTP/1.1 301 Moved Permanently');  
	header("Location: /?cmd=short");  
 	header("Result:  Shortener invoked");  
	exit;
}
global $service;
echo $service;
if (!empty($service)) {
?><div id="shortener" style="position: fixed; z-index: 100;top: 200px;left: 50%;margin-left: -190px;    background-color:rgba(220, 220, 220, 0.5);padding:5px 20px;font-size:15px;border-radius: 10px;">
	<div id="shortenerResult" style="text-align:center;font-size: 18px;    margin-top: 10px;"></div>
	<form id="form1" name="form1" method="post">
<!--		<input name="url" type="url" id="url" placeholder123="Tell me the URL to short" size="75" required />-->
		<input name="url" type="url" id="url" placeholder="Tell me the URL to shorten" size="75" required style="margin: 20px 0;"/>
		<input type="submit" name="Submit" value="Short" />
	</form>
</div>

<script> 

function getShortenUrl(searchTerm) {

        $.post("<?php echo $service;?>",
        {
          url: searchTerm,
        },
        function(data,status){
			obj = JSON.parse(data);
            if (status == "success") {
//.
				document.getElementById('shortenerResult').innerHTML = 'Your shorten URL <a href="'+ obj.short + '" target="_blank">' + obj.short + '</a>';
			}
			else 
				document.getElementById('shortenerResult').innerHTML = 'Unable to retrieve shorten url (' + data.status + ')';
        });

}

$(document).ready(function() {

      $("div#hello").hide();
	  document.getElementById('form1').addEventListener('submit', function(evt){
		  evt.preventDefault();
		  //alert(document.getElementById('form1').url.value);
		  getShortenUrl(document.getElementById('form1').url.value);
		  //getShortenUrl("http://www.elpais.com");
    	  document.getElementById('form1').url.value = "";
    	  document.getElementById('form1').url.placeholder = "Tell me another URL to shorten";
	  });

  });
  
</script>
<?php
}
?>