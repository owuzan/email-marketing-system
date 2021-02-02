<?php 

  $id = $_GET["id"];

  $select = $db->prepare("select * from resimler where resim_id=?");
  $select->execute(array($id));
  $bul =  $select->fetch(PDO::FETCH_ASSOC); 
  
 unlink($bul["resim_adi"]);  
 
 
    $sil = $db->prepare("delete from resimler where resim_id=?");
	$ok = $sil->execute(array($id));
	
	if($ok){
		
		echo "<h2>Dosya basarıyla silindi</h2>";
		
		header("refresh: 2; url=index.php");
		
	}else {
		
	 echo "<h2>Dosya silinirken bir hata olustu..</h2>";	
		
		
	}

?>