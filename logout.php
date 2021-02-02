<?php 
require_once('connection.php');
require_once('functions.php');
session_destroy();
header('Location:' . get_option('site_url'));
?>