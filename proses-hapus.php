<?php

   include 'db.php';
      
   if(isset($_GET['idp'])){
	   $foto = mysqli_query($db, "SELECT image FROM tb_image WHERE image_id = '".$_GET['idp']."' ");
	   $p = mysqli_fetch_object($foto);
	   
	   unlink('./foto/'.$p->image);
	   
	  $delete = mysqli_query($db, "DELETE FROM tb_image WHERE image_id = '".$_GET['idp']."' ");
	  echo '<script>window.location="data-image.php"</script>';
   }

?>