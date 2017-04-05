<?php
require_once ("Commands/libraries/TeamSpeak3/TeamSpeak3.php");
// connect to local server, authenticate and spawn an object for the server instance
$ts3_ServerInstance = TeamSpeak3::factory("serverquery://serveradmin:GAOmPKLF@127.0.0.1:10011/");
// walk through list of virtual servers
foreach($ts3_ServerInstance as $ts3_VirtualServer) {
	$name = $ts3_VirtualServer["virtualserver_name"];
	$connected_clients = $ts3_VirtualServer["virtualserver_clientsonline"];
	//$port = $ts3_VirtualServer["virtualserver_port"];
	//echo $port;
	//echo $name;
	//Ehh create mysql connection and do this
if ($connected_clients == 0){
	// do mysql connection... store into database that it was noted that there was 0 people online at time of check... do a +1 on count
}
else if ($connected_clients > 0){
	//do mysql connection but reset +1 count to 0...
}

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