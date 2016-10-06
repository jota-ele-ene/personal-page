<?php 
if (strpos($_SERVER['REQUEST_URI'],substr(strrchr(__FILE__, "/"), 1))) {
	header('HTTP/1.1 301 Moved Permanently');  
	header("Location: /?cmd=short");  
 	header("Result:  Shortener invoked");  
	exit;
}

if (!empty($site)) {
?><div id="statsPanel" style="position: fixed; z-index: 100;top: 200px;left: 50%;margin-left: -370px;    background-color:rgba(220, 220, 220, 0.5);padding:5px 20px;font-size:15px;border-radius: 10px;">
	<div id="statsContainer" style="text-align:center;font-size: 18px;    margin-top: 10px;width:700px">
<?php 
		//	REtrieving target URL from url param containing shorten URL
	$result = mysql_query("SELECT url_link, url_hits, url_ip,  url_date FROM urls");
 
	if (!$result) {
		error_found ( E_USER_ERROR, "Could not successfully get the shortener stats (" . mysql_error().")"); // Proxies.
	} 

	if (mysql_num_rows($result) == 0) {
		//	No shorten URL found. Redirecting to home
		error_found ( E_USER_ERROR, "No rows found in urls TABLE. Redirecting to home (" . $home .")","fwd.php",27);
	}
	else {?>
		<table id="stats"  class="display compact" cellspacing="0" width="100%">
			<thead>
			<tr>
				<th style="text-align:center;width;460px;padding:0">URL Shorten</th>
				<th style="text-align:center;width:20px;padding:0">#</th>
				<th style="text-align:center;width:100px;padding:0">IP</th>
				<th style="text-align:center;width:130px;padding:0">Shorten date</th>
			</tr>
			</thead>
			<tbody>
			<?php 
			while ($row = mysql_fetch_assoc($result)) {?>
				<tr>
					<td style="padding:0"><a href="<?php echo $row["url_link"];?>" target="_blank"><?php echo $row["url_link"];?></a></td>
					<td style="text-align:center;padding:0"><?php echo $row["url_hits"];?></td>
					<td style="text-align:center;padding:0"><?php echo $row["url_ip"];?></td>
					<td style="text-align:center;padding:0"><?php echo date("Y/m/d H:i:s",$row["url_date"]);?></td>
				</tr>
			<?php }?>
			</tbody>
		</table>
<?php
	}
?>
	</div>	
</div>
<script>
$(document).ready(function() {

      $("div#hello").hide();
			$('#stats').DataTable();

  });
</script>

<?php
}
?>
