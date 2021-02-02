<?php 

// is_uploaded_file();
// move_uploaded_file();


   if($_FILES){
	   
	  
       $maxBoyut       = 700000;
	   $dosyaUzantisi  = substr($_FILES["dosya"]["name"],-4,4);
	   $dosyaAdi       = rand(1,99999).$dosyaUzantisi;
	   $dosyaYolu      = "dosya/".$dosyaAdi;
	   
	   
	     if($_FILES["dosya"]["size"]>$maxBoyut){
			 
			 echo "<h2>dosya boyutu 700kb'dan yuksek olamaz...</h2>";
			 
		 }else {
			 
			 
			 $dosya = $_FILES["dosya"]["type"];
			 
		 if($dosya == "image/jpeg" || $dosya == "image/png" || $dosya == "image/gif" || $dosya == "application/zip"){
			 
			 
			 if(is_uploaded_file($_FILES["dosya"]["tmp_name"])){
				 
				 
				 $tasi = move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaYolu);
				 
				 $kayit = $db->prepare("insert into resimler set  
				 
				               resim_adi=?,
							   resim_turu=?,
							   resim_size=?
				 
				 ");
				 
				 $resimTuru = $_FILES["dosya"]["type"];
				 $resimSize = $_FILES["dosya"]["size"];
				 
				 $kayit->execute(array($dosyaYolu,$resimTuru,$resimSize));
				 
				 if($tasi){
					 
					echo "<h2>dosya basarıyla yuklendi...</h2>";
                  
                   header("refresh: 2; url=index.php");				  
					 
				 }else {
					 
					 echo "<h2>dosya tasınırken bir hata olustu...</h2>";
					 
				 }
				 
				 
			 } else {
				 
				 echo "<h2>dosya tasınırken bir hata olustu...</h2>";
				 
			 }
			 
			 
		 }else {
			 
			 
			echo "<h2>dosya formati sadece jpg,png yada gif formatinda olmalıdır...</h2>"; 
			 
			 
		 }
			 
			 
		 }
	   
	  
	   
   }else {
	   
	    ?>  
		
		
		<div class="dosya"> 
			<h2>Dosya yukle..</h2>
			<form action="" method="post" enctype="multipart/form-data"> 
				<input type="file" name="dosya" />
				<button type="submit">yukle</button>
			</form>
		</div>
		
		<?php
		
		   
		    $resim = $db->prepare("select * from resimler");
			$resim->execute(array());
			$d = $resim->fetchAll(PDO::FETCH_ASSOC);
		
		     foreach($d as $m){
				 
				   ?>
				   <div class="liste"> 
				   <h2>resim adi : <?php echo $m["resim_adi"];?></h2>
				   <img src="<?php echo $m["resim_adi"];?>" width="200" height="100" alt="" /> <br />
				   <span>resim turu : <?php echo $m["resim_turu"];?> </span> <br />
				   <span>resim size : <?php echo $m["resim_size"];?> kb </span> <br /> 
				   <a href="?do=sil&id=<?php echo $m["resim_id"];?>">sil</a> &nbsp; 
				   <a href="?do=duzenle&id=<?php echo $m["resim_id"];?>">duzenle</a>  
				   
				   </div>
				   <?php
				 
				 
			 }
	   
   }


   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
?>