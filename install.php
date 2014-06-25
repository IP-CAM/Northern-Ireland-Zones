<?php 
// insert Northern Ireland into Opencart
// By Barry Smith 
// This script is free - www.barrysmith.org
// This Script is provided as is - Use at your own risk!

LINK this to your mysql DB settings
require_once('../config.php');



	$db = mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
	mysql_select_db(DB_DATABASE, $db) or die (mysql_error());
	
	// DB_PREFIX
	
	echo 'Inserting Country...';
	
	$sql="INSERT INTO ".DB_PREFIX."country VALUES('', 'Northern Ireland', 'NI', 'NIR', '', '1', '1')";
	$query=mysql_query($sql)or die(mysql_error());
	$country_id = mysql_insert_id();
	echo '...<strong>DONE! ('.$country_id.')</strong><br/>';
	
	
	echo 'Inserting Antrim';
	$sql="INSERT INTO `".DB_PREFIX."zone` VALUES('', '$country_id', 'County Antrim', 'ANT', '1')";
	//echo "<p>$sql</p>";
	$query=mysql_query($sql)or die(mysql_error());
    echo '...<strong>DONE!</strong><br/>';
	
	echo 'Inserting Armagh';
	$sql="INSERT INTO `".DB_PREFIX."zone` VALUES('', '$country_id', 'County Armagh', 'ARM', '1')";
	//echo "<p>$sql</p>";
	$query=mysql_query($sql)or die(mysql_error());
	$armagh_id = mysql_insert_id();
	echo '...<strong>DONE!</strong><br/>';
	
	echo 'Inserting Down';
	$sql="INSERT INTO `".DB_PREFIX."zone` VALUES('', '$country_id', 'County Down', 'DOW', '1')";
	$query=mysql_query($sql)or die(mysql_error());
	$down_id= mysql_insert_id();
	echo '...<strong>DONE!</strong><br/>';
	
	echo 'Inserting Fermanagh';
	$sql="INSERT INTO `".DB_PREFIX."zone` VALUES('', '$country_id', 'Fermanagh', 'FER', '1')";
	$fermanagh_id= mysql_insert_id();
	echo '...<strong>DONE!</strong><br/>';
	
	echo 'Inserting Londonderry';
	$sql="INSERT INTO `".DB_PREFIX."zone` VALUES('', '$country_id', 'Londonderry', 'LDY', '1')";
	$query=mysql_query($sql)or die(mysql_error());
	$londonderry= mysql_insert_id();
	echo '...<strong>DONE!</strong><br/>';
	
	echo 'Inserting Tyrone';
	$sql="INSERT INTO `".DB_PREFIX."zone` VALUES('', '$country_id', 'County Tyrone', 'TYR', '1')";
	$query=mysql_query($sql)or die(mysql_error());
	$tyrone= mysql_insert_id();
	echo '...<strong>DONE!</strong><br/>';
	
	// Add to geozone
	
	$sql="SELECT * FROM `".DB_PREFIX."country` WHERE name='United Kingdom'";
	$query=mysql_query($sql)or die(mysql_error());
	$row= mysql_fetch_assoc($query);
	$uk_id = $row['ocuntry_id'];
	
	echo 'Adding Northernireland to UK Geo zone(s)';
	
	$sql="INSERT INTO ".DB_PREFIX."`zone_to_geo_zone` VALUES('', '$uk_id', '0', )";
	$query=mysql_query($sql)or die(mysql_error());
	
echo '<h2>Complete</h2><p>You should now be able to add the zone of Northern Ireland to the Geozone you have set up for the UK.<br/><i>..enjoy!...</i></p>';
	
?>
