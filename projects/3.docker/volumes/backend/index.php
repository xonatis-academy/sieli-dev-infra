<?php
try
{
	$db = new PDO('mysql:host=bookingapp-db;dbname=bookingapp;charset=utf8', 'bookingappuser', 'bookingapppwd');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>