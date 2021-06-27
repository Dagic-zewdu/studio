<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Testmonials</title>
</head>
<body>
	<?php
include"menu.php";
$d=mysqli_query($conn,"select * from review");
	?>

	<div class="container">
		<div class="row">
			<?php
			while($t=mysqli_fetch_assoc($d))
			{
			?>
			<div class="col-md-12 col-lg-12">
				<h4 class="text-center">from <?php echo $t['ps']; ?></h4>
			 <p><?php echo $t['description']; ?></p>
<a href="etest.php?id=<?php echo $t['id']; ?>" class="btn btn-outline-dark d-block text-uppercase float-right">Edit</a>
				<hr color="lightgray">
			</div>
		<?php } ?>
		</div>
	</div>

	<p class="py-4 text-center">
	 <button class="btn text-center text-uppercase text-white bg-primary" data-toggle="collapse" data-target="#add">
	<h2 class="text-center text-uppercase"><i class="fa fa-plus-square text-warning"></i>Add a testmony</h2>
	</button></p>
	<div class="collapse" id="add">
		<div class="container-fluid my-2">
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<div class="card">
<form action="test.php" method="post">
						<h4 class="text-center">
							From
						</h4>
						<input type="text" class="form-control" name="from">
					</div>
				</div>
				<!--end of col-->
     		<div class="col-md-6 col-lg-6">
     			<h4 class="text-center">Testimonial Description</h4>
     			<div class="card">
     				<textarea name="Describe" id="" cols="30" rows="10" class="form-control"></textarea>
     			</div>
     		</div>
     <div class="col-md-6 col-lg-3">
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
     <!--end of col-->
     <div class="col-md-12 col-lg-12">
     	<p class="py-4 text-center">
	<input type="submit" class="btn py-2 px-4 bg-primary text-white " name="submit" value="publish">
</p>
<?php
if(isset($_POST['submit']))
{
$from=isset($_POST['from'])? $_POST['from']:null;
$privacy=isset($_POST['privacy'])? $_POST['privacy']:null;
$Describe=isset($_POST['Describe'])? $_POST['Describe']:null;

if($from==null){
	echo "<script>window.alert('missing From of the blog enter carefully')</script>";
}
elseif($Describe==null){
	echo "<script>window.alert('missing Description of the blog enter carefully')</script>";
}
else{
	$insert=mysqli_query($conn,"insert into review (ps,privacy,description) values('$from','$privacy','$Describe')");
	if($insert!=0){
		echo "<script>window.alert('you have successfully created a testmony')</script>";
echo "<script>location.href='test.php'</script>";
	}
	else{
		echo "<script>window.alert('creating a testmony failed try again later')</script>";
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
<?php 
include "footer.php";
?>		
</body>
</html>