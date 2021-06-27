<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blogs</title>
</head>
<body>
	<?php
	include "menu.php";
	$request=mysqli_query($conn,"select * from blog");
	?>
	<h2 class="text-center text-uppercase">All story post</h2>
	<div class="container">
		<div class="row">
			<?php 
			while ($return=mysqli_fetch_assoc($request)) {  
			?>
			<div class="col-sm-4 col-md-6 col-lg-4 my-2">
				<div class="card text-center">
					BLog id:<?php echo $return['id']; ?>
					<img src="../photo/<?php echo $return['photo1']; ?>" height="250" alt="" class="card-img-top">
					<div class="bg-dark d-flex justify-content-around">
            <a href="<?php echo $return['fb']; ?>"><i class="fab fa-facebook fa-2x text-white"></i ></a>
            <a href="<?php echo $return['twitter']; ?>"><i class="fab fa-twitter fa-2x text-primary"></i></a>
            <a href="<?php echo $return['telegram']; ?>"><i class="fab fa-telegram fa-2x text-danger"></i></a>
       <a href="<?php echo $return['instagram']; ?>"><i class="fab fa-instagram fa-2x text-danger"></i></a>
        </div>
                    <h6 class="card-title text-uppercase">
                        <?php echo $return['title']; ?>
                    </h6>
                    <p class="card-text">
   <?php echo $return['highlight']; ?>
                    </p>
                    <a href="edit.php?id=<?php echo $return['id']; ?>" class="btn btn-outline-dark d-block text-uppercase">Edit</a>
       
				</div>
				</div>
			<?php } ?>
			</div>
		</div>
	<p class="py-4 text-center">
	 <button class="btn text-center text-uppercase text-white bg-primary" data-toggle="collapse" data-target="#add">
	<h2 class="text-center text-uppercase"><i class="fa fa-plus-square text-warning"></i>Add a story</h2>
	</button></p>
	<div class="collapse" id="add">
	<div class="container-fluid">
		<div class="row">
			<div class="col-col-md-6 col-lg-6">
				<div class="card text-center">
					<form action="blog.php" method="post" enctype="multipart/form-data">
					<h4 class="bg-warning text-white">Blog Title</h4>
					<input type="text" class="form-control" name="title" >
				</div>
			</div>
			<div class="col-col-md-6 col-lg-6">
				<div class="card text-center">
					<h4 class="bg-warning text-white">some blog highlight information</h4>
					<textarea class="form-control" name="highlight" rows="5" cols="15"> character less than 100</textarea>
				</div>
			</div>
			<div class="col-col-md-12 col-lg-12 py-3">
				<div class="card text-center">
					<h4 class="bg-warning text-white">Detail Describe the blog</h4>
					<textarea class="form-control" name="Describe" rows="20" cols="15">
						</textarea>
				</div>
			</div>
			
		</div>
	</div>
	<h4  class="text-center pt-3 "><i class="icon-camera"></i>Add photos</h4> <p class="text-center pb-3 text-danger"> At least one photo is mandatory start with photo 1</p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="card text-center">
				<h5 class="bg-warning text-white"> photo 1</h5>
				<input type="file" name="photo1" class="form-control" value="uplaod photo">
				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="card text-center">
				<h5>photo 2</h5>
				<input type="file" name="photo2">
			</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="card text-center">
				<h5>photo 3</h5>
				<input type="file" name="photo3"></div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="card text-center">
				<h5>photo 4</h5>
				<input type="file" name="photo4"></div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="card text-center">
				<h5>photo 5</h5>
				<input type="file" name="photo5"></div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="card text-center">
				<h5>photo 6</h5>
				<input type="file" name="photo6"></div>
			</div>
			</div>
	</div>
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-md-4 col-lg-4 text-center">
				<div class="card text-center">
					<h4 class="text-center">Add a video</h4>
					<input type="file" class="form-control" name="video">
				</div>
				<div class="card">
					<h4 class="text-center">youtube link to the video</h4>
					<input type="text" class="form-control" name="youtube">
				</div>
			</div>
			<div class="col-md-4 col-lg-4">
				<div class="card">
					<h4 class="text-center">Blog privacy</h4>
					<h6>private</h6>private blogs are not showed to all users visting this site but they are saved in the database. The admin can change their privacy later.
					<h6>public</h6>public blogs are shown to all users <br>
<select name="privacy" id="choose" class="form-controls py-2">
	<option value="public">public</option>
	<option value="private">private</option>
</select>
				</div>
			</div>
			<div class="col-md-4 col-lg-4">
				<h4 class="text-center">Blog view in home page</h4>
				This shows blog on home page or not.
				<?php 
				$quer=mysqli_query($conn,"SELECT COUNT(*) as total from blog where front='show'");
$t=mysqli_fetch_assoc($quer);
$tr=$t['total'];
if($tr>=6){
				 ?>
				 <p class="text-danger">Home page blogs are already full modify other blogs as Don't show on home page </p>
				<?php } ?>
				<select name="show" id="show" class="form-control py-2">
					<option value="show">Show on home page</option>
						<option value="Dont">Don't show on the home page</option>
				</select>
			</div>
		</div>
	</div>
	<h4 class="py-4 text-center">social media links to this post</h4>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-3">
				<div class="card text-center">
					<h4> <i class="fab fa-facebook fa-2x text-primary"></i>Facebook link</h4>
					<input type="text" class="form-control" name="fb">
				</div>
			</div>
				<div class="col-md-6 col-lg-3">
				<div class="card text-center">
					<h4> <i class="fab fa-twitter fa-2x text-primary"></i>Twitter link</h4>
					<input type="text" class="form-control" name="twitter">
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="card text-center">
					<h4> <i class="fab fa-telegram fa-2x text-primary"></i>telegram link</h4>
					<input type="text" class="form-control" name="tele">
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="card text-center">
					<h4> <i class="fab fa-instagram fa-2x text-danger"></i>instagram link</h4>
					<input type="text" class="form-control" name="insta">
				</div>
			</div>
		</div>
	</div>
<p class="py-4 text-center">
	<input type="submit" class="btn py-2 px-4 bg-primary text-white " name="submit" value="publish">
</p>
<?php
$fb=isset($_POST['fb'])? $_POST['fb']:null;
$title=isset($_POST['fb'])? $_POST['title']:null;
$high=isset($_POST['highlight'])? $_POST['highlight']:null;
$Describe=isset($_POST['Describe'])? $_POST['Describe']:null;
$privacy=isset($_POST['privacy'])? $_POST['privacy']:null;
$show=isset($_POST['show'])? $_POST['show']:null;
$twitter=isset($_POST['twitter'])? $_POST['twitter']:null;
$tele=isset($_POST['tele'])? $_POST['tele']:null;
$insta=isset($_POST['insta'])? $_POST['insta']:null;
$youtube=isset($_POST['youtube'])? $_POST['youtube']:null;
if(isset($_POST['submit'])){
$photo1=$_FILES['photo1']['name'];
$photo2=$_FILES['photo2']['name'];
$photo3=$_FILES['photo3']['name'];
$photo4=$_FILES['photo4']['name'];
$photo5=$_FILES['photo5']['name'];
$photo6=$_FILES['photo6']['name'];
$video=$_FILES['video']['name'];
if($title==null){
	echo "<script>window.alert('missing title of the blog enter carefully')</script>";
}
elseif($high==null){
	echo "<script>window.alert('missing Highlight of the blog enter carefully')</script>";
}
elseif($Describe==null){
	echo "<script>window.alert('missing Description of the blog enter carefully')</script>";
}
elseif($photo1==null){
	echo "<script>window.alert('missing photo 1 of the blog enter carefully')</script>";
}
else{
	$insert=mysqli_query($conn,"insert into blog(title,highlight,Description,post,front,photo1,photo2,photo3,photo4,photo5,photo6,video,fb,telegram,instagram,twitter,youtube) values('$title','$high','$Describe','$privacy','$show','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$video','$fb','$tele','$insta','$twitter','$youtube')");
	move_uploaded_file($_FILES['photo1']['tmp_name'], "../photo/$photo1");
	move_uploaded_file($_FILES['photo2']['tmp_name'], "../photo/$photo2");
	move_uploaded_file($_FILES['photo3']['tmp_name'], "../photo/$photo3");
	move_uploaded_file($_FILES['photo4']['tmp_name'], "../photo/$photo4");
	move_uploaded_file($_FILES['photo5']['tmp_name'], "../photo/$photo5");
	move_uploaded_file($_FILES['photo6']['tmp_name'], "../photo/$photo6");
	if($insert!=0){
		echo "<script>window.alert('you have successfully created a blog')</script>";
echo "<script>location.href='blog.php'</script>";
	}
	else{
		echo "<script>window.alert('creating a blog failed try again later')</script>";
			 echo "Error: " . $insert . "<br>" . $conn->error;
	}
}
}
?>
	</div>
	<?php
include "footer.php";
?>
	</form>
</body>
</html>