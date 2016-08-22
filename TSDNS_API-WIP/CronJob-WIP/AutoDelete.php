<?php
require_once ("Commands/libraries/TeamSpeak3/TeamSpeak3.php");
// connect to local server, authenticate and spawn an object for the server instance
$ts3_ServerInstance = TeamSpeak3::factory("serverquery://serveradmin:GAOmPKLF@127.0.0.1:10011/");
// walk through list of virtual servers
foreach($ts3_ServerInstance as $ts3_VirtualServer) {
	$name = $ts3_VirtualServer["virtualserver_name"];
	//$port = $ts3_VirtualServer["virtualserver_port"];
	//echo $port;
	//echo $name;
if ($name == "Delete Me")
{
	
$getlovelyid = $ts3_VirtualServer->getId();
$ts3_VirtualServer->serverStop($getlovelyid); 
$ts3_VirtualServer->serverDelete($getlovelyid);
}
else{
	echo "Nothing happened for server with the name ".$name;
}
}