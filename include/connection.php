<?php
require_once("constants.php");
//start connection
$connect = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD);
if(!$connect){
	die("Database connection Error".mysql_error());
	}
//select database
$db = mysql_select_db(DB_NAME);
if(!$db){
	die("Database selection Error".mysql_error());
	}	
 ?>