<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
</head>

	<?php
	include"menu.php"; 
$id=$_GET['id'];
$query=mysqli_query($conn,"select * from blog where id='$id' ");
$qu=mysqli_query($conn,"select * from gallery where blog='$id' ");
$x=mysqli_fetch_assoc($query);
	?>
<script>
    var b="b";
</script>
<body onload="changecolor(b)">
	<h3 class="text-uppercase text-center da">
		<?php echo $x['title'];?>
	</h3>
	<p class="text-uppercase text-center i">
		<?php echo $x['highlight']; ?>
	</p>
	<div class="icon-bar text-center">
	<?php 
$fb=$x['fb'];
if($fb!=" "&&$fb!=""){
	?>
	<a href="<?php echo $x['fb']; ?>"><i class="fab fa-facebook fa-1x text-primary"></i></a>
<?php } ?>
<?php 
$t=$x['twitter'];
if($t!=" "&&$t!=""){
	?>
	<a href="<?php echo $x['twitter']; ?>"><i class="fab fa-twitter fa-1x text-primary"></i></a>
<?php } ?>
<?php 
$t=$x['telegram'];
if($t!=" "&&$t!=""){
	?>
	<a href="<?php echo $x['telegram']; ?>"><i class="fab fa-telegram fa-1x text-primary"></i></a>
<?php } ?>
<?php 
$i=$x['instagram'];
if($i!=" "&&$i!=""){
	?>
	<a href="<?php echo $x['instagram']; ?>"><i class="fab fa-instagram fa-1x text-danger"></i></a>
<?php } 
?>
</div>
	<div class="container py-2">
		<div class="row no-gutter">
			<div class="col-sm-12 col-md-4 col-lg-4">
				<div class="card float-right">
					<img src="photo/<?php echo $x['photo1'];  ?>" alt="" height="275" class="card-img-top">
				</div>	
			</div>
			<?php
$p2=$x['photo2'];
if($p2!=" "&&$p2!=""){
			?>
				<div class="col-sm-12 col-md-4 col-lg-4">
				<div class="card float-right">
					<img src="photo/<?php echo $x['photo2']; ?>" alt="" height="275" class="card-img-top">
				</div>	
			</div>
		<?php } ?>
		<?php
$p3=$x['photo3'];
if($p3!=" "&&$p3!=""&&$p3!=' '){
			?>
				<div class="col-sm-12 col-md-4 col-lg-4">
				<div class="card float-right">
					<img src="photo/<?php echo $x['photo3']; ?>" alt="" height="275" class="card-img-top">
				</div>	
			</div>
		<?php } ?>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<p class="z">
		<?php   
		 echo $x['Description'];
		?>
	</p>
		</div>
	</div>
	<?php 
$i=$x['video'];
if($i!=" "&&$i!=""){
	?>
<div class="container my-5">
	<div class="row">
		<div class="col md-12 col-lg-12">
			<div class="card">
			<video controls height="500">
						<source src="video/<?php echo $x['video']; ?>" >
					</video>
	<?php 
$i=$x['youtube'];
if($i!=" "&&$i!=""){
	?>
	<p class="text-center">			
	<a href="<?php echo$x['youtube']; ?>"> see in youtube <i class="fab fa-youtube text-danger"></i></a>
<?php } ?>
</p>
		</div>
		</div>
	</div>
</div>
<?php } ?>
	<div class="container-fluid">
		<div class="row no-gutter">
			<?php 
$p4=$x['photo4'];
if($p4!=" "&&$p4!=""){
			 ?>
				<div class="col-sm-12 col-md-4 col-lg-4">
				<div class="card">
					<img src="photo/<?php echo $x['photo4']; ?>" alt="" height="325" class="card-img-top">
				</div>	
			</div>
			<?php }
$p5=$x['photo5'];
if($p5!=" "&&$p5!=""){
	?>
				<div class="col-sm-12 col-md-4 col-lg-4">
				<div class="card float-right">
					<img src="photo/<?php echo $x['photo5']; ?>" alt="" height="325" class="card-img-top">
				</div>	
			</div>
			<?php }
$p6=$x['photo6'];
if($p6!=" "&&$p6!=""){
	?>
				<div class="col-sm-12 col-md-4 col-lg-4">
				<div class="card float-right">
					<img src="photo/<?php echo $x['photo6']; ?>" alt="" height="325" class="card-img-top">
				</div>	
			</div>
		<?php } ?>
		</div>
	</div>

<div class="container-fluid">
           <div class="row no-gutter">
				<?php while($q=mysqli_fetch_assoc($qu))
				{ ?>
				<div class="col-md-6 col-lg-4 mx-auto">
					<img src="gphoto/<?php echo $q['name'];?>" alt="" height="325" class="card-img-top">
				</div>
			<?php
			 } ?>
			</div>
		</div>
<?php 
include"footer.php";
?>
</body>
</html>