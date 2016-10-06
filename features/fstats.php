<?php 
if (strpos($_SERVER['REQUEST_URI'],substr(strrchr(__FILE__, "/"), 1))) {
	header('HTTP/1.1 301 Moved Permanently');  
	header("Location: /?cmd=stats");  
 	header("Result:  Shortener invoked");  
	exit;
}

if (!empty($site)) {
?><div id="statsPanel" style="position: fixed; z-index: 100;top: 200px;left: 50%;margin-left: -370px;    background-color:rgba(220, 220, 220, 0.5);padding:5px 20px;font-size:15px;border-radius: 10px;">
	<div id="statsContainer" style="text-align:center;font-size: 18px;    margin-top: 10px;width:700px">
<?php 
		//	REtrieving target URL from url param containing shorten URL

	$dbfolder = $_SERVER['DOCUMENT_ROOT']."/features/fdb";
	$dbfolder_handler = opendir($dbfolder);
	while (false !== ($thisfile = readdir($dbfolder_handler))) {
			$files[] = $thisfile;
	}
	

	if (count($files) < 3) {
		//	No shorten URL found. Redirecting to home
		error_found ( E_USER_ERROR, "No files found in database folder. Redirecting to home (" . $home .")","fwd.php",27);
	}
	else echo count($files);{?>
		<table id="stats"  class="display compact" cellspacing="0" width="100%">
			<thead>
			<tr>
				<th style="text-align:center;width;440px;padding:0">URL Shorten</th>
				<th style="text-align:center;width:40px;padding:0">#</th>
				<th style="text-align:center;width:100px;padding:0">IP</th>
				<th style="text-align:center;width:130px;padding:0">Shorten date</th>
			</tr>
			</thead>
			<tbody>
			<?php 
			foreach ($files as $i => $value) {
 				if (strpos($value,'.')===false){
					$handler = fopen($_SERVER['DOCUMENT_ROOT']."/features/fdb/".$value, "r");
					$linkinfo = fscanf($handler, "%s %s %s %s\n");
					fclose($handler);
					?>
				<tr>
					<td style="padding:0"><a href="<?php echo $linkinfo[0];?>" target="_blank"><?php echo $linkinfo[0];?></a></td>
					<td style="text-align:center;padding:0"><?php echo intval($linkinfo[3]);?></td>
					<td style="text-align:center;padding:0"><?php echo $linkinfo[1];?></td>
					<td style="text-align:center;padding:0"><?php echo date("Y/m/d H:i:s",$linkinfo[2]);?></td>
				</tr>
			<?php 
				}
			}?>
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
