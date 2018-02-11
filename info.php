<?php
/**
 * Created by PhpStorm.
 * User: sysadmin
 * Date: 2/10/2018
 * Time: 8:07 PM
 */
//Allow JSON URL requests
ini_set("allow_url_fopen", 1);
//This PHP file reads the settings.json file and holds the variables for all the other classes.

$file = file_get_contents('settings.json');

$info = JSON_decode($file);

$homename = $info->homename;
$background = $info->background;
$bridgeip = $info->bridgeip;
$bridgekey = $info->bridgekey;








