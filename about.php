<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>About</title>
</head>
<?php
include"menu.php";
$sql=mysqli_query($conn,"select * from about where id='1' ");
$msql=mysqli_query($conn,"select * from about where type='E' and privacy='public' ");
$m=mysqli_fetch_assoc($sql);
	?>
	<script>
		var a="a";
	</script>
<body onload="changecolor(a)">
	<div class="container da">
		<div class="row no-guter">
			<div class="col-md-12 col-lg-5 my-auto">
				<div class="card">
					<img src="aphoto/<?php echo $m['photo']; ?>" alt="" class="card-img-top">
				</div>
			</div>
			<div class="col-md-12 col-lg-7 my-auto">
				<h4 class="text-uppercase text-center">
					Hey yo it's me
				</h4>
				<p>
					<?php echo $m['Description'];?>
				</p>
				<p class="text-center">
					<a href="contact.php">
				<button class="btn btn-outline-warning text-uppercase" >Let's be friends </button>
				</a>
				</p>
			</div>
		</div>
	</div>
	<div class="container my-4">
		<div class="row no-guter">
			<div class="col-md-12 col-lg-12">
				<h4 class="text-center text-uppercase">
				going forward with latest technologies
				</h4>
			</div>
			<?php
			$i=1;
	while($v=mysqli_fetch_assoc($msql)){
		if($i%2!=0){
			?>
			<div class="col-md-12 col-lg-12 mt-4">
				<h4 class="text-center text-uppercase">
					<?php echo $v['title'];  ?>
				</h4>
			</div>
			<div class="col-md-12 col-lg-4 my-auto">
				<img src="aphoto/<?php echo $v['photo']; ?>" alt="" class="card-img-top">
			</div>
			<div class="col-md-12 col-lg-8 my-auto">
				<p>
					<?php echo $v['Description']; ?>
				</p>
			</div>
		<?php $i++; }
else{
		 ?>
		 <div class="col-md-12 col-lg-12 mt-4">
				<h4 class="text-center text-uppercase">
					<?php echo $v['title'];  ?>
				</h4>
			</div>
			<div class="col-md-12 col-lg-8 my-auto">
				<p>
					<?php echo $v['Description']; ?>
				</p>
			</div>
			<div class="col-md-12 col-lg-4 my-auto">
				<img src="aphoto/<?php echo $v['photo']; ?>" alt="" class="card-img-top">
				<div class="dar d-flex justify-content-around">
					<?php 
$i=$v['blog'];
if($i!=0){
	?>
	<a href="sblog.php?id=<?php echo $v['blog']; ?>" alt="show in blog"><i class="fa fa-book fa-2x text-white"></i></a>
<?php } 
?>
				</div>
			</div>
			
		<?php $i++; }} ?>
		</div>
	</div>
	<?php
include"footer.php";
	?>
</body>
</html>