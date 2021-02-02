<?php 


  try {
	  
	$db = new PDO("mysql:host=localhost;dbname=ornek;charset=utf8","root","");  
	  
  }catch (PDOException $mesaj) {
	  
	 echo $mesaj->getmessage(); 
	  
  }


?>