<?php
    error_reporting(0);
    include 'db.php';
	$kontak = mysqli_query($db, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);
	
	$produk = mysqli_query($db, "SELECT * FROM tb_image WHERE image_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>
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
        <h1><a href="index.php">GALERI FOTO</a></h1>
        <ul>
            <li><a href="galeri.php">Galeri</a></li>
           <li><a href="registrasi.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
        </ul>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" value="<?php echo $_GET['search'] ?>" />
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>
    
    <!-- product detail -->
    <div class="section">
        <div class="container">
             <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                   <img src="foto/<?php echo $p->image ?>" width="100%" /> 
                </div>
                <div class="col-2">
                   <h3><?php echo $p->image_name ?><br />Kategori : <?php echo $p->category_name  ?></h3>
                   <h4>Nama User : <?php echo $p->admin_name ?><br />
                   Upload Pada Tanggal : <?php echo $p->date_created  ?></h4>
                   <p>Deskripsi :<br />
                        <?php echo $p->image_description ?>
                   </p>
                   
                </div>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <div class="post">
    <div class="actions">
        <div class="like-comment">
            <button class="like-btn" onclick="toggleLike()">&#x2764;</button>
            <span id="likeCount">0 likes</span>
        </div>
        <div class="comment-btn" onclick="showCommentForm()">??</div>
    </div>
    <div class="comments" id="commentsSection">
        <!-- Comment Section -->
        <!-- You can dynamically add comments using JavaScript -->
    </div>
    <div class="comment-form" id="commentForm">
        <form onsubmit="addCommentFromForm(event)">
            <textarea id="commentText" placeholder="Add your comment"></textarea>
            <button type="submit">kirim</button>
        </form>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="container">
        <small></small>
    </div>
</footer>

<script>
    var likeCount = 0;

    function toggleLike() {
        var likeButton = document.querySelector('.like-btn');
        likeButton.classList.toggle('liked');

        likeCount += likeButton.classList.contains('liked') ? 1 : 1;
        document.getElementById('likeCount').textContent = likeCount + (likeCount === 1 ? ' like' : ' likes');
    }

    function showCommentForm() {
        var commentForm = document.getElementById('commentForm');
        commentForm.style.display = 'block';
    }

    function addCommentFromForm(event) {
        event.preventDefault();
        var commentText = document.getElementById('commentText').value;
        if (commentText !== null && commentText !== '') {
            addComment(commentText);
            document.getElementById('commentText').value = ''; // Mengosongkan input setelah menambahkan komentar
            hideCommentForm();
        }
    }

    function addComment(commentText) {
        var commentsSection = document.getElementById('commentsSection');
        var newComment = document.createElement('div');
        newComment.classList.add('comment');
        newComment.textContent = commentText;
        commentsSection.appendChild(newComment);
    }

    function hideCommentForm() {
        var commentForm = document.getElementById('commentForm');
        commentForm.style.display = 'none';
    }
</script>

</body>

</html>

    <footer>
        <div class="container">
            <small>By apipah rahmawati</small>
        </div>
    </footer>
</body>
</html>