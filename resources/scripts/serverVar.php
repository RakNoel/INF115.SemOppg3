<?php
/**
 * Created by PhpStorm.
 * User: oskar
 * Date: 01.05.2017
 * Time: 11.24
 */

/**
 * This script only holds the server variables to make it simpler to change
 * as that hopefully is needed for deployment, or testing on other computers
 */
$serverName = "localhost";
$dbName = "employees";
$serverPass = "";
$serverUser = "root";

$conn = new mysqli($serverName, $serverUser, $serverPass, $dbName);