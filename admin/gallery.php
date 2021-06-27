<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gallery</title>
</head>
<body>
	<?php
include"menu.php";
$q=mysqli_query($conn,"select * from gallery where id!='1' ");
$z=mysqli_query($conn,"select * from gallery where id='1' ");
$ans=mysqli_fetch_assoc($z);
$g=mysqli_query($conn,"select * from gallery where type='c' order by day DESC ");

	?>
	<h3 class="text-uppercase text-center">
		all photos
	</h3>
	<div class="container-fluid my-4">
		<div class="row">
			<?php while($y=mysqli_fetch_assoc($q)) { ?>
			<div class="col-md-16 col-lg-3">
				<div class="card">
					<img src="../gphoto/<?php echo $y['name']; ?>" alt="" height="225" class="card-img-top">
     	<?php
$b=$y['blog'];
if ($b==0) {
	?>
	<p class="text-center text-uppercase">
     	Blog attached id : None
     </p>
  <?php }
else{
     	?>
     <p class="text-center text-uppercase">
     	Blog attached id : <?php echo " ".$y['blog']; ?>
     </p>
 <?php } ?>
  <p class="text-center text-uppercase">
     	privacy :<?php echo " ".$y['privacy']; ?>
     </p>
     <p class="text-center text-uppercase">
     	show on home page :<?php echo " ".$y['home']; ?>
     </p>
     <p class="text-center text-uppercase">
     	last modified :<?php echo " ".$y['day']; ?>
     </p>
 <a href="pedit.php?id=<?php echo $y['id']; ?>" class="btn btn-outline-dark d-block text-uppercase">Edit</a>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<!--carousel-->
	<h4 class="text-center text-uppercase">
		Carousel image
	</h4>
	<div class="container my-3">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div id="example" class="carousel slide text-center" data-ride='carousel'>     
  
     <div class="carousel-inner">
     		<?php
$i=0;
     			while($result=mysqli_fetch_assoc($g))
			{
				if ($i==0) {
?>   		
     <div class="carousel-item active">
        <img src="../gphoto/<?php echo $result['name']; ?>" height="550"  alt="<?php echo $result['name'];?>" class="card-img-top my-auto">
    </div>
<?php } 
else{
?>
<div class="carousel-item">
        <img src="../gphoto/<?php echo $result['name']; ?>" height="550" alt="<?php echo $result['name'];?>" class="card-img-top my-auto">
    </div>
<?php
 }
 $i++;
 } 
 ?>
      </div>   
     <a href="#example" class="carousel-control-prev" data-slide="prev">
         <span class="carousel-control-prev-icon text-danger"></span>
     </a>
     <a href="#example" class="carousel-control-next" data-slide="next">
         <span class="carousel-control-next-icon text-danger"></span>
     </a>
         </div>

			</div>
		</div>
	</div>
<!---->
<p class="text-center text-uppercase">
	<button class="btn text-center text-uppercase text-white bg-primary" data-toggle="collapse" data-target="#ad">
	<h2 class="text-center text-uppercase"><i class="fa fa-plus-square text-warning"></i>Add a photo</h2>
	</button></p>
	<div class="collapse" id="ad">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-4"></div>
				<div class="col-md-12 col-lg-5">
					<div class="card">
						<form action="gallery.php" method="post" enctype="multipart/form-data">
						<input type="file" class="form-control" name="photo">
						<h4 class="text-center py-2">
							privacy
						</h4>
						<select name="privacy" id="" class="form-control">
							<option value="public">public</option>
							<option value="private">private</option>
						</select>
						<h4 class="text-center py-2">
							Show on home page
						</h4>
						<select name="show" id="" class="form-control">
							<option value="show">show</option>
							<option value="Dont">Dont</option>
						</select>
<h4 class="text-center py-2">
	Make carousel photo
</h4>
<select name="type" id="" class="form-control">
	<option value="no">Don't Make carousel photo</option>
<option value="c">Make carousel photo</option>
</select>
	<h4 class="text-center py-2">
							<i class="fab fa-facebook fa-1x text-primary"></i> Link
						</h4>
						<input type="text" class="form-control" name="fb">

	<h4 class="text-center py-2">
							<i class="fab fa-twitter fa-1x text-primary"></i> Link
						</h4>
						<input type="text" class="form-control" name="twitter">
	<h4 class="text-center py-2">
							<i class="fab fa-telegram fa-1x text-primary"></i> Link
						</h4>
						<input type="text" class="form-control" name="tele">
	<h4 class="text-center py-2">
							<i class="fab fa-instagram fa-1x text-danger"></i> Link
						</h4>
						<input type="text" class="form-control" name="insta">

						<h4 class="text-center py-2">
						Attach to blog id
						</h4>
						<select name="blog" class="form-control">
							<option value="0">none</option>
			<?php
$sql=mysqli_query($conn,"select id from blog");
if($sql!=0){
	while($r=mysqli_fetch_assoc($sql))
	{
	echo"<option>".$r['id']."</option";
	echo "</select>";
}}
?>
<p class="my-3 text-center">
	<input type="submit" class="btn bg-primary text-white text-center float-right" name="submit" value="upload"></p>
<?php
if (isset($_POST['submit'])) {
	$privacy=isset($_POST['privacy'])? $_POST['privacy']:null;
	$show=isset($_POST['show'])? $_POST['show']:null;
	$blog=isset($_POST['blog'])? $_POST['blog']:null;
$fb=isset($_POST['fb'])? $_POST['fb']:null;
	$twitter=isset($_POST['twitter'])? $_POST['twitter']:null;
	$tele=isset($_POST['tele'])? $_POST['tele']:null;
	$insta=isset($_POST['insta'])? $_POST['insta']:null;
		$type=isset($_POST['type'])? $_POST['type']:null;
$photo=$_FILES['photo']['name'];
if ($photo==null) {
	echo "<script>window.alert('you didn't upload any photo')</script>";
}
else{
$insert=mysqli_query($conn,"insert into gallery (name,blog,home,privacy,fb,twitter,telegram,instagram,type) values('$photo','$blog','$show','$privacy','$fb','$twitter','$tele','$insta','$type')");
move_uploaded_file($_FILES['photo']['tmp_name'], "../gphoto/$photo");
if($insert!=0){
		echo "<script>window.alert('you have successfully a photo')</script>";
echo "<script>location.href='gallery.php'</script>";
 echo "Error: " . $insert . "<br>" . $conn->error;
	}
	else{
		echo "<script>window.alert('upload failed try again later')</script>";
		 echo "Error: " . $insert . "<br>" . $conn->error;
	}	
}
}
?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include"footer.php"; ?>
</body>
</html>