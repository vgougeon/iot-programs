<?php
ini_set("display_errors", "1");
$user = "root";
$pass = "";
$db = new PDO('mysql:host=localhost;dbname=iot', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
session_start();
include('conversion.php');