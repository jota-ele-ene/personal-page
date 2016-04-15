<?php echo "shortener";?>
<div id="shortener" style="position: fixed; z-index: 100; height: 10px;top: 200px;left: 50%;margin-left: -150px;">
	<div id="shortenerResult" style="text-align:center;font-size: 20px;"></div>
	<form id="form1" name="form1" method="post">
		<input name="url" type="url" id="url" placeholder123="Tell me the URL to short" size="75" required />
		<input type="submit" name="Submit" value="Short" />
	</form>
</div>

<script> 

function getShortenUrl(searchTerm) {

        $.post("<?php echo "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1).'features/shorten.php';?>",
        {
          url: searchTerm,
        },
        function(data,status){
			obj = JSON.parse(data);
            if (status == "success") {
//.
				document.getElementById('shortenerResult').innerHTML = 'Your shorten URL <a href="<?php echo "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'))."/";?>'+ obj.short + '" target="_blank">http://jln.bz/' + obj.short + '</a>';
			}
			else 
				document.getElementById('shortenerResult').innerHTML = 'Unable to retrieve shorten url (' + data.status + ')';
        });

}

$(document).ready(function() {

	  document.getElementById('form1').url.value = url;

	  //getShortenUrl("http://www.elpais.com");
	  
	  document.getElementById('form1').addEventListener('submit', function(evt){
		  evt.preventDefault();
		  //alert(document.getElementById('form1').url.value);
		  getShortenUrl(document.getElementById('form1').url.value);
		  //getShortenUrl("http://www.elpais.com");
	  });

  });
  
</script>
