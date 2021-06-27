<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog-studio</title>
</head>
<?php 
include "menu.php";
$x=mysqli_query($conn,"select * from blog where post='public' order by day DESC ");
?>
<script>
    var b="b";
</script>
<body onload="changecolor(b)">

<h3 class="da text-center text-uppercase">All stories</h3>
<div class="container-fluid my-3">
        <div class="row">
            <?php 
            $i=0;
            while ($y=mysqli_fetch_assoc($x)) { 
            ?>
            <div class="col-sm-4 col-md-6 col-lg-3 my-3 mx-auto">
                <div class="card text-center">
                    <img src="photo/<?php echo $y['photo1']; ?>" height="175" alt="" class="card-img-top">
                    <div class="dar d-flex justify-content-around">
            <a href="<?php echo $y['fb']; ?>"><i class="fab fa-facebook fa-1x text-white"></i ></a>
            <a href="<?php echo $y['twitter']; ?>"><i class="fab fa-twitter fa-1x text-primary"></i></a>
            <a href="<?php echo $y['telegram']; ?>"><i class="fab fa-telegram fa-1x text-warning"></i></a>
       <a href="<?php echo $y['instagram']; ?>"><i class="fab fa-instagram fa-1x text-danger"></i></a>
        </div>
                    <h6 class="card-title text-uppercase">
                        <?php echo $y['title']; ?>
                    </h6>
                    <p class="card-text i">
   <?php echo $y['highlight']; ?>
                    </p>
                    <a href="sblog.php?id=<?php echo $y['id']; ?>" class="btn btn-outline-dark d-block text-uppercase">See-more</a>
       
                </div>
                </div>
            <?php $i++; } ?>
            </div>
        </div>

<?php include"footer.php";?>

</body>
</html>