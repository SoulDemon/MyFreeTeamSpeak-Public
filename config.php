<?php
/**
 * For Development Purposes
 */
ini_set("display_errors", "on");

require __DIR__ . "/Commands/class.logsys.php";
\Fr\LS::config(array(
  "db" => array(
      "host" => "localhost",
      "port" => 3306,
      "username" => "root",
      "password" => "",
      "name" => "freets3v2",
      "table" => "users",
	  "servers" => "servers", #Server List In Database
	  "userservers" => "userservers", #User Servers
      "token_table" => "resetTokens",
	  "authenticationKey" => "" #Authentication Key, You can probably get one in the IRC if i'm nice ;) http://webchat.esper.net/?channels=#MyFreeTeamSpeak
  ),
  "features" => array(
    "auto_init" => true
  ),
  "pages" => array(
    "no_login" => array(
      "",
      "/reset.php",
      "/register.php"
    ),
    "login_page" => "/login.php",
    "home_page" => "/home.php"
  )
));
