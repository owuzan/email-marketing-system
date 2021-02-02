<?php
try {
     $db = new PDO("mysql:host=oguzhan.dev;dbname=oguzhan5_staj", "oguzhan5", "@Parola123");
     $db -> exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
     
} catch ( PDOException $e ){
     echo "Bir Hata Oluştu: ".$e->getMessage();
}
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME, 'tr_TR');
session_start();

?>















