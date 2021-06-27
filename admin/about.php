<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>about</title>
</head>
<body>
	<?php
include"menu.php";
$m=mysqli_query($conn,"select * from about where id='1' ");	
$mz=mysqli_query($conn,"select * from about where type='E' ");	
$mis=mysqli_fetch_assoc($m);
?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<div class="card">
					<h4 class="text-center">About Description</h4>
					<form action="about.php" method="post">
					<textarea name="Describe" id="" cols="73" rows="15" class="form-control">
						<?php echo $mis['Description']; ?>
					</textarea>
					</div>
					<input type="submit" class="btn bg-dark text-white text-uppercase" value="change" placeholder="upload photo"  name="sit">
    	<?php
    	if(isset($_POST['sit'])){
    		$logo=isset($_POST['Describe'])? $_POST['Describe']:null;
if($logo==null){
	echo"";
}
else{
$cha=mysqli_query($conn,"update about set Description='$logo' WHERE id='1'");
if($cha!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='about.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}
}}
?>
                </div>
</form>
			
			<div class="col-md-6 col-lg-6">
				<div class="card text-center">
					<img src="../aphoto/<?php echo $mis['photo']; ?>" alt="" height="300" class="card-img-top">
					<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#logo">Change </button>
<div class="collapse" id="logo">
<p>

<form name="myform" method="post" action="about.php" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="logo">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="sumit">
    	<?php
    	if(isset($_POST['sumit'])){
  $logo=$_FILES['logo']['name'];
if($logo==null){
	echo"";
}
else{

$a1=$mis['photo'];
$aa1="../aphoto/$a1";
unlink($aa1);
$cha=mysqli_query($conn,"update about set photo='$logo' WHERE id='1'");
move_uploaded_file($_FILES['logo']['tmp_name'], "../aphoto/$logo");
if($cha!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='about.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}
}}
?>
    </form>
</p>
</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
		
	<h4 class="text-center my-2">
		Equipments
	</h4>		
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php
while ($a=mysqli_fetch_assoc($mz)) {
				?>
			<div class="col-md-6 col-lg-4 py-3">	
<div class="card">
	<img src="../aphoto/<?php echo $a['photo']; ?>" alt="" class="card-img-top">
	<a href="at.php?id=<?php echo $a['id']; ?>" class="btn btn-outline-dark d-block text-uppercase">Edit</a>
</div>
      </div>
      <div class="col-md-6 col-lg-8 py-3">
      	<div class="card">
      		<h4 class="text-center">
      			<?php echo$a['title']; ?>
      		</h4>
      		<p>
      			<?php echo $a['Description']; ?>
      		</p>
      	</div>
      </div>
      	<?php } ?>
  </div>
</div>
<div class="container">
	<div class="row">
			<div class="col-md-12 col-lg-12">
				
<p class="text-center text-uppercase">
	<button class="btn text-center text-uppercase text-white bg-primary" data-toggle="collapse" data-target="#adi">
	<h2 class="text-center text-uppercase"><i class="fa fa-plus-square text-warning"></i>Add a Equipment</h2>
	</button></p>
</div>
</div>
</div>

	<div class="collapse" id="adi">
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12 col-lg-3 my-3">
			<div class="card my-2">
			<h4 class="text-center">
				Upload Equipment photo
			</h4>
			<form action="about.php" method="post" enctype="multipart/form-data">
	<input type="file" class="form-control" name="photo">
		</div>
		</div>
		<div class="col-md-12 col-lg-6 my-3">
			<div class="card">
				<h4 class="text-center">Equipment name</h4>
				<input type="text" class="form-control" name="title">
			</div>
			<div class="card my-2">
			<h4 class="text-center">
				Describe Equipment photo
			</h4>
			<textarea name="Describe" id="" cols="30" rows="10"></textarea>
		</div>
		</div>
		<div class="col-md-12 col-lg-3">
			<div class="card">
					<h4 class="text-center">Blog privacy</h4>
					<h6>private</h6>private blogs are not showed to all users visting this site but they are saved in the database. The admin can change their privacy later.
					<h6>public</h6>public blogs are shown to all users <br>
<select name="privacy" id="choose" class="form-controls py-2">
	<option value="public">public</option>
	<option value="private">private</option>
</select>
				</div>
				<div class="card text-center my-2">
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
				</div>
		</div>
	</div>
			</div>
		</div>
	<h4 class="text-center"><input type="submit" class="form-control btn bg-primary text-white" value="publish"  name="sun"></h4>
	<?php
	if (isset($_POST['sun'])) {
		$photo=$_FILES['photo']['name'];
$blog=isset($_POST['blog'])? $_POST['blog']:null;
$title=isset($_POST['title'])? $_POST['title']:null;
$privacy=isset($_POST['privacy'])? $_POST['privacy']:null;
$Describe=isset($_POST['Describe'])? $_POST['Describe']:null;
if($photo==null){
	echo "<script>window.alert('missing photo of the Equipment enter carefully')</script>";
}
elseif($Describe==null){
	echo "<script>window.alert('missing Description of the Equipment enter carefully')</script>";
}
else{
	$insert=mysqli_query($conn,"insert into about(photo,blog,title,privacy,Description,type)values('$photo','$blog','$title','$privacy','$Describe','E')");
	move_uploaded_file($_FILES['photo']['tmp_name'], "../aphoto/$photo");
	if($insert!=0){
		echo "<script>window.alert('creating blog successfull successfull')</script>";
echo "<script>location.href='$url'</script>";
	}
	else{
		echo "<script>window.alert('creating blog failed try again later')</script>";
		 echo "Error: " . $insert . "<br>" . $conn->error;
	}

}
}
	?>
</form>

</body>
</html>