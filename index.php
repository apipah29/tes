<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <!-- header -->

    <header>

        <div class="container">
            <div class="title">
        <img src ="img/logoA.png" alt="logo" class="logo">
        <h1><a href="index.php">GALERI FOTO </a></h1>
        
</div>
<div class="container">
<ul>
            <li><a href="galeri.php">Galeri</a></li>
           <li><a href="registrasi.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
           
        </ul>
        </div>
    </header>
     
    
    <!-- search -->

<div class="container">
    <form action="galeri.php" method="GET">
        <input type="text" name="search" placeholder="Search Foto" />
        <button type="submit" name="cari">Search</button>
    </form>
</div>
<?php
include 'db.php';

// Check if the search parameter is set
if(isset($_GET['search'])){
    $search = $_GET['search'];
    
    // Perform a search query in your database based on your requirements
    $search_query = "SELECT * FROM tb_image WHERE image_name LIKE '%$search%' AND image_status = 1 ORDER BY image_id DESC";
    $search_result = mysqli_query($db, $search_query);
    
    // Output the search results
    if(mysqli_num_rows($search_result) > 0){
        while($result = mysqli_fetch_array($search_result)){
?>
            <a href="detail-image.php?id=<?php echo $result['image_id'] ?>">
                <div class="col-4">
                    <img src="foto/<?php echo $result['image'] ?>" height="150px" />
                    <p class="nama"><?php echo substr($result['image_name'], 0, 30)  ?></p>
                    <p class="admin">Nama User: <?php echo $result['admin_name'] ?></p>
                    <p class="nama"><?php echo $result['date_created']  ?></p>
                </div>
            </a>
<?php
        }
    } else {
        echo "<p>No results found</p>";
    }
}
?>

           
</table>
                
            </form>
        </div>
    </div>
    
    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($db, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
                    <a href="galeri.php?kat=<?php echo $k['category_id'] ?>">
                        <div class="col-5">
                            <img src="img/icon.png" width="50px" style="margin-bottom:5px;" />
                        <p><?php echo $k['category_name'] ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                     <p>Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <!-- new product -->
    <div class="container">
       <h3>Foto Terbaru</h3>
       <div class="box">
          <?php
              $foto = mysqli_query($db, "SELECT * FROM tb_image WHERE image_status = 1 ORDER BY image_id DESC LIMIT 8");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
          <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
          <div class="col-4">
              <img src="foto/<?php echo $p['image'] ?>" height="150px" />
              <p class="nama"><?php echo substr($p['image_name'], 0, 30)  ?></p>
              <p class="admin">Nama User : <?php echo $p['admin_name'] ?></p>
              <p class="nama"><?php echo $p['date_created']  ?></p>
          </div>
          </a>
          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
       </div>
    </div>
    
    <!-- footer -->
     <footer>
        <div class="container">
            <small>by apipah rahmawati</small>
        </div>
    </footer>
</body>
</html>