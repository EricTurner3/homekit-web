<?php
/**
 * Created by PhpStorm.
 * User: sysadmin
 * Date: 2/10/2018
 * Time: 7:50 PM
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include('info.php');

//This retrieves data from settings.php form and sets it ready for JSON
$settings->homename = $_POST['homename'];
$settings->background = $_POST['background'];
$settings->bridgeip = $_POST['bridgeip'];
$settings->bridgekey = $_POST['bridgekey'];


//Encode the variables as JSON
$setting = json_encode($settings);

//Put the JSON in the settings.json file in the root directory
file_put_contents('settings.json', $setting);

//Redirect back to index.php
header('Location: index.php');