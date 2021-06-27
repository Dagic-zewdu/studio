<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container-fluid mt-5">
		<div class="row dar text-center display-5">
		
			<div class="col-sm-4 col-md-6 col-lg-6 justify-content-around">
				<h4 class="text-white text-uppercase">Say hi on</h4>
				<a href="<?php echo $ans['fb']; ?>"><i class="fab fa-facebook fa-2x text-white "></i></a>
            <a href="<?php echo $ans['twitter']; ?>"><i class="fab fa-twitter fa-2x text-info"></i></a>
            <a href="<?php echo $ans['telegram']; ?>"><i class="fab fa-telegram fa-2x text-primary"></i></a>
            <a href="<?php echo $ans['instagram']; ?>"><i class="fab fa-instagram fa-2x text-danger"></i></a>
            <a href="<?php echo $ans['youtube']; ?>"><i class="fab fa-youtube fa-2x text-danger"></i></a>
			</div>
			<div class="col-sm-4 col-md-12 col-lg-6">
					<h4 class="center text-white text-uppercase">Adress</h4>
				<p class="text-center b text-white i">
    	phone 1 <i class="fa fa-phone fa-1x text-danger"></i>:-<?php echo $ans['phone1'];?><br>
        phone 2 <i class="fa fa-phone fa-1x text-danger"></i>:-<?php echo $ans['phone2'];?><br>
   office <i class="fas fa-building fa-1x text-warning"></i>:-<?php echo $ans['office'];?> <br>
     <a href="contact.php" class="text-white">contact us</a><br> 
</p>
			</div>
			<div class="col-md-12 col-lg-12">
		
	<p class="text-center dar i text-white text-uppercase">
	<?php	$d=date('Y');  ?>
		&copy<?php echo $d." ".$ans['title']; ?> photographer based in Addis Ababa Ethiopia
	</p>		
			</div>
	</div>
			
	</div>
<style type="text/css">
	.b{
   font-size:20px;
}
</style>
</body>
</html>