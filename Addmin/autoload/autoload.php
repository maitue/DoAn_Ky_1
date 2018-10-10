<?php 
	session_start();
	require_once __DIR__."/../../Addmin/database/Funtion.php";
	require_once __DIR__."/../../Addmin/database/DBconection.php";
	$db=new database;
	define("ROOT", $_SERVER['DOCUMENT_ROOT']."DoAn/Addmin/upload");
 ?>