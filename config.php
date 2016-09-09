<?php
/**
 * For Development Purposes
 */
ini_set("display_errors", "on");
require __DIR__ . "/Commands/class.logsys.php";
\Fr\LS::config(array(
      "basic" => array(
      "company" => "SiteName",
      "email" => "email@email.com",
      "email_callback" => 0
    ),
  "db" => array(
      "host" => "localhost",
      "port" => 3306,
      "username" => "root",
      "password" => "",
      "name" => "freets3v2",
      "table" => "users",
      "servers" => "servers", #Server List In Database
      "userservers" => "userservers", #User Servers
      "token_table" => "resettokens",
	  "register_table" => "registerTokens",
      "updateCheck" => "true", #true or false
	  "authenticationKey" => "09082016" #Authentication Key, Used to notify updates http://webchat.esper.net/?channels=#MyFreeTeamSpeak
  ),
  "tsSetup" => array (
  "maxSlots" => 512,
  "tooltip" => "", #Icon for tooltip url?
  "hostbutton" => "", #Host Button URL
  "gfxurl" => "", #ICON URL
  "MyFreeTeamSpeakDNS" => "no", #Yes or No, Cancels out the tsdns setting below
  "tsdns" => "/tsdns-linux/tsdns_settings.ini" #Currently being implemented still Windows/Linux...
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