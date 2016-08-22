<?php
//This API is to be used for authorized users only
if (isset($_POST["id"])){
	$filename = '/var/www/html/tsdns-linux/tsdns_settings.ini';
	$content = $_POST["id"] . PHP_EOL;
	
	
		if (is_writable($filename)){
		if (!$handle = fopen($filename, 'a')){
			echo "Cannot open file ($filename)";
			exit;
		}
		if (fwrite($handle, $content) === FALSE){
			echo "Cannot write to file ($filename)";
			exit;
		}
		echo "Success, wrote ($content) to file ($filename)";
		
		fclose($handle);
	}
}
else
{
	echo "An invalid request was sent, please contact JetFox on how to properly use his API.";
}
?>