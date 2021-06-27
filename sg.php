<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gallery</title>
</head>
<body>
	<?php 
	include "menu.php";
	$id=$_GET['id'];
	$real=mysqli_query($conn,"select * from gallery where id=$id");
	$a=mysqli_fetch_assoc($real);
	?>
	<div class="container-fluid daz">
		<div class="row">
			<div class="col-md-12 col-lg-12 text-center">
				<img src="gphoto/<?php echo $a['name']; ?>" alt="" class="w-50 card-img-top">
			</div>
			<div class="col-md-12 col-lg-12">
				      <div class="icon-bar justify-content-around">
				      	<?php 
$fb=$a['fb'];
if($fb!=" "&&$fb!=""){
	?>
	<a href="<?php echo $a['fb']; ?>"><i class="fab fa-facebook fa-2x text-warning"></i ></a>
<?php } ?>
       <?php 
$t=$a['twitter'];
if($t!=" "&&$t!=""){
	?>
	<a href="<?php echo $a['twitter']; ?>"><i class="fab fa-twitter fa-2x text-primary"></i></a>
<?php } ?>
<?php 
$t=$a['telegram'];
if($t!=" "&&$t!=""){
	?>
	<a href="<?php echo $a['telegram']; ?>"><i class="fab fa-telegram fa-2x text-info"></i></a>
<?php } ?>
<?php 
$i=$a['instagram'];
if($i!=" "&&$i!=""){
	?>
	<a href="<?php echo $a['instagram']; ?>"><i class="fab fa-instagram fa-2x text-danger"></i></a>
<?php } 
?> 
<?php 
$i=$a['blog'];
if($i!=0){
	?>
	<a href="sblog.php?id=<?php echo $a['blog']; ?>" alt="show in blog"><i class="fa fa-book fa-2x text-white"></i></a>
<?php } 
?>     
        </div>
			</div>
		</div>
	</div>
	<style type="text/css">
		.daz{
			padding-top: 100px;
		}
	</style> 
	<?php
include"footer.php";
	?>
	</body>
	</html>