<?php

/**
 * Mysqli initial code
 * 
 * User permissions of database
 * Create, Alter and Index table, Create view, and Select, Insert, Update, Delete table data
 * 
 * @package			PhpFiddle
 * @copyright		Copyright (c) 2012 - 2013, PhpFiddle.org
 * @link			http://phpfiddle.org
 * @since			2012
*/

require_once "dBug!.php";

$host_name = "localhost";
$user_name = "xfiddlec_user";
$pass_word = "public";
$database_name = "xfiddlec_max";
$port = "3306";

$short_connect = new mysqli($host_name, $user_name, $pass_word, $database_name, $port);

//get all tables in the database
$sql = "SHOW TABLES";

//get column information from a table in the database
//$sql="SELECT COLUMN_KEY, COLUMN_NAME, COLUMN_TYPE FROM information_schema.COLUMNS WHERE TABLE_NAME = 'books'";

//SQL statement for a table in the database
//$sql = "SELECT * FROM phonebook WHERE id <= 10";	

//result is boolean for query other than SELECT, SHOW, DESCRIBE and EXPLAIN

function incomingCallQuery($mobile) 
{
	global $short_connect;
	$today = strval(date("m"))."01".strval(date("Y"));
	
	$query = "select b.item_id, b.item_quantity from pds_phonebook a, pds_record_set b where a.block_number = b.block_number and a.mobile_number = ".intval($mobile)." and month(b.allocation_month) = 6";
	
	$result = $short_connect->query($query);
	if(($result) && ($result->num_rows > 0))
	{
	//convert query result into an associative array
	while ($row = $result->fetch_assoc())
	{
		$itemQuery = "SELECT item_name, item_unit FROM pds_item_info WHERE item_id = ".$row['item_id'];
		$items = $short_connect->query($itemQuery);
		$itemsArray = $items->fetch_assoc();
	}
	
	//dump all data from associative array converted from query result
		//new dBug($results);   
	}
	$items->free();
	$result->free();
}

incomingCallQuery("31163");

/*
$result = $short_connect->query($sql);

if (($result) && ($result->num_rows > 0))
{
	$results = array();

	//convert query result into an associative array
	while ($row = $result->fetch_assoc())
	{
		$results[] = $row;
	}

	//dump all data from associative array converted from query result
	new dBug($results);   

	$result->free();

}
*/
$short_connect->close();


?>